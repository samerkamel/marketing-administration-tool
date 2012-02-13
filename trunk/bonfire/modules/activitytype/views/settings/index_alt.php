<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA .'/settings/activitytype/create'); ?>">
		<?php echo lang('activitytype_create_new_button'); ?>
	</a>

	<h3><?php echo lang('activitytype_create_new'); ?></h3>

	<p><?php echo lang('activitytype_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>ActivityType</h2>
	<table>
		<thead>
			<tr>
			
		<th>Name</th>
		
			<th><?php echo lang('activitytype_actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<tr>
				
				<td><?php echo $record->activitytype_name?></td>
				<td><?php echo anchor(SITE_AREA .'/settings/activitytype/edit/'. $record->id, lang('activitytype_edit'), '') ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>