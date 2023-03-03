<?php

/*translation word*/
add_action( 'plugins_loaded', 'DSSFW_load_textdomain' );
function DSSFW_load_textdomain() {
    load_plugin_textdomain( 'display-stock-status-for-woocommerce', false, dirname( plugin_basename( DSSFW_PLUGIN_FILE ) ) . '/languages' ); 
}
function DSSFW_load_my_own_textdomain( $mofile, $domain ) {
    if ( 'display-stock-status-for-woocommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( DSSFW_PLUGIN_FILE ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'DSSFW_load_my_own_textdomain', 10, 2 );