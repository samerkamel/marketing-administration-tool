
<div class="view split-view">
	
	<!-- PurchaseRequisition List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['purchaserequisition_number']) ? $record['id'] : $record['purchaserequisition_number']); ?></b><br/>
							<span class="small"><?php echo (empty($record['purchaserequisition_vendor']) ? lang('purchaserequisition_edit_text') : $record['purchaserequisition_vendor']);  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('purchaserequisition_no_records'); ?> <?php echo anchor(SITE_AREA .'/content/purchaserequisition/create', lang('purchaserequisition_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- PurchaseRequisition Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/content/purchaserequisition/create')?>"><?php echo lang('purchaserequisition_create_new_button');?></a>

				<h3><?php echo lang('purchaserequisition_create_new');?></h3>

				<p><?php echo lang('purchaserequisition_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>PurchaseRequisition</h2>
	<table>
		<thead>
			<tr>
		<th>PR Number</th>
		<th>Vendor</th>
		<th>Job Number</th>
		<th>PR Creation Date</th>
		<th>Start Circulation</th>
		<th>Approve Manager Budget</th>
		<th>Approve VP or GM</th>
		<th>Circulation Complete Date</th>
		<th>PR Submit to Procurement</th>
		<th><?php echo lang('purchaserequisition_actions'); ?></th>
		</tr>
		</thead>
		<tbody>
<?php
foreach ($records as $record) : ?>
			<tr>
				<td><?php echo $record->purchaserequisition_number?></td>
				<td><?php echo $record->purchaserequisition_vendor?></td>
				<td><?php echo $record->purchaserequisition_job_number?></td>
				<td><?php echo $record->purchaserequisition_creation_date?></td>
				<td><?php echo $record->purchaserequisition_start_circulation_date?></td>
				<td><?php echo $record->purchaserequisition_approve_manager_date?></td>
				<td><?php echo $record->purchaserequisition_approve_vp_date?></td>
				<td><?php echo $record->purchaserequisition_complete_circulation_date?></td>
				<td><?php echo $record->purchaserequisition_submit_proc_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/purchaserequisition/edit/'. $record->id, lang('purchaserequisition_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
