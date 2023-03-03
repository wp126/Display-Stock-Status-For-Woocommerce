<?php

/*Stock POsition shoop lood action*/
if(get_option('show_stocks', 'on') == 'on'){
    if(get_option('stock_position', 'after_shop_loop') == 'after_shop_loop'){
        add_action('woocommerce_after_shop_loop_item','DSSFW_shop_page_stock_status' );     
    }elseif(get_option('stock_position', 'after_shop_loop') == 'after_title'){
        add_action('woocommerce_after_shop_loop_item_title','DSSFW_shop_page_stock_status');
    }elseif(get_option('stock_position', 'after_shop_loop') == 'before_title'){
        add_action('woocommerce_before_shop_loop_item_title','DSSFW_shop_page_stock_status');
    }                
}

/*stock status Function*/
function DSSFW_shop_page_stock_status(){
	global $product;
    $stocks = $product->get_stock_quantity();
    $targeted_text2 = sprintf('%s in stock (can be backordered)', $stocks);
    if( get_option('display_icon', 'on') == 'on' ) {
        $in_stock = '<?xml version="1.0" encoding="iso-8859-1"?><!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><svg version="1.1" id="Layer_1" style="fill: '.esc_attr(get_option('in_stock_color',"#0f834d")).';" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 485 485" style="enable-background:new 0 0 485 485;" xml:space="preserve"><g><path d="M413.974,71.026C368.171,25.225,307.274,0,242.5,0S116.829,25.225,71.026,71.026C25.225,116.829,0,177.726,0,242.5
        s25.225,125.671,71.026,171.474C116.829,459.775,177.726,485,242.5,485s125.671-25.225,171.474-71.026
        C459.775,368.171,485,307.274,485,242.5S459.775,116.829,413.974,71.026z M242.5,455C125.327,455,30,359.673,30,242.5
        S125.327,30,242.5,30S455,125.327,455,242.5S359.673,455,242.5,455z"/><path d="M318.514,231.486c19.299,0,35-15.701,35-35s-15.701-35-35-35s-35,15.701-35,35S299.215,231.486,318.514,231.486z"/><path d="M166.486,231.486c19.299,0,35-15.701,35-35s-15.701-35-35-35s-35,15.701-35,35S147.188,231.486,166.486,231.486z"/><path d="M242.5,355c-46.911,0-89.35-29.619-105.604-73.703l-28.148,10.378C129.329,347.496,183.08,385,242.5,385 s113.171-37.504,133.752-93.325l-28.148-10.378C331.85,325.381,289.411,355,242.5,355z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
        $out_of_stock = '<?xml version="1.0" encoding="iso-8859-1"?><!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg version="1.1" id="Capa_1" style="fill: '.esc_attr(get_option("out_stock_color","#e2401c")).';" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="106.059px" height="106.059px" viewBox="0 0 106.059 106.059" style="enable-background:new 0 0 106.059 106.059;" xml:space="preserve"><g><path d="M90.546,15.518C69.858-5.172,36.199-5.172,15.515,15.513C-5.173,36.198-5.171,69.858,15.517,90.547 c20.682,20.684,54.341,20.684,75.027-0.004C111.23,69.858,111.229,36.2,90.546,15.518z M84.757,84.758 c-17.494,17.494-45.96,17.496-63.455,0.002c-17.498-17.497-17.496-45.966,0-63.46C38.796,3.807,67.261,3.805,84.759,21.302 C102.253,38.796,102.251,67.265,84.757,84.758z M77.017,74.001c0.658,1.521-0.042,3.286-1.562,3.943 c-1.521,0.66-3.286-0.042-3.944-1.562c-2.893-6.689-9.73-11.012-17.421-11.012c-7.868,0-14.747,4.319-17.522,11.004 c-0.479,1.154-1.596,1.851-2.771,1.851c-0.384,0-0.773-0.074-1.15-0.23c-1.53-0.636-2.255-2.392-1.62-3.921 c3.71-8.932,12.764-14.703,23.063-14.703C64.174,59.371,73.174,65.113,77.017,74.001z M33.24,38.671 c0-3.424,2.777-6.201,6.201-6.201c3.423,0,6.2,2.776,6.2,6.201c0,3.426-2.777,6.202-6.2,6.202 C36.017,44.873,33.24,42.097,33.24,38.671z M61.357,38.671c0-3.424,2.779-6.201,6.203-6.201c3.423,0,6.2,2.776,6.2,6.201 c0,3.426-2.776,6.202-6.2,6.202S61.357,42.097,61.357,38.671z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
    }else{
        $in_stock = '';
        $out_of_stock = '';
    }

    if($product->managing_stock() && (int)$product->get_stock_quantity() < 1){
        if ( $product->is_on_backorder() && $product->managing_stock() ) {
            if(!empty(get_option('dssfw_backorder_stock'))){
                echo '<p class="out_stocks" style="color: '.esc_attr(get_option('out_stock_color',"#e2401c")).'; background-color:'.esc_attr(get_option('out_stock_bg_color',"#dddddd")).';">'.$out_of_stock.esc_attr(get_option('dssfw_backorder_stock')).' </p>';
            }else{
                echo '<p class="out_stocks" style="color: '.esc_attr(get_option('out_stock_color',"#e2401c")).'; background-color:'.esc_attr(get_option('out_stock_bg_color',"#dddddd")).';">'.$out_of_stock.'Available on backorder</p>';
            } 
        }else{
            if(!empty( get_option('dssfw_out_of_stock'))){
                echo '<p class="out_stocks" style="color: '.esc_attr(get_option('out_stock_color',"#e2401c")).'; background-color:'.esc_attr(get_option('out_stock_bg_color',"#dddddd")).';">'.$out_of_stock.esc_attr(get_option('dssfw_out_of_stock')).' </p>';
            }else{
                echo '<p class="out_stocks" style="color: '.esc_attr(get_option('out_stock_color',"#e2401c")).'; background-color:'.esc_attr(get_option('out_stock_bg_color',"#dddddd")).';">'.$out_of_stock.'Out Of Stock</p>'; 
            }
            
        } 
    }elseif ( $product->is_in_stock() && $product->managing_stock() ){ 
        if ( $product->backorders_allowed() ) {
            if(!empty( get_option('dssfw_can_be_backorder_stock'))){
                echo '<p class="in_stocks" style="color: '.esc_attr(get_option('in_stock_color',"#0f834d")).'; background-color:'.esc_attr(get_option('in_stock_bg_color',"#dddddd")).';">'.$in_stock.sprintf('%s in stock '.esc_attr(get_option('dssfw_can_be_backorder_stock')), $stocks).'</p>';
            }else{
                echo '<p class="in_stocks" style="color: '.esc_attr(get_option('in_stock_color',"#0f834d")).'; background-color:'.esc_attr(get_option('in_stock_bg_color',"#dddddd")).';">'.$in_stock.sprintf('%s in stock (can be backordered)', $stocks).'</p>';
            }
        }else{
            if(!empty( get_option('dssfw_in_stock'))){
                echo '<p class="in_stocks" style="color: '.esc_attr(get_option('in_stock_color',"#0f834d")).'; background-color:'.esc_attr(get_option('in_stock_bg_color',"#dddddd")).';">'.$in_stock.sprintf(esc_attr(get_option('dssfw_in_stock'), '%s In stock'), $stocks).'</p>';
            }else{
                echo '<p class="in_stocks" style="color: '.esc_attr(get_option('in_stock_color',"#0f834d")).'; background-color:'.esc_attr(get_option('in_stock_bg_color',"#dddddd")).';">'.$in_stock.sprintf('%s In stock', $stocks).'</p>';
            }
        }  
    }
}

/*custom css in head part*/
add_action( 'wp_head','DSSFW_custom_css' );
function DSSFW_custom_css(){
    ?>
    <style type="text/css">
        p.in_stocks svg, p.out_stocks svg {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            margin-right: 5px;
        }
        p.in_stocks, p.out_stocks {
            padding: 5px 10px;
            display: inline-flex;
            width: 100%;
            margin: 10px 0px;
            align-items: center;
        }
    </style>
    <?php
}