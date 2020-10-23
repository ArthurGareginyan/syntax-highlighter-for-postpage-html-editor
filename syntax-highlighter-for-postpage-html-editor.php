<?php
/**
 * Plugin Name: Syntax Highlighter for Post/Page HTML Editor
 * Plugin URI: https://github.com/ArthurGareginyan/syntax-highlighter-for-postpage-html-editor
 * Description: Replaces the defaults WordPress Post/Page HTML Editor with an enhanced editor with syntax highlighting, line numbering, etc.
 * Author: Space X-Chimp
 * Author URI: https://www.spacexchimp.com
 * Version: 2.45
 * License: GPL3
 * Text Domain: syntax-highlighter-for-postpage-html-editor
 * Domain Path: /languages/
 *
 * Copyright 2017-2020 Space X-Chimp ( website : https://www.spacexchimp.com )
 *
 * This plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this plugin. If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗██████╗  █████╗  ██████╗███████╗    ██╗  ██╗      ██████╗██╗  ██╗██╗███╗   ███╗██████╗
 * ██╔════╝██╔══██╗██╔══██╗██╔════╝██╔════╝    ╚██╗██╔╝     ██╔════╝██║  ██║██║████╗ ████║██╔══██╗
 * ███████╗██████╔╝███████║██║     █████╗       ╚███╔╝█████╗██║     ███████║██║██╔████╔██║██████╔╝
 * ╚════██║██╔═══╝ ██╔══██║██║     ██╔══╝       ██╔██╗╚════╝██║     ██╔══██║██║██║╚██╔╝██║██╔═══╝
 * ███████║██║     ██║  ██║╚██████╗███████╗    ██╔╝ ██╗     ╚██████╗██║  ██║██║██║ ╚═╝ ██║██║
 * ╚══════╝╚═╝     ╚═╝  ╚═╝ ╚═════╝╚══════╝    ╚═╝  ╚═╝      ╚═════╝╚═╝  ╚═╝╚═╝╚═╝     ╚═╝╚═╝
 *
 */


/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Define global constants
 */
$plugin_data = get_file_data( __FILE__,
                              array(
                                     'name'    => 'Plugin Name',
                                     'version' => 'Version',
                                     'text'    => 'Text Domain'
                                   )
                            );
function spacexchimp_p014_define_constants( $constant_name, $value ) {
    $constant_name = 'SPACEXCHIMP_P014_' . $constant_name;
    if ( ! defined( $constant_name ) )
        define( $constant_name, $value );
}
spacexchimp_p014_define_constants( 'FILE', __FILE__ );
spacexchimp_p014_define_constants( 'DIR', dirname( plugin_basename( __FILE__ ) ) );
spacexchimp_p014_define_constants( 'BASE', plugin_basename( __FILE__ ) );
spacexchimp_p014_define_constants( 'URL', plugin_dir_url( __FILE__ ) );
spacexchimp_p014_define_constants( 'PATH', plugin_dir_path( __FILE__ ) );
spacexchimp_p014_define_constants( 'SLUG', dirname( plugin_basename( __FILE__ ) ) );
spacexchimp_p014_define_constants( 'NAME', $plugin_data['name'] );
spacexchimp_p014_define_constants( 'VERSION', $plugin_data['version'] );
spacexchimp_p014_define_constants( 'TEXT', $plugin_data['text'] );
spacexchimp_p014_define_constants( 'PREFIX', 'spacexchimp_p014' );
spacexchimp_p014_define_constants( 'SETTINGS', 'spacexchimp_p014' );

/**
 * A useful function that returns an array with the contents of plugin constants
 */
function spacexchimp_p014_plugin() {
    $array = array(
        'file'     => SPACEXCHIMP_P014_FILE,
        'dir'      => SPACEXCHIMP_P014_DIR,
        'base'     => SPACEXCHIMP_P014_BASE,
        'url'      => SPACEXCHIMP_P014_URL,
        'path'     => SPACEXCHIMP_P014_PATH,
        'slug'     => SPACEXCHIMP_P014_SLUG,
        'name'     => SPACEXCHIMP_P014_NAME,
        'version'  => SPACEXCHIMP_P014_VERSION,
        'text'     => SPACEXCHIMP_P014_TEXT,
        'prefix'   => SPACEXCHIMP_P014_PREFIX,
        'settings' => SPACEXCHIMP_P014_SETTINGS
    );
    return $array;
}

/**
 * Put value of plugin constants into an array for easier access
 */
$plugin = spacexchimp_p014_plugin();

/**
 * Load the plugin modules
 */
require_once( $plugin['path'] . 'inc/php/core.php' );
require_once( $plugin['path'] . 'inc/php/upgrade.php' );
require_once( $plugin['path'] . 'inc/php/versioning.php' );
require_once( $plugin['path'] . 'inc/php/enqueue.php' );
require_once( $plugin['path'] . 'inc/php/functional.php' );
require_once( $plugin['path'] . 'inc/php/controls.php' );
require_once( $plugin['path'] . 'inc/php/page.php' );
require_once( $plugin['path'] . 'inc/php/messages.php' );
