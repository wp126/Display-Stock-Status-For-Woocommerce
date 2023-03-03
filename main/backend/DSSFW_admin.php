<?php
add_action('admin_menu','DSSFW_adminmenu',99);
function DSSFW_adminmenu() {
    add_submenu_page(
		 'woocommerce',
		 __('Display Stock Status', 'display-stock-status'),
		 __('Display Stock Status', 'display-stock-status'),
		 'manage_woocommerce',
		 'display-stock-status',
		 'DSSFW_add_stock_status'
	);
}

function DSSFW_add_stock_status() {
	global $dssfw_comman;
    ?>
    <div class="wrap">
    	<h1><?php echo esc_html_e('Display Stock Settings','display-stock-status-for-woocommerce');?></h1>
		<div class="card dssfw_notice">
            <h2><?php echo __('Please help us spread the word & keep the plugin up-to-date', 'display-stock-status-for-woocommerce');?></h2>
            <p>
            	<a class="button-primary button" title="<?php echo __('Rate Display Stock Status', 'display-stock-status-for-woocommerce');?>" target="_blank" href="https://www.plugin999.com/support/"><?php echo __('Support', 'display-stock-status-for-woocommerce'); ?></a>
                <a class="button-primary button" title="<?php echo __('Rate Display Stock Status', 'display-stock-status-for-woocommerce');?>" target="_blank" href="https://wordpress.org/support/plugin/display-stock-status-for-woocommerce/reviews/?filter=5"><?php echo __('Rate the plugin ★★★★★', 'display-stock-status-for-woocommerce'); ?></a>
            </p>
        </div>
    	<div class="DSSFW_container">
    		<form method="post" class="oc_dssfw">
		        <div id="dstfw-main-tab" class="tab-content current">
	                <div class="postbox">
	                	<div class="inside">
				    		<table class="data_table">
				    			<tbody>
				    			<tr>
				    				<th><h4><?php echo esc_html_e('Always show stock','display-stock-status-for-woocommerce');?></h4></th>
				    				<td>			    					
				    					<input type="checkbox" name="dssfw_comman[show_stocks]" <?php if( $dssfw_comman['show_stocks'] == 'on' ) { echo 'checked'; } ?>>
										<label for="show_stocks"> <?php echo esc_html_e('Always show available stock','display-stock-status-for-woocommerce');?> </label>
				    				</td>
				    			</tr>	
				    			<tr>
				    				<td><h4><?php echo esc_html_e('Stock position','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<select name="dssfw_comman[stock_position]" class="regular-text">
			                                <option value="after_shop_loop" <?php if($dssfw_comman['stock_position'] == 'after_shop_loop') { echo 'selected'; } ?>><?php echo esc_html_e('After shop loop (recommended)','display-stock-status-for-woocommerce');?></option>
			                                <option value="after_title" <?php if($dssfw_comman['stock_position'] == 'after_title') { echo 'selected'; } ?>><?php echo esc_html_e('After title','display-stock-status-for-woocommerce');?></option>
			                                <option value="before_title" <?php if($dssfw_comman['stock_position'] == 'before_title') { echo 'selected'; } ?>><?php echo esc_html_e('Before title','display-stock-status-for-woocommerce');?></option>
			                            </select><br>
			                            <label><i><?php echo esc_html_e('(Where the actual stock should be displayed in Shop Page)','display-stock-status-for-woocommerce');?></i></label>
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('In Stock','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" name="dssfw_comman[dssfw_in_stock]" class="regular-text" value="<?php echo esc_attr($dssfw_comman['dssfw_in_stock']); ?>"><br>
				    					<label><i><?php echo esc_html_e('( If Show Quantity Then Add %s ex. %s Product Available )','display-stock-status-for-woocommerce');?></i></label>
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('Available on backorder','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" name="dssfw_comman[dssfw_backorder_stock]" class="regular-text" value="<?php echo esc_attr($dssfw_comman['dssfw_backorder_stock']); ?>">
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('(can be backordered)','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" name="dssfw_comman[dssfw_can_be_backorder_stock]" class="regular-text" value="<?php echo esc_attr($dssfw_comman['dssfw_can_be_backorder_stock']); ?>">
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('Out Of Stock','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" name="dssfw_comman[dssfw_out_of_stock]" class="regular-text" value="<?php echo esc_attr($dssfw_comman['dssfw_out_of_stock']); ?>">
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('In Stock Color','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" class="color-picker" data-alpha="true" data-default-color="#0f834d"  name="dssfw_comman[in_stock_color]" value="<?php echo esc_attr($dssfw_comman['in_stock_color']); ?>">
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('In Stock Background Color','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" class="color-picker" data-alpha="true" data-default-color="#dddddd"  name="dssfw_comman[in_stock_bg_color]" value="<?php echo esc_attr($dssfw_comman['in_stock_bg_color']); ?>">
				    				</td>
				    			</tr>	
				    			<tr>
				    				<td><h4><?php echo esc_html_e('Out Of Stock Color','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" class="color-picker" data-alpha="true" data-default-color="#e2401c"  name="dssfw_comman[out_stock_color]" value="<?php echo esc_attr($dssfw_comman['out_stock_color']); ?>">
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('Out Of Stock Background Color','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>
				    					<input type="text" class="color-picker" data-alpha="true" data-default-color="#dddddd"  name="dssfw_comman[out_stock_bg_color]" value="<?php echo esc_attr($dssfw_comman['out_stock_bg_color']); ?>">
				    				</td>
				    			</tr>
				    			<tr>
				    				<td><h4><?php echo esc_html_e('Display Icon','display-stock-status-for-woocommerce');?></h4></td>
				    				<td>			    					
				    					<input type="checkbox" name="dssfw_comman[display_icon]" <?php if( $dssfw_comman['display_icon'] == 'on' ) { echo 'checked'; } ?>>
				    				</td>
				    			</tr>	
				    			</tbody>		    			
				    		</table>
				    	</div>
				    </div>
				</div>
	    		<input type="hidden" name="action" value="DSSFW_settings_save">
                <input type="submit" class="button-primary" name="DSSFW_txtadd_design" value="Save changes">
                <?php
                if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'DSSFW_settings_save') {
                   ?>
                    <div class="notice notice-success is-dismissible">
                        <p>
                            <strong><?php echo esc_html("Your Setting Saved Successfully...!","display-stock-status-for-woocommerce");?>
                            </strong>
                        </p>
                    </div>
                    <?php
                }
                ?>
            </form>
    	</div>
    </div>
    <?php
}


function DSSFW_admin_settings_custom_css() {
    ?>
    <style type="text/css">
    	.DSSFW_container form.oc_dssfw table tr td {
		    display: inline-block;
		    width: 750px;
		}
		.DSSFW_container form.oc_dssfw table tr td:first-child {
		    width: 250px;
		}
    </style>
    <?php
}
add_action( 'admin_head', 'DSSFW_admin_settings_custom_css' );


add_action('init','DSSFW_save_option');
function DSSFW_save_option(){

	if( current_user_can('administrator') ) { 
        
        if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'DSSFW_settings_save') {

        	$isecheckbox = array(
                'show_stocks',
                'display_icon',
            );

            foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {
                if(!isset($_REQUEST['dssfw_comman'][$value_isecheckbox])){
                    $_REQUEST['dssfw_comman'][$value_isecheckbox] ='no';
                }
            }

            foreach ($_REQUEST['dssfw_comman'] as $key_dssfw_comman => $value_dssfw_comman) {
                update_option($key_dssfw_comman, sanitize_text_field($value_dssfw_comman), 'yes');
            }   

            wp_redirect( admin_url( '/admin.php?page=display-stock-status' ) );
            exit;   
        }
    }
}