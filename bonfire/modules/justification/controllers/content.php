<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();
		$this->auth->restrict('Justification.Content.View');
		
		$this->load->model('justification_model', null, true);
		$this->load->model('purchaserequisition/purchaserequisition_model', null, true);
		$this->load->model('purchaseorder/purchaserequisition_purchaseorder_model', null, true);
		$this->load->model('purchaseorder/purchaseorder_model', null, true);
		$this->load->model('invoice/purchaseorder_invoice_model', null, true);
		$this->load->model('invoice/invoice_model', null, true);
		$this->load->model('usergroup/usergroup_model', null, true);
		$this->load->model('marketingactivity/marketingactivity_model', null, true);
		$this->load->model('activitytype/activitytype_model', null, true);
		
		$this->lang->load('justification');
		$this->load->helper('number');
		
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_js('jquery-ui-1.8.8.min.js');
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index($limit = 0) 
	{
		$data = array();
		$data['usergroups'] = $this->usergroup_model->find_all();
		$data['marketingactivities'] = $this->marketingactivity_model->find_all();
		$data['activitytypes'] = $this->activitytype_model->find_all();
		
		$pagination_config['base_url'] = site_url('admin/content/justification/index');
        $pagination_config['total_rows'] = $this->justification_model->count_all();
        $pagination_config['per_page']   = $this->limit ? $this->limit : 15;
        $pagination_config['num_links']   = 20;
        $pagination_config['uri_segment'] = 5;
		$this->pagination->initialize($pagination_config);
		$data['records'] = $this->justification_model->limit($pagination_config['per_page'],$limit)->order_by('id', 'desc')->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage Justification");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a Justification object.
	*/
	public function create() 
	{
		$this->auth->restrict('Justification.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_justification())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('justification_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'justification');
					
				Template::set_message(lang("justification_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/justification');
			}
			else 
			{
				Template::set_message(lang('justification_create_failure') . $this->justification_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('justification_create_new_button'));
		Template::set('toolbar_title', lang('justification_create') . ' Justification');
		
		Template::set('usergroups', $this->usergroup_model->find_all());
		Template::set('marketingactivities', $this->marketingactivity_model->find_all());
		Template::set('activitytypes', $this->activitytype_model->find_all());
		
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of Justification data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Justification.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('justification_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/justification');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_justification('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('justification_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'justification');
					
				Template::set_message(lang('justification_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('justification_edit_failure') . $this->justification_model->error, 'error');
			}
		}
		
		Template::set('justification', $this->justification_model->find($id));
	
		Template::set('toolbar_title', lang('justification_edit_heading'));
		Template::set('toolbar_title', lang('justification_edit') . ' Justification');
		
		Template::set('usergroups', $this->usergroup_model->find_all());
		Template::set('marketingactivities', $this->marketingactivity_model->find_all());
		Template::set('activitytypes', $this->activitytype_model->find_all());
		
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of Justification data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Justification.Content.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->delete_justification($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('justification_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'justification');
					
				Template::set_message(lang('justification_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('justification_delete_failure') . $this->justification_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/justification');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_justification()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_justification($type='insert', $id=0) 
	{	
					
		$this->form_validation->set_rules('justification_approval_date','Budget Approval Date','required');			
		$this->form_validation->set_rules('justification_description','Description','required');			
		$this->form_validation->set_rules('justification_amount','Budget Amount','required|max_length[11]');			
		$this->form_validation->set_rules('justification_number','Justification Number','required|max_length[255]');			
		$this->form_validation->set_rules('justification_creation_date','Justification Creation Date','required');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		$data['usergroup_id'] = $this->input->post('usergroup_id');
		$data['marketingactivity_id'] = $this->input->post('marketingactivity_id');
		$data['activitytype_id'] = $this->input->post('activitytype_id');
		$data['justification_approval_date']        = $this->input->post('justification_approval_date');
		$data['justification_description']        = $this->input->post('justification_description');
		$data['justification_amount']        = $this->input->post('justification_amount');
		$data['justification_number']        = $this->input->post('justification_number');
		$data['justification_creation_date']        = $this->input->post('justification_creation_date');
		
		if ($type == 'insert')
		{
			$id = $this->justification_model->insert($data);
			
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
			$return = $this->justification_model->update($id, $data);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------
	
	private function delete_justification($id)
	{
		// Delete the justification fisrt
		$this->justification_model->delete($id);
		
		// Find PR that corresponds to deleted jusification (only one)
		$pr = $this->purchaserequisition_model->find_by('justification_id', $id);
		//echo "<pre>";die(print_r($pr));
		
		// If PR exists, continue deletion process
		if($pr != NULL){
			// Delete PR
			$this->purchaserequisition_model->delete($pr->id);
			
			// Find PO that corresponds to deleted PR (only one)
			$pr_po = $this->purchaserequisition_purchaseorder_model->find_by('purchaserequisition_id', $pr->id);
			
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
		}
		return TRUE;
	}
	
	//--------------------------------------------------------------------

	public function index_json() 
	{
		$tag = $this->input->get("tag");
		$this->db->like('justification_number', $tag, 'after');
		$records = $this->justification_model->find_all();
		$arr = array();
		foreach($records as $record){
			$arr[] = array(
				'key' => $record->id,
				'value' => $record->justification_number,
			);
		}
		echo json_encode($arr);
		exit();
	}

}