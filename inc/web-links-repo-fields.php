<?php
/**
 * Add Meta Boxes.
 *
 * @author Eugene Molari
 * @link https://github.com/eugelogic
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 * @package Web Links Repo
 */

if ( ! function_exists( 'web_link_info_metabox' ) ) :
/**
 * Add Web Link Info Meta Box.
 */
function web_link_info_metabox( array $meta_box ) {

	$fields = array(
		array(
			'id'   => 'web-link-field-url',
			'name' => 'The URL of the Web Link',
			'type' => 'text_url'),
		array(
			'id'   => 'web-link-field-text',
			'name' => 'A simple description of the Web Link',
			'type' => 'text')
	);

 	$meta_box[] = array(
		'fields'   => $fields,
 		'title'    => 'Web Link Info',
 		'pages'    => 'wlr_web_link',
 		'context'  => 'normal',
 		'priority' => 'high',
 		'desc'     => 'Web Link info meta box.',
 	);

 	return $meta_box;

 }
add_filter( 'cmb_meta_boxes', 'web_link_info_metabox' );
endif; // web_link_info_metabox.
