<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Delete options on uninstall
 */
function spacexchimp_p014_uninstall() {
    delete_option( SPACEXCHIMP_P014_SETTINGS . '_settings' );
}
register_uninstall_hook( __FILE__, 'spacexchimp_p014_uninstall' );
