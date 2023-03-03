<?php

// Error returns when woocommerce is not installed
add_action('admin_init', 'DSSFW_check_plugin_state');
function DSSFW_check_plugin_state(){
    if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
        set_transient( get_current_user_id() . 'sslpfwerror', 'message' );
    }
}

// Use for Show backend notice
add_action( 'admin_notices', 'DSSFW_show_notice');
function DSSFW_show_notice() {
    if ( get_transient( get_current_user_id() . 'sslpfwerror' ) ) {

        deactivate_plugins( plugin_basename( DSSFW_PLUGIN_FILE ) );

        delete_transient( get_current_user_id() . 'sslpfwerror' );

        echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
    }
}