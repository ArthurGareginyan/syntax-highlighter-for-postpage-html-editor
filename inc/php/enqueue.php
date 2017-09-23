<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 */
function spacexchimp_p014_load_scripts_base( $options ) {

    // Put value of constants to variables for easier access
    $slug = SPACEXCHIMP_P014_SLUG;
    $prefix = SPACEXCHIMP_P014_PREFIX;
    $url = SPACEXCHIMP_P014_URL;

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // CodeMirror library
    wp_enqueue_script( $prefix . '-codemirror-js', $url . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( $prefix . '-codemirror-css', $url . 'inc/lib/codemirror/codemirror.css' );
    wp_enqueue_script( $prefix . '-codemirror-mode-css-js', $url . 'inc/lib/codemirror/mode/css.js' );
    wp_enqueue_script( $prefix . '-codemirror-mode-htmlmixed-js', $url . 'inc/lib/codemirror/mode/htmlmixed.js' );
    wp_enqueue_script( $prefix . '-codemirror-mode-javascript-js', $url . 'inc/lib/codemirror/mode/javascript.js' );
    wp_enqueue_script( $prefix . '-codemirror-mode-xml-js', $url . 'inc/lib/codemirror/mode/xml.js' );
    wp_enqueue_script( $prefix . '-codemirror-setting-js', $url . 'inc/js/codemirror-settings.js', array(), false, true );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( $prefix . '-codemirror-theme-css', $url . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
    }

    // Dynamic JS. Create JS object and injected it into the JS file
    $theme = !empty( $options['theme'] ) ? $options['theme'] : 'default';
    $first_line_number = !empty( $options['first_line_number'] ) ? $options['first_line_number'] : '0';
    $tab_size = !empty( $options['tab_size'] ) ? $options['tab_size'] : '4';
    if ( !empty( $options['line_numbers'] ) && ( $options['line_numbers'] == "on" ) ) {
        $line_numbers = "true";
    } else {
        $line_numbers = "false";
    }
    if ( !empty( $options['line_wrapping'] ) && ( $options['line_wrapping'] == "on" ) ) {
        $line_wrapping = "true";
    } else {
        $line_wrapping = "false";
    }
    $script_params = array(
                           'theme' => $theme,
                           'line_numbers' => $line_numbers,
                           'first_line_number' => $first_line_number,
                           'tab_size' => $tab_size,
                           'line_wrapping' => $line_wrapping
                           );
    wp_localize_script( $prefix . '-codemirror-setting-js', $prefix . '_scriptParams', $script_params );

}

/**
 * Load scripts and style sheet for settings page
 */
function spacexchimp_p014_load_scripts_admin( $hook ) {

    // Put value of constants to variables for easier access
    $slug = SPACEXCHIMP_P014_SLUG;
    $prefix = SPACEXCHIMP_P014_PREFIX;
    $url = SPACEXCHIMP_P014_URL;
    $settings = SPACEXCHIMP_P014_SETTINGS;

    // If is a Plugin/Theme Editors page
    if ( 'post.php' == $hook )  {

        // Read options from database
        $options = get_option( $settings . '_settings' );

        // Style sheet
        wp_enqueue_style( $prefix . '-editor-css', $url . 'inc/css/editor.css' );

        spacexchimp_p014_load_scripts_base( $options );
    }

    // If is a settings page of this plugin
    $settings_page = 'settings_page_' . $slug;
    if ( $settings_page == $hook ) {

        // Read options from database
        $options = get_option( $settings . '_settings' );

        // Bootstrap library
        wp_enqueue_style( $prefix . '-bootstrap-css', $url . 'inc/lib/bootstrap/bootstrap.css' );
        wp_enqueue_style( $prefix . '-bootstrap-theme-css', $url . 'inc/lib/bootstrap/bootstrap-theme.css' );
        wp_enqueue_script( $prefix . '-bootstrap-js', $url . 'inc/lib/bootstrap/bootstrap.js' );

        // Font Awesome library
        wp_enqueue_style( $prefix . '-font-awesome-css', $url . 'inc/lib/font-awesome/css/font-awesome.css', 'screen' );

        // Other libraries
        wp_enqueue_script( $prefix . '-bootstrap-checkbox-js', $url . 'inc/lib/bootstrap-checkbox.js' );

        // Style sheet
        wp_enqueue_style( $prefix . '-admin-css', $url . 'inc/css/admin.css' );

        // JavaScript
        wp_enqueue_script( $prefix . '-admin-js', $url . 'inc/js/admin.js', array(), false, true );

        spacexchimp_p014_load_scripts_base( $options );
    }

}
add_action( 'admin_enqueue_scripts', 'spacexchimp_p014_load_scripts_admin' );
