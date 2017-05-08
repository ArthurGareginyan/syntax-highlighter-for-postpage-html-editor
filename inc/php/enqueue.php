<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Create a content for the _load_scripts hook
 *
 * @since 2.0
 */
function SHighlighterForPPHE_load_scripts_base() {

    // Read options from BD
    $options = get_option( 'SHighlighterForPPHE_settings' );

    // CodeMirror library
    wp_enqueue_script( 'SHighlighterForPPHTMLE-codemirror-js', SHPPHE_URL . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( 'SHighlighterForPPHTMLE-codemirror-css', SHPPHE_URL . 'inc/lib/codemirror/codemirror.css' );
    wp_enqueue_script( 'SHighlighterForPPHTMLE-codemirror-mode-css-js', SHPPHE_URL . 'inc/lib/codemirror/mode/css.js' );
    wp_enqueue_script( 'SHighlighterForPPHTMLE-codemirror-mode-htmlmixed-js', SHPPHE_URL . 'inc/lib/codemirror/mode/htmlmixed.js' );
    wp_enqueue_script( 'SHighlighterForPPHTMLE-codemirror-mode-javascript-js', SHPPHE_URL . 'inc/lib/codemirror/mode/javascript.js' );
    wp_enqueue_script( 'SHighlighterForPPHTMLE-codemirror-mode-xml-js', SHPPHE_URL . 'inc/lib/codemirror/mode/xml.js' );
    wp_enqueue_script( 'SHighlighterForPPHTMLE-codemirror-setting-js', SHPPHE_URL . 'inc/js/codemirror-settings.js', array(), false, true );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( 'SHighlighterForPPHTMLE-codemirror-theme-css', SHPPHE_URL . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
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
    wp_localize_script( 'SHighlighterForPPHTMLE-codemirror-setting-js', 'scriptParams', $script_params );
}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 2.0
 */
function SHighlighterForPPHE_load_scripts_admin($hook) {

    // If is a Plugin/Theme Editors page
    if ( 'post.php' == $hook )  {

        // Style sheet
        wp_enqueue_style( 'SHighlighterForPPHTMLE-editor-css', SHPPHE_URL . 'inc/css/editor.css' );
            
        SHighlighterForPPHE_load_scripts_base();
    }

    // If is a settings page of this plugin
    if ( 'settings_page_syntax-highlighter-for-postpage-html-editor' == $hook ) {

        // Style sheet
        wp_enqueue_style( 'SHighlighterForPPHTMLE-admin-css', SHPPHE_URL . 'inc/css/admin.css' );

        // JavaScript
        wp_enqueue_script( 'SHighlighterForPPHTMLE-admin-js', SHPPHE_URL . 'inc/js/admin.js', array(), false, true );

        // Bootstrap library
        wp_enqueue_style( 'SHighlighterForPPHTMLE-bootstrap-css', SHPPHE_URL . 'inc/lib/bootstrap/bootstrap.css' );
        wp_enqueue_style( 'SHighlighterForPPHTMLE-bootstrap-theme-css', SHPPHE_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
        wp_enqueue_script( 'SHighlighterForPPHTMLE-bootstrap-js', SHPPHE_URL . 'inc/lib/bootstrap/bootstrap.js' );

        // Other libraries
        wp_enqueue_script( 'SHighlighterForPPHTMLE-bootstrap-checkbox-js', SHPPHE_URL . 'inc/lib/bootstrap-checkbox.js' );

        SHighlighterForPPHE_load_scripts_base();
    }
}
add_action( 'admin_enqueue_scripts', 'SHighlighterForPPHE_load_scripts_admin' );
