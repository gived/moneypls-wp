<?php  
if( !defined( 'ABSPATH' ) ) exit;
function mpls_get_option_campaign_id()
{
	return $campaign_id=   wp_unslash(get_option('insert_campaign_id_gk'));
}

function  mpls_success_option_msg_header_footer_script($msg)
{
	
	
	echo ' <div class="notice notice-success ishf-success-msg is-dismissible"><p>'. $msg . '</p></div>';			
	
}

?>