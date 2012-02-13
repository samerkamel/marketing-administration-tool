<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('PurchaseRequisition.Content.View');
		$this->load->model('justification/justification_model', null, true);
		$this->load->model('purchaserequisition_model', null, true);
		$this->load->model('purchaseorder/purchaserequisition_purchaseorder_model', null, true);
		$this->load->model('purchaseorder/purchaseorder_model', null, true);
		$this->load->model('invoice/purchaseorder_invoice_model', null, true);
		$this->load->model('invoice/invoice_model', null, true);
		$this->lang->load('purchaserequisition');
		
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_css('fcbkcomplete.css');
		Assets::add_js('jquery-ui-1.8.8.min.js');
		Assets::add_js('jquery.fcbkcomplete.js');
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index($limit = 0) 
	{
		$data = array();
		$pagination_config['base_url'] = site_url('admin/content/purchaserequisition/index');
        $pagination_config['total_rows'] = $this->purchaserequisition_model->count_all();
        $pagination_config['per_page']   = $this->limit ? $this->limit : 15;
        $pagination_config['num_links']   = 20;
        $pagination_config['uri_segment'] = 5;
		$this->pagination->initialize($pagination_config);
		$data['records'] = $this->purchaserequisition_model->limit($pagination_config['per_page'],$limit)->order_by('id', 'desc')->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage PurchaseRequisition");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a PurchaseRequisition object.
	*/
	public function create() 
	{
		$this->auth->restrict('PurchaseRequisition.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_purchaserequisition())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('purchaserequisition_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'purchaserequisition');
					
				Template::set_message(lang("purchaserequisition_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/purchaserequisition');
			}
			else 
			{
				$justification_ids = $this->input->post('justification_id');
				$justification = $this->justification_model->find($justification_ids[0]);
				$justification_options = array($justification->id => $justification->justification_number);
				Template::set('justification_options', $justification_options);
				
				Template::set_message(lang('purchaserequisition_create_failure') . $this->purchaserequisition_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('purchaserequisition_create_new_button'));
		Template::set('toolbar_title', lang('purchaserequisition_create') . ' PurchaseRequisition');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of PurchaseRequisition data.
	*/
	public function edit() 
	{
		$this->auth->restrict('PurchaseRequisition.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('purchaserequisition_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/purchaserequisition');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_purchaserequisition('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('purchaserequisition_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'purchaserequisition');
					
				Template::set_message(lang('purchaserequisition_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('purchaserequisition_edit_failure') . $this->purchaserequisition_model->error, 'error');
			}
		}
		
		$purchaserequisition = $this->purchaserequisition_model->find($id);
		Template::set('purchaserequisition', $purchaserequisition);
		
		$justification = $this->justification_model->find_by(array('id' => $purchaserequisition->justification_id));
		$justification_options = array($justification->id => $justification->justification_number);
		Template::set('justification_options', $justification_options);
	
		Template::set('toolbar_title', lang('purchaserequisition_edit_heading'));
		Template::set('toolbar_title', lang('purchaserequisition_edit') . ' PurchaseRequisition');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of PurchaseRequisition data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('PurchaseRequisition.Content.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->delete_purchaserequisition($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('purchaserequisition_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'purchaserequisition');
					
				Template::set_message(lang('purchaserequisition_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('purchaserequisition_delete_failure') . $this->purchaserequisition_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/purchaserequisition');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_purchaserequisition()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_purchaserequisition($type='insert', $id=0) 
	{	
		$this->form_validation->set_rules('justification_id','Justification Number','required');			
		$this->form_validation->set_rules('purchaserequisition_number','PR Number','required|max_length[255]');			
		$this->form_validation->set_rules('purchaserequisition_vendor','Vendor','required|max_length[255]');			
		$this->form_validation->set_rules('purchaserequisition_job_number','Job Number','required|max_length[255]');			
		$this->form_validation->set_rules('purchaserequisition_creation_date','PR Creation Date','required');			
		$this->form_validation->set_rules('purchaserequisition_start_circulation_date','Start Circulation','');			
		$this->form_validation->set_rules('purchaserequisition_approve_manager_date','Approve Manager Budget','');			
		$this->form_validation->set_rules('purchaserequisition_approve_vp_date','Approve VP or GM','');			
		$this->form_validation->set_rules('purchaserequisition_complete_circulation_date','Circulation Complete Date','');			
		$this->form_validation->set_rules('purchaserequisition_submit_proc_date','PR Submit to Procurement','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		$justification_ids = $this->input->post('justification_id');
		$data['justification_id'] = $justification_ids[0];
		$data['purchaserequisition_number']        = $this->input->post('purchaserequisition_number');
		$data['purchaserequisition_vendor']        = $this->input->post('purchaserequisition_vendor');
		$data['purchaserequisition_job_number']        = $this->input->post('purchaserequisition_job_number');
		$data['purchaserequisition_creation_date']        = $this->input->post('purchaserequisition_creation_date');
		$data['purchaserequisition_start_circulation_date']        = $this->input->post('purchaserequisition_start_circulation_date');
		$data['purchaserequisition_approve_manager_date']        = $this->input->post('purchaserequisition_approve_manager_date');
		$data['purchaserequisition_approve_vp_date']        = $this->input->post('purchaserequisition_approve_vp_date');
		$data['purchaserequisition_complete_circulation_date']        = $this->input->post('purchaserequisition_complete_circulation_date');
		$data['purchaserequisition_submit_proc_date']        = $this->input->post('purchaserequisition_submit_proc_date');
		
		if ($type == 'insert')
		{
			$id = $this->purchaserequisition_model->insert($data);
			
			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->purchaserequisition_model->update($id, $data);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------

	private function delete_purchaserequisition($id)
	{
		// Delete PR
		$this->purchaserequisition_model->delete($id);
		
		// Find PO that corresponds to deleted PR (only one)
		$pr_po = $this->purchaserequisition_purchaseorder_model->find_by('purchaserequisition_id', $id);
		
		//If PR-PO relation exists, continue deletion process
		if($pr_po != NULL){
			// Delete PR-PO relation
			$this->purchaserequisition_purchaseorder_model->delete_where(array('purchaserequisition_id' => $pr_po->purchaserequisition_id));
			
			// Check if there is any relation else to the PO beside deleted PR
			$num_po = $this->purchaserequisition_purchaseorder_model->count_by('purchaseorder_id', $pr_po->purchaseorder_id);
			
			// If doesn't exist any other relation to the PO, continue deletion
			if($num_po == 0){
				$po_id = $pr_po->purchaseorder_id;
				
				// Delete PO
				$this->purchaseorder_model->delete($po_id);
				
				// Find all invoices that correspond to the deleted PO
				$po_invoices = $this->purchaseorder_invoice_model->find_all_by('purchaseorder_id', $po_id);
				
				// Delete all PO-Invoice relation
				$this->purchaseorder_invoice_model->delete_where('purchaseorder_id', $po_id);
				
				// Delete all invoices
				foreach($po_invoices as $po_invoice){
					$this->invoice_model->delete($po_invoice->invoice_id);
				}
			}
		}
		
		return TRUE;
	}

}