
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($purchaseorder) ) {
	$purchaseorder = (array)$purchaseorder;
}
$id = isset($purchaseorder['id']) ? "/".$purchaseorder['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>

<div>
        <?php echo form_label('PR Number(s)', 'purchaserequisition_ids'); ?> <span class="required">*</span>
		
		<select id="purchaserequisition_ids" name="purchaserequisition_ids" multiple="multiple">
			<?php if(isset($purchaserequisition_options)){ ?>
				<?php foreach($purchaserequisition_options as $value => $option){ ?>
					<option value="<?php echo $value ?>" <?php echo set_select('purchaserequisition_ids', $value, TRUE) ?>><?php echo $option ?></option>	
				<?php } ?>
			<?php } ?>
		</select>
</div>

<div>
        <?php echo form_label('PO Number', 'purchaseorder_number'); ?> <span class="required">*</span>
        <input id="purchaseorder_number" type="text" name="purchaseorder_number" maxlength="255" value="<?php echo set_value('purchaseorder_number', isset($purchaseorder['purchaseorder_number']) ? $purchaseorder['purchaseorder_number'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('PO Received from Procurement Date', 'purchaseorder_received_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#purchaseorder_received_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaseorder_received_date" type="text" name="purchaseorder_received_date"  value="<?php echo set_value('purchaseorder_received_date', isset($purchaseorder['purchaseorder_received_date']) ? $purchaseorder['purchaseorder_received_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Promised Date', 'purchaseorder_promised_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#purchaseorder_promised_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaseorder_promised_date" type="text" name="purchaseorder_promised_date"  value="<?php echo set_value('purchaseorder_promised_date', isset($purchaseorder['purchaseorder_promised_date']) ? $purchaseorder['purchaseorder_promised_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('PO Amount', 'purchaseorder_amount'); ?> <span class="required">*</span>
        <input id="purchaseorder_amount" type="text" name="purchaseorder_amount" maxlength="11" value="<?php echo set_value('purchaseorder_amount', isset($purchaseorder['purchaseorder_amount']) ? $purchaseorder['purchaseorder_amount'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Submit to Vendor Date', 'purchaseorder_submit_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#purchaseorder_submit_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="purchaseorder_submit_date" type="text" name="purchaseorder_submit_date"  value="<?php echo set_value('purchaseorder_submit_date', isset($purchaseorder['purchaseorder_submit_date']) ? $purchaseorder['purchaseorder_submit_date'] : ''); ?>"  />
</div>



<div class="text-right">
	<br/>
	<input type="submit" name="submit" value="Edit PurchaseOrder" /> or <?php echo anchor(SITE_AREA .'/content/purchaseorder', lang('purchaseorder_cancel')); ?>
</div>
<?php echo form_close(); ?>

<div class="box delete rounded">
	<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/content/purchaseorder/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('purchaseorder_delete_confirm'); ?>')"><?php echo lang('purchaseorder_delete_record'); ?></a>
	
	<h3><?php echo lang('purchaseorder_delete_record'); ?></h3>
	
	<p><?php echo lang('purchaseorder_edit_text'); ?></p>
</div>

<!-- Java Script -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#purchaserequisition_ids").fcbkcomplete({
			json_url: "<?php echo base_url() . SITE_AREA .'/content/purchaseorder/purchaserequisition_json'; ?>",
			addontab: true,                   
			maxitems: 100,
			input_min_size: 0,
			height: 10,
			cache: true,
			newel: false,
			select_all_text: "select",
		});
	});
</script>