<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA .'/content/purchaserequisition/create'); ?>">
		<?php echo lang('purchaserequisition_create_new_button'); ?>
	</a>

	<h3><?php echo lang('purchaserequisition_create_new'); ?></h3>

	<p><?php echo lang('purchaserequisition_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>PurchaseRequisition</h2>
	<table>
		<thead>
			<tr>
			
		<th>PR Number</th>
		<th>Vendor</th>
		<th>Job Number</th>
		<th>PR Description</th>
		<th>Amount</th>
		<th>PR Creation Date</th>
		<th>Start Circulation</th>
		<th>Approve Manager Budget</th>
		<th>Approve VP or GM</th>
		<th>Circulation Complete Date</th>
		<th>PR Submit to Procurement</th>
		
			<th><?php echo lang('purchaserequisition_actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<tr>
				
				<td><?php echo $record->purchaserequisition_number?></td>
				<td><?php echo $record->purchaserequisition_vendor?></td>
				<td><?php echo $record->purchaserequisition_job_number?></td>
				<td><?php echo $record->purchaserequisition_description?></td>
				<td><?php echo $record->purchaserequisition_amount?></td>
				<td><?php echo $record->purchaserequisition_creation_date?></td>
				<td><?php echo $record->purchaserequisition_start_circulation_date?></td>
				<td><?php echo $record->purchaserequisition_approve_manager_date?></td>
				<td><?php echo $record->purchaserequisition_approve_vp_date?></td>
				<td><?php echo $record->purchaserequisition_complete_circulation_date?></td>
				<td><?php echo $record->purchaserequisition_submit_proc_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/purchaserequisition/edit/'. $record->id, lang('purchaserequisition_edit'), '') ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>