<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA .'/content/purchaseorder/create'); ?>">
		<?php echo lang('purchaseorder_create_new_button'); ?>
	</a>

	<h3><?php echo lang('purchaseorder_create_new'); ?></h3>

	<p><?php echo lang('purchaseorder_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>PurchaseOrder</h2>
	<table>
		<thead>
			<tr>
			
		<th>PO Number</th>
		<th>PO Received from Procurement Date</th>
		<th>Promised Date</th>
		<th>PO Amount</th>
		<th>Submit to Vendor Date</th>
		
			<th><?php echo lang('purchaseorder_actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<tr>
				
				<td><?php echo $record->purchaseorder_number?></td>
				<td><?php echo $record->purchaseorder_received_date?></td>
				<td><?php echo $record->purchaseorder_promised_date?></td>
				<td><?php echo $record->purchaseorder_amount?></td>
				<td><?php echo $record->purchaseorder_submit_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/purchaseorder/edit/'. $record->id, lang('purchaseorder_edit'), '') ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>