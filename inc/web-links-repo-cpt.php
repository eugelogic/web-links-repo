<?php
/**
 * Create Web Link Custom Post Type.
 *
 * @author Eugene Molari
 * @link https://github.com/eugelogic
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
function wlr_register_web_link() {

	$labels = array(
		'name'                  => _x( 'Web Links', 'Post type general name', 'wlr-domain' ),
		'singular_name'         => _x( 'Web Link', 'Post type singular name', 'wlr-domain' ),
		'menu_name'             => _x( 'Web Links', 'Admin Menu text', 'wlr-domain' ),
		'name_admin_bar'        => _x( 'Web Link', 'Add New on Toolbar', 'wlr-domain' ),
		'add_new'               => __( 'Add New', 'wlr-domain' ),
		'add_new_item'          => __( 'Add New Web Link', 'wlr-domain' ),
		'new_item'              => __( 'New Web Link', 'wlr-domain' ),
		'edit_item'             => __( 'Edit Web Link', 'wlr-domain' ),
		'view_item'             => __( 'View Web Link', 'wlr-domain' ),
		'all_items'             => __( 'All Web Links', 'wlr-domain' ),
		'search_items'          => __( 'Search Web Links', 'wlr-domain' ),
		'parent_item_colon'     => __( 'Parent Web Links:', 'wlr-domain' ),
		'not_found'             => __( 'No Web Links found.', 'wlr-domain' ),
		'not_found_in_trash'    => __( 'No Web Links found in Trash.', 'wlr-domain' ),
		'archives'              => _x( 'Web Link archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wlr-domain' ),
		'filter_items_list'     => _x( 'Filter Web Links list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wlr-domain' ),
		'items_list_navigation' => _x( 'Web Links list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wlr-domain' ),
		'items_list'            => _x( 'Web Links list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wlr-domain' ),
	);

	$args = array(
	  'labels'             => $labels,
	  'description'        => __( 'Links of useful websites.', 'wlr-domain' ),
	  'taxonomies'         => array( 'category', 'language', 'tool', 'project' ),
	  'public'             => true,
	  'publicly_queryable' => true,
	  'show_ui'            => true,
	  'show_in_menu'       => true,
	  'query_var'          => true,
	  'rewrite'            => array(
		  'slug' => 'web-link',
	  ),
	  'capability_type'    => 'post',
	  'has_archive'        => true,
	  'hierarchical'       => false,
	  'menu_position'      => null,
	  'menu_icon'          => 'dashicons-admin-site',
	  'can_export'         => true,
	  'supports'           => array( 'title' )
	);

	// Register Post Type.
	register_post_type( 'wlr_web_link', $args );
}
add_action( 'init', 'wlr_register_web_link' );

register_activation_hook(__FILE__, function () {
	wlr_register_web_link();
	flush_rewrite_rules();
});

register_deactivation_hook(__FILE__, function () {
	  flush_rewrite_rules();
});

if ( ! function_exists( 'add_wlr_custom_fields_to_index_tml' ) ) :
	/**
	 * Add Web Link Repo custom fields to the index template.
	 *
	 * @param string $details
	 * @return string
	 */
	function add_wlr_custom_fields_to_index_tml( $details ) {
		if ( 'wlr_web_link' !== get_post_type() ) {
					return $details;
		}

		$web_link_field_url = get_post_meta( get_the_ID(), 'web_link_field_url', true );
		$web_link_field_text = get_post_meta( get_the_ID(), 'web_link_field_text', true );

		// Init output.
		$output = '';

		// Build output.
		$output .= '<div class="image-wrapper-index">';
		$output .= '<a href="';
		$output .= $web_link_field_url;
		$output .= '" target="_blank">';
		$output .= '<img src="http://s.wordpress.com/mshots/v1/';
		$output .= $web_link_field_url;
		$output .= '" />';
		$output .= '</a>';
		$output .= '</div><!-- image-wrapper-index -->';
		$output .= $web_link_field_text;

		return $output;
	}
	add_filter( 'the_content', 'add_wlr_custom_fields_to_index_tml' );

endif; // add_wlr_custom_fields_to_index_tml.
