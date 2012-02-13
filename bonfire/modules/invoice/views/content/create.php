
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($invoice) ) {
	$invoice = (array)$invoice;
}
$id = isset($invoice['id']) ? "/".$invoice['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>

<div>
        <?php echo form_label('PO Number', 'purchaseorder_id'); ?> <span class="required">*</span>
		
		<select id="purchaseorder_id" name="purchaseorder_id">
			<?php if(isset($purchaseorder_options)){ ?>
				<?php foreach($purchaseorder_options as $value => $option){ ?>
					<option value="<?php echo $value ?>" <?php echo set_select('purchaseorder_id', $value) ?>><?php echo $option ?></option>	
				<?php } ?>
			<?php } ?>
		</select>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#purchaseorder_id").fcbkcomplete({
					json_url: "<?php echo base_url() . SITE_AREA .'/content/invoice/purchaseorder_json'; ?>",
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
</div>

<div>
        <?php echo form_label('BAST Date', 'invoice_bast_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#invoice_bast_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_bast_date" type="text" name="invoice_bast_date"  value="<?php echo set_value('invoice_bast_date', isset($invoice['invoice_bast_date']) ? $invoice['invoice_bast_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Received in Oracle Date', 'invoice_received_oracle_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#invoice_received_oracle_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_received_oracle_date" type="text" name="invoice_received_oracle_date"  value="<?php echo set_value('invoice_received_oracle_date', isset($invoice['invoice_received_oracle_date']) ? $invoice['invoice_received_oracle_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Received Amount', 'invoice_received_amount'); ?> <span class="required">*</span>
        <input id="invoice_received_amount" type="text" name="invoice_received_amount" maxlength="11" value="<?php echo set_value('invoice_received_amount', isset($invoice['invoice_received_amount']) ? $invoice['invoice_received_amount'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Remark PO', 'invoice_remark_po'); ?> <span class="required">*</span>

        <?php // Change the values in this array to populate your dropdown as required ?>
        
<?php $options = array(
				'Open' => 'Open',
				'Close' => 'Close',
); ?>

        <?php echo form_dropdown('invoice_remark_po', $options, set_value('invoice_remark_po', isset($invoice['invoice_remark_po']) ? $invoice['invoice_remark_po'] : ''))?>
</div>                                             
                        
<div>
        <?php echo form_label('Invoice Number', 'invoice_number'); ?> <span class="required">*</span>
        <input id="invoice_number" type="text" name="invoice_number" maxlength="255" value="<?php echo set_value('invoice_number', isset($invoice['invoice_number']) ? $invoice['invoice_number'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Invoice Received Date', 'invoice_received_date'); ?> <span class="required">*</span>
			<script>head.ready(function(){$('#invoice_received_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_received_date" type="text" name="invoice_received_date"  value="<?php echo set_value('invoice_received_date', isset($invoice['invoice_received_date']) ? $invoice['invoice_received_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Invoice Amount', 'invoice_amount'); ?> <span class="required">*</span>
        <input id="invoice_amount" type="text" name="invoice_amount" maxlength="11" value="<?php echo set_value('invoice_amount', isset($invoice['invoice_amount']) ? $invoice['invoice_amount'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Sign Manager Date', 'invoice_sign_manager_date'); ?>
			<script>head.ready(function(){$('#invoice_sign_manager_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_sign_manager_date" type="text" name="invoice_sign_manager_date"  value="<?php echo set_value('invoice_sign_manager_date', isset($invoice['invoice_sign_manager_date']) ? $invoice['invoice_sign_manager_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Complete Date', 'invoice_complete_1_date'); ?>
			<script>head.ready(function(){$('#invoice_complete_1_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_complete_1_date" type="text" name="invoice_complete_1_date"  value="<?php echo set_value('invoice_complete_1_date', isset($invoice['invoice_complete_1_date']) ? $invoice['invoice_complete_1_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Sign VP or GM Date', 'invoice_sign_vp_date'); ?>
			<script>head.ready(function(){$('#invoice_sign_vp_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_sign_vp_date" type="text" name="invoice_sign_vp_date"  value="<?php echo set_value('invoice_sign_vp_date', isset($invoice['invoice_sign_vp_date']) ? $invoice['invoice_sign_vp_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Complete Date', 'invoice_complete_2_date'); ?>
			<script>head.ready(function(){$('#invoice_complete_2_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_complete_2_date" type="text" name="invoice_complete_2_date"  value="<?php echo set_value('invoice_complete_2_date', isset($invoice['invoice_complete_2_date']) ? $invoice['invoice_complete_2_date'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Submit to Treasury Date', 'invoice_submit_date'); ?>
			<script>head.ready(function(){$('#invoice_submit_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
        <input id="invoice_submit_date" type="text" name="invoice_submit_date"  value="<?php echo set_value('invoice_submit_date', isset($invoice['invoice_submit_date']) ? $invoice['invoice_submit_date'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Create Invoice" /> or <?php echo anchor(SITE_AREA .'/content/invoice', lang('invoice_cancel')); ?>
	</div>
	<?php echo form_close(); ?>
