
<div class="view split-view">
	
	<!-- ActivityType List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['activitytype_name']) ? $record['id'] : $record['activitytype_name']); ?></b><br/>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('activitytype_no_records'); ?> <?php echo anchor(SITE_AREA .'/settings/activitytype/create', lang('activitytype_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- ActivityType Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/settings/activitytype/create')?>"><?php echo lang('activitytype_create_new_button');?></a>

				<h3><?php echo lang('activitytype_create_new');?></h3>

				<p><?php echo lang('activitytype_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>Type</h2>
	<table>
		<thead>
			<tr>
		<th>Name</th>
		<th><?php echo lang('activitytype_actions'); ?></th>
		</tr>
		</thead>
		<tbody>
<?php
foreach ($records as $record) : ?>
			<tr>
				<td><?php echo $record->activitytype_name?></td>
				<td><?php echo anchor(SITE_AREA .'/settings/activitytype/edit/'. $record->id, lang('activitytype_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
