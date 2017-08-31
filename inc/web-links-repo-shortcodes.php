<?php
/**
 * Add Shortcodes.
 *
 * @author Eugene Molari
 * @link https://github.com/eugelogic
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 * @package Web Links Repo
 */

/**
 * CSS grid Web Links gallery.
 *
 * @param array $atts (please add comment).
 * @param mixed $content (please add comment).
 */
function wlr_links_grid( $atts, $content = null ) {
	global $post;

	// Set default attributes.
	$atts = shortcode_atts(array(
		'title'     => 'Web Links Grid',
		'count'     => 14,
		'category'  => 'all',
	), $atts);

	// Check if someone has added a category with the shortcode.
	if ( 'all' === $atts['category'] ) {
		$terms = '';
	} else {
		$terms = array(
			array(
				'taxonomy'  => 'category',
				'field'     => 'slug',
				'terms'     => $atts['category'],
		),
		);
	}

	// Query args.
	$args = array(
		'post_type'     => 'wlr_web_link',
		'post_status'   => 'publish',
		'orderby'       => 'created',
		'order'         => 'DESC',
		'posts_per_page' => $atts['count'],
		'tax_query'			=> $terms,
	);

	// Fetch links.
	$web_links = new WP_Query( $args );

	// Check for links.
	if ( $web_links->have_posts() ) {
		$category = str_replace( '-', ' ', $atts['category'] );

		// Init output.
		$output = '';

		// Build output.
		$output .= '<div class="wlr-web-links-grid-wrapper">';

		while ( $web_links->have_posts() ) {
			$web_links->the_post();

			// Get field values.
			$web_link_field_url = get_post_meta( $post->ID, 'web_link_field_url', true );
			$web_link_field_text = get_post_meta( $post->ID, 'web_link_field_text', true );

			$output .= '<div class="wlf-web-link-grid-entry"><a href="';
			$output .= $web_link_field_url;
			$output .= '" target="_blank"><img id="img-grid" src="http://s.wordpress.com/mshots/v1/';
			$output .= $web_link_field_url;
			$output .= ' " /></a>';
			$output .= '<div class="wlf-web-link-meta-grid">';
			$output .= '<h6><a href="';
			$output .= get_the_permalink();
			$output .= '" class="web-link-title-grid">';
			$output .= get_the_title();
			$output .= '</a></h6><!-- web-link-title-grid -->';
			$output .= '<div class="web-link-desc-grid">';
			$output .= $web_link_field_text;
			$output .= '</div><!-- web-link-desc-grid -->';
			$output .= '</div><!-- wlf-web-link-meta-grid -->';
			$output .= '</div><!-- wlf-web-link-grid-entry -->';

		}

		$output .= '</div><!-- wlr-web-links-grid-wrapper -->';

		// Reset post data.
		wp_reset_postdata();

		return $output;
	} else {
		return '<p>No Links Found</p>';
	} // End if().
}
// Video grid shortcode with title only.
add_shortcode( 'web-links-grid', 'wlr_links_grid' );
