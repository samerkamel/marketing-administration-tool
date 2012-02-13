<div class="box create rounded">

	<h3>Invoice</h3>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table>
		<thead>
		
			
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
		
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('invoice_true') : lang('invoice_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>