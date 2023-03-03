<?php
/**
* Plugin Name: Display Stock Status For Woocommerce
* Description: This plugin allows create Display Stock Status For Woocommerce plugin.
* Version: 1.0
* Copyright: 2023
* Text Domain: display-stock-status-for-woocommerce
* Domain Path: /languages 
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit();
}

/*PLUGIN file */
define('DSSFW_PLUGIN_FILE', __FILE__);

/*PLUGIN DIR */
define('DSSFW_PLUGIN_DIR',plugins_url('', __FILE__));


/* front an back file loaded */
include_once('main/backend/DSSFW_comman.php');

include_once('main/backend/DSSFW_admin.php');

include_once('main/frontend/DSSFW_front.php');

include_once('main/resources/DSSFW-installation-require.php');

include_once('main/resources/DSSFW-load-js-css.php');

include_once('main/resources/DSSFW-language.php');

function DSSFW_support_and_rating_links( $links_array, $plugin_file_name, $plugin_data, $status ) {
    if ($plugin_file_name !== plugin_basename(__FILE__)) {
      return $links_array;
    }

    $links_array[] = '<a href="https://www.plugin999.com/support/">'. __('Support', 'display-stock-status-for-woocommerce') .'</a>';
    $links_array[] = '<a href="https://wordpress.org/support/plugin/display-stock-status-for-woocommerce/reviews/?filter=5">'. __('Rate the plugin ★★★★★', 'display-stock-status-for-woocommerce') .'</a>';

    return $links_array;

}
add_filter( 'plugin_row_meta', 'DSSFW_support_and_rating_links', 10, 4 );