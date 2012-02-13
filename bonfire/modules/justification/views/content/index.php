
<div class="view split-view">
	
	<!-- Justification List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['justification_number']) ? $record['id'] : $record['justification_number']); ?></b><br/>
							<span class="small"><?php echo (empty($record['justification_amount']) ? lang('justification_edit_text') : format_number($record['justification_amount']));  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('justification_no_records'); ?> <?php echo anchor(SITE_AREA .'/content/justification/create', lang('justification_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- Justification Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/content/justification/create')?>"><?php echo lang('justification_create_new_button');?></a>

				<h3><?php echo lang('justification_create_new');?></h3>

				<p><?php echo lang('justification_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>Justification</h2>
	<table>
		<thead>
			<tr>
		<th>User Group</th>
		<th>Activity</th>
		<th>Type</th>
		<th>Budget Approval Date</th>
		<th>Description</th>
		<th>Budget Amount</th>
		<th>Justification Number</th>
		<th>Justification Creation Date</th>
		<th><?php echo lang('justification_actions'); ?></th>
		</tr>
		</thead>
		<tbody>
<?php
foreach ($records as $record) : ?>
			<tr>
				<td><?php 
					$i = 0;
					while($record->usergroup_id != $usergroups[$i]->id && $i < sizeof($usergroups)){
						$i++;
					}
					if($i < sizeof($usergroups)){
						echo $usergroups[$i]->usergroup_name;
					}
				?></td>
				<td><?php 
					$i = 0;
					while($record->marketingactivity_id != $marketingactivities[$i]->id && $i < sizeof($marketingactivities)){
						$i++;
					}
					if($i < sizeof($marketingactivities)){
						echo $marketingactivities[$i]->marketingactivity_name;
					}
				?></td>
				<td><?php 
					$i = 0;
					while($i < sizeof($activitytypes) && $record->activitytype_id != $activitytypes[$i]->id){
						$i++;
					}
					if($i < sizeof($activitytypes)){
						echo $activitytypes[$i]->activitytype_name;
					}
				?></td>
				<td><?php echo $record->justification_approval_date?></td>
				<td><?php echo $record->justification_description?></td>
				<td><?php echo format_number($record->justification_amount) ?></td>
				<td><?php echo $record->justification_number?></td>
				<td><?php echo $record->justification_creation_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/justification/edit/'. $record->id, lang('justification_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
