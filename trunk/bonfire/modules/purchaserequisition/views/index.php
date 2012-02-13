<div class="box create rounded">

	<h3>PurchaseRequisition</h3>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table>
		<thead>
		
			
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
		
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('purchaserequisition_true') : lang('purchaserequisition_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>