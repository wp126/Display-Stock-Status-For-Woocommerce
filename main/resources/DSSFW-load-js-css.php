<?php

/* admin style and script */
add_action( 'admin_enqueue_scripts',  'DSSFW_load_admin');
function DSSFW_load_admin(){
 	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker-alpha',DSSFW_PLUGIN_DIR.'/assets/js/wp-color-picker-alpha.js',array('wp-color-picker'), '1.0.0', true );      		
    $color_picker_strings = array(
        'clear'            => __( 'Clear', 'display-stock-status-for-woocommerce' ),
        'clearAriaLabel'   => __( 'Clear color', 'display-stock-status-for-woocommerce' ),
        'defaultString'    => __( 'Default', 'display-stock-status-for-woocommerce' ),
        'defaultAriaLabel' => __( 'Select default color', 'display-stock-status-for-woocommerce' ),
        'pick'             => __( 'Select Color', 'display-stock-status-for-woocommerce' ),
        'defaultLabel'     => __( 'Color value', 'display-stock-status-for-woocommerce' ),
    );
    wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
    wp_enqueue_script( 'wp-color-picker-alpha' );
    wp_enqueue_style( 'DSABAFW_admin_css', DSSFW_PLUGIN_DIR . '/assets/css/back_style.css', false, '1.0.0' );
}