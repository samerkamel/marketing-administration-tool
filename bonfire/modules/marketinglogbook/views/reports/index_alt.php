<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA .'/reports/marketinglogbook/create'); ?>">
		<?php echo lang('marketinglogbook_create_new_button'); ?>
	</a>

	<h3><?php echo lang('marketinglogbook_create_new'); ?></h3>

	<p><?php echo lang('marketinglogbook_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>MarketingLogbook</h2>
	<table>
		<thead>
			<tr>
			
		
			<th><?php echo lang('marketinglogbook_actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<tr>
				
				<td><?php echo anchor(SITE_AREA .'/reports/marketinglogbook/edit/'. $record->id, lang('marketinglogbook_edit'), '') ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>