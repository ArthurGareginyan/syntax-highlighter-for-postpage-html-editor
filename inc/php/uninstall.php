<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Delete options on uninstall
 *
 * @since 2.1
 */
function SHighlighterForPPHE_uninstall() {
    delete_option( SHPPHE_SETTINGS . '_settings' );
}
register_uninstall_hook( __FILE__, SHPPHE_PREFIX . '_uninstall' );
