
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($usergroup) ) {
	$usergroup = (array)$usergroup;
}
$id = isset($usergroup['id']) ? "/".$usergroup['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Name', 'usergroup_name'); ?> <span class="required">*</span>
        <input id="usergroup_name" type="text" name="usergroup_name" maxlength="225" value="<?php echo set_value('usergroup_name', isset($usergroup['usergroup_name']) ? $usergroup['usergroup_name'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Create UserGroup" /> or <?php echo anchor(SITE_AREA .'/settings/usergroup', lang('usergroup_cancel')); ?>
	</div>
	<?php echo form_close(); ?>
