
<div class="view split-view">
	
	<!-- MarketingActivity List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['marketingactivity_name']) ? $record['id'] : $record['marketingactivity_name']); ?></b><br/>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('marketingactivity_no_records'); ?> <?php echo anchor(SITE_AREA .'/settings/marketingactivity/create', lang('marketingactivity_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- MarketingActivity Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/settings/marketingactivity/create')?>"><?php echo lang('marketingactivity_create_new_button');?></a>

				<h3><?php echo lang('marketingactivity_create_new');?></h3>

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
<?php
foreach ($records as $record) : ?>
			<tr>
				<td><?php echo $record->marketingactivity_name?></td>
				<td><?php echo anchor(SITE_AREA .'/settings/marketingactivity/edit/'. $record->id, lang('marketingactivity_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
