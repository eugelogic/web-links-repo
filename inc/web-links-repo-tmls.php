<?php
/**
 * Call custom templates.
 *
 * @author Eugene Molari
 * @link https://github.com/eugelogic
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 * @package Web Links Repo
 */

if ( ! function_exists( 'single_web_link_tml' ) ) :
	/**
	 *
	 * Use the single Web Link template.
	 *
	 * @param mixed $original_template (please add comment).
	 */
	function single_web_link_tml( $original_template ) {
		if ( 'wlr_web_link' === get_post_type( get_queried_object() ) && is_single() ) {
			return WLR_DIR_PATH . '/templates/single-web-link.php';
		} else {
			return $original_template;
		}
	}
	add_filter( 'template_include', 'single_web_link_tml' );
endif; // single_web_link_tml.
