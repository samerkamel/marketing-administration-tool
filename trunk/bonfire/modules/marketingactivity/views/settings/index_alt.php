<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA .'/settings/marketingactivity/create'); ?>">
		<?php echo lang('marketingactivity_create_new_button'); ?>
	</a>

	<h3><?php echo lang('marketingactivity_create_new'); ?></h3>

	<p><?php echo lang('marketingactivity_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>MarketingActivity</h2>
	<table>
		<thead>
			<tr>
			
		<th>Name</th>
		
			<th><?php echo lang('marketingactivity_actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<tr>
				
				<td><?php echo $record->marketingactivity_name?></td>
				<td><?php echo anchor(SITE_AREA .'/settings/marketingactivity/edit/'. $record->id, lang('marketingactivity_edit'), '') ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>