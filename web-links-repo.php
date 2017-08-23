<?php
/**
 * Plugin Name: Web Links Repo
 * Plugin URI: https://github.com/eugelogic/web-links-repo
 * Description: A WordPress custom post type plugin to collect and display links of useful websites.
 * Author: Eugene Molari
 * Author URI:  https://github.com/eugelogic
 * Version: 0.1.20170823
 * Text Domain: web-links-repo
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

/*
The "Web Links Repo" plugin is free software: you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by the Free Software Foundation,
version 3 of the License, or any later version.
The "Web Links Repo" plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with the "Web Links Repo" plugin.
If not, see https://www.gnu.org/licenses/gpl-3.0.html.
*/

/* exit if directly accessed */
if( ! defined( 'ABSPATH' ) ) exit;

// Load Scripts.
require_once( plugin_dir_path( __FILE__ ) . '/inc/web-links-repo-scripts.php' );
