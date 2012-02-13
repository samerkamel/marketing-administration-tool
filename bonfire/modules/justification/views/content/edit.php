
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($justification) ) {
	$justification = (array)$justification;
}
$id = isset($justification['id']) ? "/".$justification['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>

<div>
	<?php echo form_label('User Group', 'usergroup_id'); ?> <span class="required">*</span>
	<?php
		$options = array();
		foreach($usergroups as $usergroup){
			$options[$usergroup->id] = $usergroup->usergroup_name;
		}
	?>
	<?php echo form_dropdown('usergroup_id', $options, set_value('usergroup_id', isset($justification['usergroup_id']) ? $justification['usergroup_id'] : ''))?>
</div>

<div>
	<?php echo form_label('Activity', 'marketingactivity_id'); ?> <span class="required">*</span>
	<?php
		$options = array();
		foreach($marketingactivities as $marketingactivity){
			$options[$marketingactivity->id] = $marketingactivity->marketingactivity_name;
		}
	?>
	<?php echo form_dropdown('marketingactivity_id', $options, set_value('marketingactivity_id', isset($justification['marketingactivity_id']) ? $justification['marketingactivity_id'] : ''))?>
</div>

<div>
	<?php echo form_label('Type', 'activitytype_id'); ?> <span class="required">*</span>
	<?php
		$options = array(0 => '');
		foreach($activitytypes as $activitytype){
			$options[$activitytype->id] = $activitytype->activitytype_name;
		}
	?>
	<?php echo form_dropdown('activitytype_id', $options, set_value('activitytype_id', isset($justification['activitytype_id']) ? $justification['activitytype_id'] : ''))?>
</div>

<div>
	<?php echo form_label('Product', 'product_id'); ?> <span class="required">*</span>
	<?php
		$options = array(0 => '');
		foreach($products as $product){
			$options[$product->id] = $product->product_name;
		}
	?>
	<?php echo form_dropdown('product_id', $options, set_value('product_id', isset($justification['product_id']) ? $justification['product_id'] : ''))?>
</div>

<div>
        <?php echo form_label('Budget Approval Date', 'justification_approval_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#justification_approval_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="justification_approval_date" type="text" name="justification_approval_date"  value="<?php echo set_value('justification_approval_date', isset($justification['justification_approval_date']) ? $justification['justification_approval_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Description', 'justification_description'); ?> <span class="required">*</span>
	<?php echo form_textarea( array( 'name' => 'justification_description', 'id' => 'justification_description', 'rows' => '5', 'cols' => '80', 'value' => set_value('justification_description', isset($justification['justification_description']) ? $justification['justification_description'] : '') ) )?>
</div>
<div>
        <?php echo form_label('Budget Amount', 'justification_amount'); ?> <span class="required">*</span>
        <input id="justification_amount" type="text" name="justification_amount" maxlength="11" value="<?php echo set_value('justification_amount', isset($justification['justification_amount']) ? $justification['justification_amount'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Justification Number', 'justification_number'); ?> <span class="required">*</span>
        <input id="justification_number" type="text" name="justification_number" maxlength="255" value="<?php echo set_value('justification_number', isset($justification['justification_number']) ? $justification['justification_number'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Justification Creation Date', 'justification_creation_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#justification_creation_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="justification_creation_date" type="text" name="justification_creation_date"  value="<?php echo set_value('justification_creation_date', isset($justification['justification_creation_date']) ? $justification['justification_creation_date'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit Justification" /> or <?php echo anchor(SITE_AREA .'/content/justification', lang('justification_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/content/justification/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('justification_delete_confirm'); ?>')"><?php echo lang('justification_delete_record'); ?></a>
		
		<h3><?php echo lang('justification_delete_record'); ?></h3>
		
		<p><?php echo lang('justification_edit_text'); ?></p>
	</div>
