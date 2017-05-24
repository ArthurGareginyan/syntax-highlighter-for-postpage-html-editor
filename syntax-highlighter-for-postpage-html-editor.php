<?php
/**
 * Plugin Name: Syntax Highlighter for Post/Page HTML Editor
 * Plugin URI: https://github.com/ArthurGareginyan/syntax-highlighter-for-postpage-html-editor
 * Description: Replaces the defaults WordPress Post/Page HTML Editor with an enhanced editor with syntax highlighting and line numbering.
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 2.1
 * License: GPL3
 * Text Domain: syntax-highlighter-for-postpage-html-editor
 * Domain Path: /languages/
 *
 * Copyright 2017 Arthur Gareginyan (email : arthurgareginyan@gmail.com)
 *
 * This file is part of "Syntax Highlighter for Post/Page HTML Editor".
 *
 * "Syntax Highlighter for Post/Page HTML Editor" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "Syntax Highlighter for Post/Page HTML Editor" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "Syntax Highlighter for Post/Page HTML Editor".  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 *               █████╗ ██████╗ ████████╗██╗  ██╗██╗   ██╗██████╗
 *              ██╔══██╗██╔══██╗╚══██╔══╝██║  ██║██║   ██║██╔══██╗
 *              ███████║██████╔╝   ██║   ███████║██║   ██║██████╔╝
 *              ██╔══██║██╔══██╗   ██║   ██╔══██║██║   ██║██╔══██╗
 *              ██║  ██║██║  ██║   ██║   ██║  ██║╚██████╔╝██║  ██║
 *              ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═╝
 *
 *   ██████╗  █████╗ ██████╗ ███████╗ ██████╗ ██╗███╗   ██╗██╗   ██╗ █████╗ ███╗   ██╗
 *  ██╔════╝ ██╔══██╗██╔══██╗██╔════╝██╔════╝ ██║████╗  ██║╚██╗ ██╔╝██╔══██╗████╗  ██║
 *  ██║  ███╗███████║██████╔╝█████╗  ██║  ███╗██║██╔██╗ ██║ ╚████╔╝ ███████║██╔██╗ ██║
 *  ██║   ██║██╔══██║██╔══██╗██╔══╝  ██║   ██║██║██║╚██╗██║  ╚██╔╝  ██╔══██║██║╚██╗██║
 *  ╚██████╔╝██║  ██║██║  ██║███████╗╚██████╔╝██║██║ ╚████║   ██║   ██║  ██║██║ ╚████║
 *   ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝
 *
 */


/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Define global constants
 *
 * @since 2.1
 */
defined( 'SHPPHE_DIR' ) or define( 'SHPPHE_DIR', dirname( plugin_basename( __FILE__ ) ) );
defined( 'SHPPHE_BASE' ) or define( 'SHPPHE_BASE', plugin_basename( __FILE__ ) );
defined( 'SHPPHE_URL' ) or define( 'SHPPHE_URL', plugin_dir_url( __FILE__ ) );
defined( 'SHPPHE_PATH' ) or define( 'SHPPHE_PATH', plugin_dir_path( __FILE__ ) );
defined( 'SHPPHE_TEXT' ) or define( 'SHPPHE_TEXT', 'syntax-highlighter-for-postpage-html-editor' );
defined( 'SHPPHE_SLUG' ) or define( 'SHPPHE_SLUG', 'syntax-highlighter-for-postpage-html-editor' );
defined( 'SHPPHE_PREFIX' ) or define( 'SHPPHE_PREFIX', 'SHighlighterForPPHE' );
defined( 'SHPPHE_SETTINGS' ) or define( 'SHPPHE_SETTINGS', 'SHighlighterForPPHE' );
defined( 'SHPPHE_NAME' ) or define( 'SHPPHE_NAME', 'Syntax Highlighter for Post/Page HTML Editor' );
defined( 'SHPPHE_VERSION' ) or define( 'SHPPHE_VERSION', get_file_data( __FILE__, array( 'Version' ) ) );

/**
 * Load the plugin modules
 *
 * @since 2.0
 */
require_once( SHPPHE_PATH . 'inc/php/core.php' );
require_once( SHPPHE_PATH . 'inc/php/enqueue.php' );
require_once( SHPPHE_PATH . 'inc/php/version.php' );
require_once( SHPPHE_PATH . 'inc/php/functional.php' );
require_once( SHPPHE_PATH . 'inc/php/page.php' );
require_once( SHPPHE_PATH . 'inc/php/messages.php' );
require_once( SHPPHE_PATH . 'inc/php/uninstall.php' );
