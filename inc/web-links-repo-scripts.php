<?php
/**
 * Add Scripts.
 *
 * @author Eugene Molari
 * @link https://github.com/eugelogic
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 * @package Web Links Repo
 */

// Check if admin and add admin scripts.
if ( is_admin() ) {
	/**
	 * Add Admin Scripts.
	 */
	function wlr_add_admin_scripts() {
			wp_enqueue_style( 'wlr-main-admin-style', plugins_url() . '/web-links-repo/css/style-admin.css' );
	}
	add_action( 'admin_init','wlr_add_admin_scripts' );
}

/**
 * Add Scripts.
 */
function wlr_add_scripts() {
	wp_enqueue_style( 'wlr-main-style', plugins_url() . '/web-links-repo/css/style.css' );
}
add_action( 'wp_enqueue_scripts','wlr_add_scripts' );
