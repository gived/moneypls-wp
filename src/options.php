<?php
if (!defined('ABSPATH')) exit;
if (isset($_POST['submit_option'])) {
	$campaign_id = sanitize_text_field(htmlentities($_POST['campaign_id']));
	$nonce = $_POST['insert_script_wpnonce'];
	if (wp_verify_nonce($nonce, 'insert_script_option_nonce')) {
		update_option('insert_campaign_id_gk', $campaign_id);
		// update_option('insert_footer_script_gk', $footer_script);
		$successmsg = mpls_success_option_msg_header_footer_script('Settings Saved.');
	} else {
		$errormsg = mpls_failure_option_msg_header_footer_script('Unable to save data!');
	}
}

$campaign_id = mpls_get_option_campaign_id();


?>

<div class="wrap">

	<h2>MoneyPls Config &raquo; <?php _e('Settings', 'MoneyPls Config'); ?></h2>

	<?php
	if (isset($successmsg)) {
	?>
		<div class="mpls_updated fade">
			<p><?php echo $successmsg; ?></p>
		</div>
	<?php
	}
	if (isset($errormsg)) {
	?>
		<div class="error fade">
			<p><?php echo $errormsg; ?></p>
		</div>
	<?php
	}
	?>

	<div class='mpls_inner'>

		<h4 class="heading-h4">Settings</h4>

		<form method="post">
			<p>
				<label for="script_in_header"> MoneyPls Campaign Id </label><br />
				<input type="text" name='campaign_id' placeholder="your-campaign-id" value='<?php echo $campaign_id; ?>'><br />

				<!-- <textarea name="campaign_id" rows="8" class="header-footer-textarea"></textarea> -->
				You can get your campaign id from <a href="https://gived.org/moneypls/create">https://gived.org/moneypls/create</a>
			</p>
			<!-- <p>
				<label for="script_in_footer"> Scripts in Footer </label>
				<textarea name="footer_script" rows="8" class="header-footer-textarea"><?php echo $footer_script; ?></textarea>
				These scripts will be printed above the <code>&lt;body&gt;</code> section.
			</p> -->
			<input type="hidden" name="insert_script_wpnonce" value="<?php echo $nonce = wp_create_nonce('insert_script_option_nonce'); ?>">
			<input type="submit" class="button button-primary " name="submit_option" value="Save">

		</form>


	</div>


</div>