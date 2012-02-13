
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($marketingactivity) ) {
	$marketingactivity = (array)$marketingactivity;
}
$id = isset($marketingactivity['id']) ? "/".$marketingactivity['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Name', 'marketingactivity_name'); ?> <span class="required">*</span>
        <input id="marketingactivity_name" type="text" name="marketingactivity_name" maxlength="225" value="<?php echo set_value('marketingactivity_name', isset($marketingactivity['marketingactivity_name']) ? $marketingactivity['marketingactivity_name'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Create MarketingActivity" /> or <?php echo anchor(SITE_AREA .'/settings/marketingactivity', lang('marketingactivity_cancel')); ?>
	</div>
	<?php echo form_close(); ?>
