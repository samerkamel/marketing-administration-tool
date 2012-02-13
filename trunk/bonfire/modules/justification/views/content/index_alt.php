<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA .'/content/justification/create'); ?>">
		<?php echo lang('justification_create_new_button'); ?>
	</a>

	<h3><?php echo lang('justification_create_new'); ?></h3>

	<p><?php echo lang('justification_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>Justification</h2>
	<table>
		<thead>
			<tr>
			
		<th>Budget Approval Date</th>
		<th>Description</th>
		<th>Budget Amount</th>
		<th>Justification Number</th>
		<th>Justification Creation Date</th>
		
			<th><?php echo lang('justification_actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<tr>
				
				<td><?php echo $record->justification_approval_date?></td>
				<td><?php echo $record->justification_description?></td>
				<td><?php echo $record->justification_amount?></td>
				<td><?php echo $record->justification_number?></td>
				<td><?php echo $record->justification_creation_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/justification/edit/'. $record->id, lang('justification_edit'), '') ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>