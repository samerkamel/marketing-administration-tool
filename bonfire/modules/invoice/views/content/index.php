
<div class="view split-view">
	
	<!-- Invoice List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['invoice_number']) ? $record['id'] : $record['invoice_number']); ?></b><br/>
							<span class="small"><?php echo (empty($record['invoice_amount']) ? lang('invoice_edit_text') : format_number($record['invoice_amount']));  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('invoice_no_records'); ?> <?php echo anchor(SITE_AREA .'/content/invoice/create', lang('invoice_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- Invoice Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/content/invoice/create')?>"><?php echo lang('invoice_create_new_button');?></a>

				<h3><?php echo lang('invoice_create_new');?></h3>

				<p><?php echo lang('invoice_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>Invoice</h2>
	<table>
		<thead>
			<tr>
		<th>BAST Date</th>
		<th>Received in Oracle Date</th>
		<th>Received Amount</th>
		<th>Remark PO</th>
		<th>Invoice Number</th>
		<th>Invoice Received Date</th>
		<th>Invoice Amount</th>
		<th>Sign Manager Date</th>
		<th>Complete Date</th>
		<th>Sign VP or GM Date</th>
		<th>Complete Date</th>
		<th>Submit to Treasury Date</th>
		<th><?php echo lang('invoice_actions'); ?></th>
		</tr>
		</thead>
		<tbody>
<?php
foreach ($records as $record) : ?>
			<tr>
				<td><?php echo $record->invoice_bast_date?></td>
				<td><?php echo $record->invoice_received_oracle_date?></td>
				<td><?php echo format_number($record->invoice_received_amount)?></td>
				<td><?php echo $record->invoice_remark_po?></td>
				<td><?php echo $record->invoice_number?></td>
				<td><?php echo $record->invoice_received_date?></td>
				<td><?php echo format_number($record->invoice_amount)?></td>
				<td><?php echo $record->invoice_sign_manager_date?></td>
				<td><?php echo $record->invoice_complete_1_date?></td>
				<td><?php echo $record->invoice_sign_vp_date?></td>
				<td><?php echo $record->invoice_complete_2_date?></td>
				<td><?php echo $record->invoice_submit_date?></td>
				<td><?php echo anchor(SITE_AREA .'/content/invoice/edit/'. $record->id, lang('invoice_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
