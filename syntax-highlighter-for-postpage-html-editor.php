<?php
/**
 * Plugin Name: Syntax Highlighter for Post/Page HTML Editor
 * Plugin URI: https://github.com/ArthurGareginyan/syntax-highlighter-for-postpage-html-editor
 * Description: Replaces the defaults WordPress Post/Page HTML Editor with an enhanced editor with syntax highlighting and line numbering.
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 1.0
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
 */


/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Define global constants
 *
 * @since 1.0
 */
defined('SHPPHE_DIR') or define('SHPPHE_DIR', dirname(plugin_basename(__FILE__)));
defined('SHPPHE_BASE') or define('SHPPHE_BASE', plugin_basename(__FILE__));
defined('SHPPHE_URL') or define('SHPPHE_URL', plugin_dir_url(__FILE__));
defined('SHPPHE_PATH') or define('SHPPHE_PATH', plugin_dir_path(__FILE__));
defined('SHPPHE_TEXT') or define('SHPPHE_TEXT', 'syntax-highlighter-for-postpage-html-editor');
defined('SHPPHE_VERSION') or define('SHPPHE_VERSION', '1.0');

/**
 * Register text domain
 *
 * @since 1.0
 */
function SHighlighterForPPHE_textdomain() {
	load_plugin_textdomain( SHPPHE_TEXT, false, SHPPHE_DIR . '/languages/' );
}
add_action( 'init', 'SHighlighterForPPHE_textdomain' );

/**
 * Print direct link to Syntax Highlighter for Post/Page HTML Editor admin page
 *
 * Fetches array of links generated by WP Plugin admin page ( Deactivate | Edit )
 * and inserts a link to the Syntax Highlighter for Post/Page HTML Editor admin page
 *
 * @since  1.0
 * @param  array $links Array of links generated by WP in Plugin Admin page.
 * @return array        Array of links to be output on Plugin Admin page.
 */
function SHighlighterForPPHE_settings_link( $links ) {
	$settings_page = '<a href="' . admin_url( 'options-general.php?page=syntax-highlighter-for-postpage-html-editor.php' ) .'">' . __( 'Settings', SHPPHE_TEXT ) . '</a>';
	array_unshift( $links, $settings_page );
	return $links;
}
add_filter( 'plugin_action_links_'.SHPPHE_BASE, 'SHighlighterForPPHE_settings_link' );

/**
 * Print additional links to plugin meta row
 *
 * @since 1.0
 */
function SHighlighterForPPHE_plugin_row_meta( $links, $file ) {

    if ( strpos( $file, 'syntax-highlighter-for-postpage-html-editor.php' ) !== false ) {

        $new_links = array(
                           'donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank"><span class="dashicons dashicons-heart"></span> ' . __( 'Donate', SHPPHE_TEXT ) . '</a>'
                           );

        $links = array_merge( $links, $new_links );
    }

    return $links;
}
add_filter( 'plugin_row_meta', 'SHighlighterForPPHE_plugin_row_meta', 10, 2 );

/**
 * Register "Syntax Highlighter" submenu in "Settings" Admin Menu
 *
 * @since 1.0
 */
function SHighlighterForPPHE_register_submenu_page() {
	add_options_page( __( 'Syntax Highlighter for Post/Page HTML Editor', SHPPHE_TEXT ), __( 'Syntax Highlighter for Post/Page HTML Editor', SHPPHE_TEXT ), 'manage_options', basename( __FILE__ ), 'SHighlighterForPPHE_render_submenu_page' );
}
add_action( 'admin_menu', 'SHighlighterForPPHE_register_submenu_page' );

/**
 * Attach Settings Page
 *
 * @since 1.0
 */
require_once( SHPPHE_PATH . 'inc/php/settings_page.php' );

/**
 * Register settings
 *
 * @since 0.1
 */
function SHighlighterForPPHE_register_settings() {
	register_setting( 'SHighlighterForPPHE_settings_group', 'SHighlighterForPPHE_settings' );
}
add_action( 'admin_init', 'SHighlighterForPPHE_register_settings' );

/**
 * Create a content for the _load_scripts hook
 *
 * @since 1.0
 */
