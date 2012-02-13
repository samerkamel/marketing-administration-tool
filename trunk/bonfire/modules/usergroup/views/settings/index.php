
<div class="view split-view">
	
	<!-- UserGroup List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['usergroup_name']) ? $record['id'] : $record['usergroup_name']); ?></b><br/>
							<span class="small"><?php echo (empty($record['usergroup_description']) ? lang('usergroup_edit_text') : $record['usergroup_description']);  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('usergroup_no_records'); ?> <?php echo anchor(SITE_AREA .'/settings/usergroup/create', lang('usergroup_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- UserGroup Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/settings/usergroup/create')?>"><?php echo lang('usergroup_create_new_button');?></a>

				<h3><?php echo lang('usergroup_create_new');?></h3>

				<p><?php echo lang('usergroup_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>UserGroup</h2>
	<table>
		<thead>
			<tr>
		<th>Name</th>
		<th><?php echo lang('usergroup_actions'); ?></th>
		</tr>
		</thead>
		<tbody>
<?php
foreach ($records as $record) : ?>
			<tr>
				<td><?php echo $record->usergroup_name?></td>
				<td><?php echo anchor(SITE_AREA .'/settings/usergroup/edit/'. $record->id, lang('usergroup_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
