<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 *
 * @since 2.1
 */
function SHighlighterForPPHE_load_scripts_base( $options ) {

    // CodeMirror library
    wp_enqueue_script( SHPPHE_PREFIX . '-codemirror-js', SHPPHE_URL . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( SHPPHE_PREFIX . '-codemirror-css', SHPPHE_URL . 'inc/lib/codemirror/codemirror.css' );
    wp_enqueue_script( SHPPHE_PREFIX . '-codemirror-mode-css-js', SHPPHE_URL . 'inc/lib/codemirror/mode/css.js' );
    wp_enqueue_script( SHPPHE_PREFIX . '-codemirror-mode-htmlmixed-js', SHPPHE_URL . 'inc/lib/codemirror/mode/htmlmixed.js' );
    wp_enqueue_script( SHPPHE_PREFIX . '-codemirror-mode-javascript-js', SHPPHE_URL . 'inc/lib/codemirror/mode/javascript.js' );
    wp_enqueue_script( SHPPHE_PREFIX . '-codemirror-mode-xml-js', SHPPHE_URL . 'inc/lib/codemirror/mode/xml.js' );
    wp_enqueue_script( SHPPHE_PREFIX . '-codemirror-setting-js', SHPPHE_URL . 'inc/js/codemirror-settings.js', array(), false, true );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( SHPPHE_PREFIX . '-codemirror-theme-css', SHPPHE_URL . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
    }

    // Dynamic JS. Create JS object and injected it into the JS file
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
    wp_localize_script( SHPPHE_PREFIX . '-codemirror-setting-js', SHPPHE_PREFIX . '_scriptParams', $script_params );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 2.1
 */
function SHighlighterForPPHE_load_scripts_admin( $hook ) {

    // If is a Plugin/Theme Editors page
    if ( 'post.php' == $hook )  {

        // Read options from BD
        $options = get_option( SHPPHE_SETTINGS . '_settings' );

        // Style sheet
        wp_enqueue_style( SHPPHE_PREFIX . '-editor-css', SHPPHE_URL . 'inc/css/editor.css' );

        SHighlighterForPPHE_load_scripts_base( $options );
    }

    // If is a settings page of this plugin
    $settings_page = 'settings_page_' . SHPPHE_SLUG;
    if ( $settings_page == $hook ) {

        // Read options from BD
        $options = get_option( SHPPHE_SETTINGS . '_settings' );

        // Style sheet
        wp_enqueue_style( SHPPHE_PREFIX . '-admin-css', SHPPHE_URL . 'inc/css/admin.css' );

        // JavaScript
        wp_enqueue_script( SHPPHE_PREFIX . '-admin-js', SHPPHE_URL . 'inc/js/admin.js', array(), false, true );

        // Bootstrap library
        wp_enqueue_style( SHPPHE_PREFIX . '-bootstrap-css', SHPPHE_URL . 'inc/lib/bootstrap/bootstrap.css' );
        wp_enqueue_style( SHPPHE_PREFIX . '-bootstrap-theme-css', SHPPHE_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
        wp_enqueue_script( SHPPHE_PREFIX . '-bootstrap-js', SHPPHE_URL . 'inc/lib/bootstrap/bootstrap.js' );

        // Other libraries
        wp_enqueue_script( SHPPHE_PREFIX . '-bootstrap-checkbox-js', SHPPHE_URL . 'inc/lib/bootstrap-checkbox.js' );

        SHighlighterForPPHE_load_scripts_base( $options );
    }

}
add_action( 'admin_enqueue_scripts', SHPPHE_PREFIX . '_load_scripts_admin' );