function SHighlighterForPPHE_prepare() {

    // Read options from BD
    $options = get_option( 'SHighlighterForPPHE_settings' );

    // CodeMirror library
    wp_enqueue_script( 'SHighlighterForWPE-codemirror-js', SHPPHE_URL . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( 'SHighlighterForWPE-codemirror-css', SHPPHE_URL . 'inc/lib/codemirror/codemirror.css' );
    wp_enqueue_script( 'SHighlighterForWPE-codemirror-mode-css', SHPPHE_URL . 'inc/lib/codemirror/mode/css.js' );
    wp_enqueue_script( 'SHighlighterForWPE-codemirror-mode-htmlmixed', SHPPHE_URL . 'inc/lib/codemirror/mode/htmlmixed.js' );
    wp_enqueue_script( 'SHighlighterForWPE-codemirror-mode-javascript', SHPPHE_URL . 'inc/lib/codemirror/mode/javascript.js' );
    wp_enqueue_script( 'SHighlighterForWPE-codemirror-mode-xml', SHPPHE_URL . 'inc/lib/codemirror/mode/xml.js' );
    wp_enqueue_script( 'SHighlighterForWPE-codemirror-setting', SHPPHE_URL . 'inc/js/codemirror-settings.js', array(), false, true );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( 'SHighlighterForWPE-codemirror-theme', SHPPHE_URL . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
    }

    // Create js object and injected it into the js file
    if ( !empty( $options['theme'] ) ) { $theme = $options['theme']; } else { $theme = "default"; };
    if ( !empty( $options['line_numbers'] ) && ( $options['line_numbers'] == "on" ) ) { $line_numbers = "true"; } else { $line_numbers = "false"; };
    if ( !empty( $options['first_line_number'] ) ) { $first_line_number = $options['first_line_number']; } else { $first_line_number = "0"; };
    if ( !empty( $options['line_wrapping'] ) && ( $options['line_wrapping'] == "on" ) ) { $line_wrapping = "true"; } else { $line_wrapping = "false"; };
    if ( !empty( $options['tab_size'] ) ) { $tab_size = $options['tab_size']; } else { $tab_size = "4"; };
    
    $script_params = array(
                           'theme' => $theme,
                           'line_numbers' => $line_numbers,
                           'first_line_number' => $first_line_number,
                           'tab_size' => $tab_size,
                           'line_wrapping' => $line_wrapping
                           );
    wp_localize_script( 'SHighlighterForWPE-codemirror-setting', 'scriptParams', $script_params );
}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 1.0
 */
function SHighlighterForPPHE_load_scripts($hook) {

    // If is a Plugin/Theme Editors page
    if ( 'post.php' == $hook )  {

        // Style sheet
        wp_enqueue_style( 'SHighlighterForWPE-editor-css', SHPPHE_URL . 'inc/css/editor.css' );
            
        SHighlighterForPPHE_prepare();
    }

    // If is a settings page of this plugin
    if ( 'settings_page_syntax-highlighter-for-postpage-html-editor' == $hook ) {

        // Style sheet
        wp_enqueue_style( 'SHighlighterForWPE-admin-css', SHPPHE_URL . 'inc/css/admin.css' );
        wp_enqueue_style( 'SHighlighterForWPE-bootstrap', SHPPHE_URL . 'inc/css/bootstrap.css' );
        wp_enqueue_style( 'SHighlighterForWPE-bootstrap-theme', SHPPHE_URL . 'inc/css/bootstrap-theme.css' );

        // JavaScript
        wp_enqueue_script( 'SHighlighterForWPE-admin-js', SHPPHE_URL . 'inc/js/admin.js', array(), false, true );
        wp_enqueue_script( 'SHighlighterForWPE-bootstrap-checkbox', SHPPHE_URL . 'inc/js/bootstrap-checkbox.min.js' );

        SHighlighterForPPHE_prepare();
    }
}
add_action( 'admin_enqueue_scripts', 'SHighlighterForPPHE_load_scripts' );

/**
 * Delete options on uninstall
 *
 * @since 0.1
 */
function SHighlighterForPPHE_uninstall() {
	delete_option( 'SHighlighterForPPHE_settings' );
}
register_uninstall_hook( __FILE__, 'SHighlighterForPPHE_uninstall' );

?>