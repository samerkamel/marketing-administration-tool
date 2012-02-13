
<div class="view split-view">
	
	<!-- MarketingLogbook List -->
	<div class="view">
		<div class="scrollable">
			<div class="list-view">
				<br />
				<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
				<div>
					User Group:<br />
					<?php
						$options = array('' => 'ALL');
						foreach($usergroups as $usergroup){
							$options[$usergroup->id] = $usergroup->usergroup_name;
						}
					?>
					<?php echo form_dropdown('usergroup_id', $options, set_value('usergroup_id', ''))?>
				</div>
			
				<div>
					Activity:<br />
					<?php
						$options = array('' => 'ALL');
						foreach($marketingactivities as $marketingactivity){
							$options[$marketingactivity->id] = $marketingactivity->marketingactivity_name;
						}
					?>
					<?php echo form_dropdown('marketingactivity_id', $options, set_value('marketingactivity_id', ''))?>
				</div>
				
				<div>
					Type:<br />
					<?php
						$options = array('' => 'ALL');
						foreach($activitytypes as $activitytype){
							$options[$activitytype->id] = $activitytype->activitytype_name;
						}
					?>
					<?php echo form_dropdown('activitytype_id', $options, set_value('activitytype_id', ''))?>
				</div>
			
				<div>
					PR Number:<br />
					<?php echo form_input('purchaserequisition_number', set_value('purchaserequisition_number', ''))?>
				</div>
				
				<div>
					PO Number:<br />
					<?php echo form_input('purchaseorder_number', set_value('purchaseorder_number', ''))?>
				</div>
			
				<div>
					Invoice Number:<br />
					<?php echo form_input('invoice_number', set_value('invoice_number', ''))?>
				</div>
				
				<div>
					Vendor Name:<br />
					<?php echo form_input('purchaserequisition_vendor', set_value('purchaserequisition_vendor', ''))?>
				</div>
				
				<div>
					Start Justification Approval Date:<br />
					<script>head.ready(function(){$('#start_justification_approval_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
					<input id="start_justification_approval_date" type="text" name="start_justification_approval_date"  value="<?php echo set_value('start_justification_approval_date', ''); ?>"  />
				</div>
				
				<div>
					End Justification Approval Date:<br />
					<script>head.ready(function(){$('#end_justification_approval_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
					<input id="end_justification_approval_date" type="text" name="end_justification_approval_date"  value="<?php echo set_value('end_justification_approval_date', ''); ?>"  />
				</div>
				
				<div>
					Start BAST Date:<br />
					<script>head.ready(function(){$('#start_bast_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
					<input id="start_bast_date" type="text" name="start_bast_date"  value="<?php echo set_value('start_bast_date', ''); ?>"  />
				</div>
				
				<div>
					End BAST Date:<br />
					<script>head.ready(function(){$('#end_bast_date').datepicker({ dateFormat: 'yy-mm-dd'});});</script>
					<input id="end_bast_date" type="text" name="end_bast_date"  value="<?php echo set_value('end_bast_date', ''); ?>"  />
				</div>
				
				<div>
					<input name="submit" type="submit" value="Show" />
					<input name="download" type="submit" value="Download CSV" />
				</div>
				
				<br /><br /><br />
				
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	
	<!-- MarketingLogbook Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
			<h2>MarketingLogbook</h2>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<table style="max-width: 5000px; width: 5000px;">
				<thead>
					<tr>
						<th rowspan="2">User Group</th>
						<th rowspan="2">Activity</th>
						<th rowspan="2">Type</th>
						<th colspan="5">Justification</th>
						<th colspan="12">Purchase Requisition (PR)</th>
						<th colspan="5">Purchase Order (PO)</th>
						<th colspan="12">Invoice</th>
					</tr>
					<tr>
						<th>Budget Approval Date</th>
						<th>Description</th>
						<th>Budget Amount</th>
						<th>Justification Number</th>
						<th>Justification Creation Date</th>
						<th>PR Number</th>
						<th>Vendor</th>
						<th>Job Number</th>
						<th>PR Creation Date</th>
						<th>Start Circulation</th>
						<th>Approve Manager Budget</th>
						<th>Approve VP or GM</th>
						<th>Circulation Complete Date</th>
						<th>PR Submit to Procurement</th>
						<th>PO Number</th>
						<th>PO Received from Procurement Date</th>
						<th>Promised Date</th>
						<th>PO Amount</th>
						<th>Submit to Vendor Date</th>
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
					</tr>
				</thead>
				<tbody>
					<?php
						$sum_invoice_amount = 0;
					?>
					<?php foreach ($records as $record) : ?>
					<?php
						$sum_invoice_amount = $sum_invoice_amount + $record->invoice_amount;
					?>
					<tr>
						<td><?php echo $record->usergroup_name ?></td>
						<td><?php echo $record->marketingactivity_name ?></td>
						<td><?php echo $record->activitytype_name ?></td>
						<td><?php echo $record->justification_approval_date?></td>
						<td><?php echo $record->justification_description?></td>
						<td><?php echo format_number($record->justification_amount)?></td>
						<td><?php echo $record->justification_number?></td>
						<td><?php echo $record->justification_creation_date?></td>
						<td><?php echo $record->purchaserequisition_number ?></td>
						<td><?php echo $record->purchaserequisition_vendor ?></td>
						<td><?php echo $record->purchaserequisition_job_number ?></td>
						<td><?php echo $record->purchaserequisition_creation_date ?></td>
						<td><?php echo $record->purchaserequisition_start_circulation_date ?></td>
						<td><?php echo $record->purchaserequisition_approve_manager_date ?></td>
						<td><?php echo $record->purchaserequisition_approve_vp_date ?></td>
						<td><?php echo $record->purchaserequisition_complete_circulation_date ?></td>
						<td><?php echo $record->purchaserequisition_submit_proc_date ?></td>
						<td><?php echo $record->purchaseorder_number ?></td>
						<td><?php echo $record->purchaseorder_received_date ?></td>
						<td><?php echo $record->purchaseorder_promised_date ?></td>
						<td><?php echo format_number($record->purchaseorder_amount) ?></td>
						<td><?php echo $record->purchaseorder_submit_date ?></td>
						<td><?php echo $record->invoice_bast_date ?></td>
						<td><?php echo $record->invoice_received_oracle_date ?></td>
						<td><?php echo format_number($record->invoice_received_amount) ?></td>
						<td><?php echo $record->invoice_remark_po ?></td>
						<td><?php echo $record->invoice_number ?></td>
						<td><?php echo $record->invoice_received_date ?></td>
						<td><?php echo format_number($record->invoice_amount) ?></td>
						<td><?php echo $record->invoice_sign_manager_date ?></td>
						<td><?php echo $record->invoice_complete_1_date ?></td>
						<td><?php echo $record->invoice_sign_vp_date ?></td>
						<td><?php echo $record->invoice_complete_2_date ?></td>
						<td><?php echo $record->invoice_submit_date ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="28">&nbsp;</td>
						<td><?php echo format_number($sum_invoice_amount) ?></td>
						<td colspan="5">&nbsp;</td>
					</tr>
				</tfoot>
			</table>
			<?php echo $use_pagination ? $this->pagination->create_links() : '' ?>
			<?php else: ?>
			<div class="box create rounded">
				No record matches.
			</div>
			<?php endif; ?>
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
