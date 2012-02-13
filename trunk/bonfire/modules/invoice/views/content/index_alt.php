<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA .'/content/invoice/create'); ?>">
		<?php echo lang('invoice_create_new_button'); ?>
	</a>

	<h3><?php echo lang('invoice_create_new'); ?></h3>

	<p><?php echo lang('invoice_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>Invoice</h2>
	<table>
		<thead>
			<tr>
			
		<th>BAST Date</th>
		<th>Received in Oracle Date</th>
		<th>Received Amount</th>
		<th>Remark PO</th>
		<th>Invoice Number</th>
		<th>Invoice Received Date</th>
		<th>Invoice Amount</th>
		<th>Sign Manager Date</th>
		<th>Complete Date</th>
		<th>Sign VP or GM Date</th>
		<th>Complete Date</th>
		<th>Submit to Treasury Date</th>
		
			<th><?php echo lang('invoice_actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<tr>
				
				<td><?php echo $record->invoice_bast_date?></td>
				<td><?php echo $record->invoice_received_oracle_date?></td>
				<td><?php echo $record->invoice_received_amount?></td>
				<td><?php echo $record->invoice_remark_po?></td>
				<td><?php echo $record->invoice_number?></td>
				<td><?php echo $record->invoice_received_date?></td>
				<td><?php echo $record->invoice_amount?></td>
				<td><?php echo $record->invoice_sign_manager_date?></td>
				<td><?php echo $record->invoice_complete_1_date?></td>
				<td><?php echo $record->invoice_sign_vp_date?></td>
				<td><?php echo $record->invoice_complete_2_date?></td>
				<td><?php echo $record->invoice_submit_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/invoice/edit/'. $record->id, lang('invoice_edit'), '') ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>