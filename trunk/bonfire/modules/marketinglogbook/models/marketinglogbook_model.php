<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Marketinglogbook_model extends BF_Model {

	protected $table		= "justification";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
	
	public function find_logbook()
	{
		return $this->select("
			`justification`.`id`, `usergroup_name`, `marketingactivity_name`, `activitytype_name`, 

			`justification_approval_date`, `justification_description`, `justification_amount`, `justification_number`, `justification_creation_date`, 

			`purchaserequisition_number`, `purchaserequisition_vendor`, `purchaserequisition_job_number`, `purchaserequisition_creation_date`, `purchaserequisition_start_circulation_date`, `purchaserequisition_approve_manager_date`, `purchaserequisition_approve_vp_date`, `purchaserequisition_complete_circulation_date`, `purchaserequisition_submit_proc_date`, 

			`purchaseorder_number`, `purchaseorder_received_date`, `purchaseorder_promised_date`, `purchaseorder_amount`, `purchaseorder_submit_date`, 

			`invoice_bast_date`, `invoice_received_oracle_date`, `invoice_received_amount`, `invoice_remark_po`, `invoice_number`, `invoice_received_date`, `invoice_amount`, `invoice_sign_manager_date`, `invoice_complete_1_date`, `invoice_sign_vp_date`, `invoice_complete_2_date`, `invoice_submit_date`"
		)->find_all();
	}
	
}
