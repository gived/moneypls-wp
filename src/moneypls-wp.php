<?php

/*

Plugin Name: MoneyPls

Description: Request donations nicely

Author: Gived.Org

Version: 1.0

Author URI: https://gived.org

*/

if (!defined('ABSPATH')) exit;

require_once(plugin_dir_path(__FILE__) . 'functions.php');

add_action('admin_menu', 'admin_menu_moneypls');

add_action('admin_init', 'ishf_registerSettings');


add_action('wp_head', 'ishf_frontendHeaderScript');

register_activation_hook(__FILE__, 'ishf_plugin_active_header_footer_script');



function ishf_plugin_active_header_footer_script()
{

	$campaign_id = ishf_get_option_campaign_id();


	if (empty($campaign_id)) {

		update_option('insert_campaign_id_gk', $campaign_id);
	}
}

function ishf_registerSettings()
{
	$plugin_data = get_plugin_data(__FILE__);
	$plugin_name = $plugin_data['Name'];
	register_setting($plugin_name, 'insert_campaign_id_gk', 'trim');
}


function ishf_frontendHeaderScript()
{
	echo '<script async defer src="https://cdn.gived.org/gived.js" data-gived-campaign-id="' . ishf_get_option_campaign_id() . '"></script>';
}

function admin_menu_moneypls()
{

	add_options_page('MoneyPls Config', 'MoneyPls Config', 'manage_options', 'insert-script-in-header-and-footer-option', 'ishf_options_menu_header_footer_script');
}

function ishf_options_menu_header_footer_script()
{

	if (!current_user_can('manage_options')) {

		wp_die(__('You do not have sufficient permissions to access this page.'));
	}

	include(plugin_dir_path(__FILE__) . 'options.php');
}
