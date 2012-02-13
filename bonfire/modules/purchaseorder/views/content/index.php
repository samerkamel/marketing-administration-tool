
<div class="view split-view">
	
	<!-- PurchaseOrder List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['purchaseorder_number']) ? $record['id'] : $record['purchaseorder_number']); ?></b><br/>
							<span class="small"><?php echo (empty($record['purchaseorder_amount']) ? lang('purchaseorder_edit_text') : format_number($record['purchaseorder_amount']));  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('purchaseorder_no_records'); ?> <?php echo anchor(SITE_AREA .'/content/purchaseorder/create', lang('purchaseorder_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- PurchaseOrder Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/content/purchaseorder/create')?>"><?php echo lang('purchaseorder_create_new_button');?></a>

				<h3><?php echo lang('purchaseorder_create_new');?></h3>

				<p><?php echo lang('purchaseorder_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>PurchaseOrder</h2>
	<table>
		<thead>
			<tr>
		<th>PO Number</th>
		<th>PO Received from Procurement Date</th>
		<th>Promised Date</th>
		<th>PO Amount</th>
		<th>Submit to Vendor Date</th>
		<th><?php echo lang('purchaseorder_actions'); ?></th>
		</tr>
		</thead>
		<tbody>
<?php
foreach ($records as $record) : ?>
			<tr>
				<td><?php echo $record->purchaseorder_number?></td>
				<td><?php echo $record->purchaseorder_received_date?></td>
				<td><?php echo $record->purchaseorder_promised_date?></td>
				<td><?php echo format_number($record->purchaseorder_amount)?></td>
				<td><?php echo $record->purchaseorder_submit_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/purchaseorder/edit/'. $record->id, lang('purchaseorder_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
