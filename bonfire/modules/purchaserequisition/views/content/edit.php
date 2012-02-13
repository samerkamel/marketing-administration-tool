
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($purchaserequisition) ) {
	$purchaserequisition = (array)$purchaserequisition;
}
$id = isset($purchaserequisition['id']) ? "/".$purchaserequisition['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>

<div>
        <?php echo form_label('Justification Number', 'justification_id'); ?> <span class="required">*</span>
        <?php 
			if(isset($justification_options)){
				$options = $justification_options;
			}else{
				$options = array();
			}
		?>
		<?php echo form_dropdown('justification_id', $options, set_value('justification_id', isset($purchaserequisition['justification_id']) ? $purchaserequisition['justification_id'] : ''), "id='justification_id'")?>
</div>

<div>
        <?php echo form_label('PR Number', 'purchaserequisition_number'); ?> <span class="required">*</span>
        <input id="purchaserequisition_number" type="text" name="purchaserequisition_number" maxlength="255" value="<?php echo set_value('purchaserequisition_number', isset($purchaserequisition['purchaserequisition_number']) ? $purchaserequisition['purchaserequisition_number'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Vendor', 'purchaserequisition_vendor'); ?> <span class="required">*</span>
        <input id="purchaserequisition_vendor" type="text" name="purchaserequisition_vendor" maxlength="255" value="<?php echo set_value('purchaserequisition_vendor', isset($purchaserequisition['purchaserequisition_vendor']) ? $purchaserequisition['purchaserequisition_vendor'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Job Number', 'purchaserequisition_job_number'); ?> <span class="required">*</span>
        <input id="purchaserequisition_job_number" type="text" name="purchaserequisition_job_number" maxlength="255" value="<?php echo set_value('purchaserequisition_job_number', isset($purchaserequisition['purchaserequisition_job_number']) ? $purchaserequisition['purchaserequisition_job_number'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('PR Creation Date', 'purchaserequisition_creation_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#purchaserequisition_creation_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaserequisition_creation_date" type="text" name="purchaserequisition_creation_date"  value="<?php echo set_value('purchaserequisition_creation_date', isset($purchaserequisition['purchaserequisition_creation_date']) ? $purchaserequisition['purchaserequisition_creation_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Start Circulation', 'purchaserequisition_start_circulation_date'); ?>
			<script>head.ready(function(){$('#purchaserequisition_start_circulation_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaserequisition_start_circulation_date" type="text" name="purchaserequisition_start_circulation_date"  value="<?php echo set_value('purchaserequisition_start_circulation_date', isset($purchaserequisition['purchaserequisition_start_circulation_date']) ? $purchaserequisition['purchaserequisition_start_circulation_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Approve Manager Budget', 'purchaserequisition_approve_manager_date'); ?>
			<script>head.ready(function(){$('#purchaserequisition_approve_manager_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaserequisition_approve_manager_date" type="text" name="purchaserequisition_approve_manager_date"  value="<?php echo set_value('purchaserequisition_approve_manager_date', isset($purchaserequisition['purchaserequisition_approve_manager_date']) ? $purchaserequisition['purchaserequisition_approve_manager_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Approve VP or GM', 'purchaserequisition_approve_vp_date'); ?>
			<script>head.ready(function(){$('#purchaserequisition_approve_vp_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaserequisition_approve_vp_date" type="text" name="purchaserequisition_approve_vp_date"  value="<?php echo set_value('purchaserequisition_approve_vp_date', isset($purchaserequisition['purchaserequisition_approve_vp_date']) ? $purchaserequisition['purchaserequisition_approve_vp_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Circulation Complete Date', 'purchaserequisition_complete_circulation_date'); ?>
			<script>head.ready(function(){$('#purchaserequisition_complete_circulation_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaserequisition_complete_circulation_date" type="text" name="purchaserequisition_complete_circulation_date"  value="<?php echo set_value('purchaserequisition_complete_circulation_date', isset($purchaserequisition['purchaserequisition_complete_circulation_date']) ? $purchaserequisition['purchaserequisition_complete_circulation_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('PR Submit to Procurement', 'purchaserequisition_submit_proc_date'); ?>
			<script>head.ready(function(){$('#purchaserequisition_submit_proc_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaserequisition_submit_proc_date" type="text" name="purchaserequisition_submit_proc_date"  value="<?php echo set_value('purchaserequisition_submit_proc_date', isset($purchaserequisition['purchaserequisition_submit_proc_date']) ? $purchaserequisition['purchaserequisition_submit_proc_date'] : ''); ?>"  />
</div>



<div class="text-right">
	<br/>
	<input type="submit" name="submit" value="Edit PurchaseRequisition" /> or <?php echo anchor(SITE_AREA .'/content/purchaserequisition', lang('purchaserequisition_cancel')); ?>
</div>
<?php echo form_close(); ?>

<div class="box delete rounded">
	<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/content/purchaserequisition/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('purchaserequisition_delete_confirm'); ?>')"><?php echo lang('purchaserequisition_delete_record'); ?></a>
	
	<h3><?php echo lang('purchaserequisition_delete_record'); ?></h3>
	
	<p><?php echo lang('purchaserequisition_edit_text'); ?></p>
</div>

<!-- Java Script -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#justification_id").fcbkcomplete({
			json_url: "<?php echo base_url() . SITE_AREA .'/content/justification/index_json'; ?>",
			addontab: true,                   
			maxitems: 1,
			input_min_size: 0,
			height: 10,
			cache: true,
			newel: false,
			select_all_text: "select",
		});
	});
</script>