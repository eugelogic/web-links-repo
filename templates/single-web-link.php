<?php
/**
 * Template for displaying the single post page.
 *
 * @author Eugene Molari
 * @link https://github.com/eugelogic
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 * @package Web Links Repo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Template for displaying content.
				 * Used for both single and index/archive/search.
				 */
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; // is_single().  ?>

						<?php if ( is_single() ) : ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php else : ?>
						<h1 class="entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h1>
						<?php endif; // is_single(). ?>

						<div class="entry-meta">
							<?php twentythirteen_entry_meta(); ?>
							<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->

					<?php if ( is_search() ) : // Only display Excerpts for Search. ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
					<?php else : ?>
					<div class="entry-content">

						<?php
							// Get field values.
							$web_link_field_url = get_post_meta( get_the_ID(), 'web_link_field_url', true );
							$web_link_field_wysiwyg = get_post_meta( get_the_ID(), 'web_link_field_wysiwyg', true );
							// Show screenshot.
							echo '<div class="image-wrapper-single"><a href="' . esc_html($web_link_field_url) . '" target="_blank"><img src="http://s.wordpress.com/mshots/v1/' . esc_html($web_link_field_url) . ' " /></a></div>';
							// Serve full description.
							echo wpautop($web_link_field_wysiwyg);
						?>

						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>',
								'after' => '</div>',
								'link_before' => '<span>',
								'link_after' => '</span>',
							) );
						?>
					</div><!-- .entry-content -->
					<?php endif; ?>

					<footer class="entry-meta">
						<?php if ( comments_open() && ! is_single() ) : ?>
							<div class="comments-link">
								<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
							</div><!-- .comments-link -->
						<?php endif; // comments_open(). ?>

						<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
							<?php get_template_part( 'author-bio' ); ?>
						<?php endif; ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

			<?php twentythirteen_post_nav(); ?>
			<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
