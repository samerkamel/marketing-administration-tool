
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($activitytype) ) {
	$activitytype = (array)$activitytype;
}
$id = isset($activitytype['id']) ? "/".$activitytype['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Name', 'activitytype_name'); ?> <span class="required">*</span>
        <input id="activitytype_name" type="text" name="activitytype_name" maxlength="255" value="<?php echo set_value('activitytype_name', isset($activitytype['activitytype_name']) ? $activitytype['activitytype_name'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit ActivityType" /> or <?php echo anchor(SITE_AREA .'/settings/activitytype', lang('activitytype_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/settings/activitytype/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('activitytype_delete_confirm'); ?>')"><?php echo lang('activitytype_delete_record'); ?></a>
		
		<h3><?php echo lang('activitytype_delete_record'); ?></h3>
		
		<p><?php echo lang('activitytype_edit_text'); ?></p>
	</div>
