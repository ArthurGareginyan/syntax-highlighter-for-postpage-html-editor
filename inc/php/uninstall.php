<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Delete options on uninstall
 *
 * @since 0.1
 */
function SHighlighterForPPHE_uninstall() {
    delete_option( 'SHighlighterForPPHE_settings' );
}
register_uninstall_hook( __FILE__, 'SHighlighterForPPHE_uninstall' );
