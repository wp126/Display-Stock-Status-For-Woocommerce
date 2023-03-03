<?php
if (!defined('ABSPATH')){
    exit;
}

// Default values and save settings
add_action('init','DSSFW_init_save');
function DSSFW_init_save(){
    global $dssfw_comman;
    $optionget = array(
        'show_stocks' => 'on',
        'stock_position' => 'after_shop_loop',
        'in_stock_color' => '#0f834d',
        'out_stock_color' => '#e2401c',
        'in_stock_bg_color' => '#dddddd',
        'out_stock_bg_color' => '#dddddd',
        'dssfw_in_stock' => '%s In stock',
        'dssfw_out_of_stock' => '',
        'display_icon' => 'on',
        'dssfw_backorder_stock' => '',
        'dssfw_can_be_backorder_stock' => '',
    );

    foreach ($optionget as $key_optionget => $value_optionget) {
       $dssfw_comman[$key_optionget] = get_option( $key_optionget,$value_optionget );
    }
}