<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Invoice.Content.View');
		$this->load->model('purchaseorder/purchaseorder_model', null, true);
		$this->load->model('invoice_model', null, true);
		$this->load->model('purchaseorder_invoice_model', null, true);
		$this->lang->load('invoice');
		$this->load->helper('number');
		
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
		$pagination_config['base_url'] = site_url('admin/content/invoice/index');
        $pagination_config['total_rows'] = $this->invoice_model->count_all();
        $pagination_config['per_page']   = $this->limit ? $this->limit : 15;
        $pagination_config['num_links']   = 20;
        $pagination_config['uri_segment'] = 5;
		$this->pagination->initialize($pagination_config);
		$data['records'] = $this->invoice_model->limit($pagination_config['per_page'],$limit)->order_by('id', 'desc')->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage Invoice");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a Invoice object.
	*/
	public function create() 
	{
		$this->auth->restrict('Invoice.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_invoice())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('invoice_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'invoice');
					
				Template::set_message(lang("invoice_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/invoice');
			}
			else 
			{
				$purchaseorder_options = array();
				$purchaseorder_ids = $this->input->post('purchaseorder_id');
				if($purchaseorder_ids != ""){
					$po_id = $purchaseorder_ids[0];
					$purchaseorder = $this->purchaseorder_model->find_by('id', $po_id);
					$purchaseorder_options[$po_id] = $purchaseorder->purchaseorder_number;
				}
				Template::set('purchaseorder_options', $purchaseorder_options);
				
				Template::set_message(lang('invoice_create_failure') . $this->invoice_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('invoice_create_new_button'));
		Template::set('toolbar_title', lang('invoice_create') . ' Invoice');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of Invoice data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Invoice.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('invoice_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/invoice');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_invoice('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('invoice_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'invoice');
					
				Template::set_message(lang('invoice_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('invoice_edit_failure') . $this->invoice_model->error, 'error');
			}
		}
		
		Template::set('invoice', $this->invoice_model->find($id));
		
		$purchaseorder_options = array();
		$po_invoice_id = $this->purchaseorder_invoice_model->find_by('invoice_id', $id);
		$purchaseorder = $this->purchaseorder_model->find_by('id', $po_invoice_id->purchaseorder_id);
		$purchaseorder_options[$po_invoice_id->purchaseorder_id] = $purchaseorder->purchaseorder_number;
		Template::set('purchaseorder_options', $purchaseorder_options);
	
		Template::set('toolbar_title', lang('invoice_edit_heading'));
		Template::set('toolbar_title', lang('invoice_edit') . ' Invoice');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of Invoice data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Invoice.Content.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->delete_invoice($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('invoice_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'invoice');
					
				Template::set_message(lang('invoice_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('invoice_delete_failure') . $this->invoice_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/invoice');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_invoice()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_invoice($type='insert', $id=0) 
	{	
		$this->form_validation->set_rules('purchaseorder_id','PO Number','required');
		$this->form_validation->set_rules('invoice_bast_date','BAST Date','required');			
		$this->form_validation->set_rules('invoice_received_oracle_date','Received in Oracle Date','required');			
		$this->form_validation->set_rules('invoice_received_amount','Received Amount','required|max_length[11]');			
		$this->form_validation->set_rules('invoice_remark_po','Remark PO','required');			
		$this->form_validation->set_rules('invoice_number','Invoice Number','required|max_length[255]');			
		$this->form_validation->set_rules('invoice_received_date','Invoice Received Date','required');			
		$this->form_validation->set_rules('invoice_amount','Invoice Amount','required|max_length[11]');			
		$this->form_validation->set_rules('invoice_sign_manager_date','Sign Manager Date','');			
		$this->form_validation->set_rules('invoice_complete_1_date','Complete Date','');			
		$this->form_validation->set_rules('invoice_sign_vp_date','Sign VP or GM Date','');			
		$this->form_validation->set_rules('invoice_complete_2_date','Complete Date','');			
		$this->form_validation->set_rules('invoice_submit_date','Submit to Treasury Date','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// Validate Sign Manager Date
		if($this->input->post('invoice_sign_manager_date') != ''){
			$invoice_sign_manager_date = $this->input->post('invoice_sign_manager_date');
		}else{
			$invoice_sign_manager_date = '0000-00-00';
		}
		
		// Validate Complete Date
		if($this->input->post('invoice_complete_1_date') != ''){
			$invoice_complete_1_date = $this->input->post('invoice_complete_1_date');
		}else{
			$invoice_complete_1_date = '0000-00-00';
		}
		
		// Sign VP or GM Date
		if($this->input->post('invoice_sign_vp_date') != ''){
			$invoice_sign_vp_date = $this->input->post('invoice_sign_vp_date');
		}else{
			$invoice_sign_vp_date = '0000-00-00';
		}
		
		// Validate Complete Date
		if($this->input->post('invoice_complete_2_date') != ''){
			$invoice_complete_2_date = $this->input->post('invoice_complete_2_date');
		}else{
			$invoice_complete_2_date = '0000-00-00';
		}
		
		// Submit to Treasury Date
		if($this->input->post('invoice_submit_date') != ''){
			$invoice_submit_date = $this->input->post('invoice_submit_date');
		}else{
			$invoice_submit_date = '0000-00-00';
		}
		
		// make sure we only pass in the fields we want
		$data = array();
		$data['invoice_bast_date']        = $this->input->post('invoice_bast_date');
		$data['invoice_received_oracle_date']        = $this->input->post('invoice_received_oracle_date');
		$data['invoice_received_amount']        = $this->input->post('invoice_received_amount');
		$data['invoice_remark_po']        = $this->input->post('invoice_remark_po');
		$data['invoice_number']        = $this->input->post('invoice_number');
		$data['invoice_received_date']        = $this->input->post('invoice_received_date');
		$data['invoice_amount']        = $this->input->post('invoice_amount');
		$data['invoice_sign_manager_date']        = $invoice_sign_manager_date;
		$data['invoice_complete_1_date']        = $invoice_complete_1_date;
		$data['invoice_sign_vp_date']        = $invoice_sign_vp_date;
		$data['invoice_complete_2_date']        = $invoice_complete_2_date;
		$data['invoice_submit_date']        = $invoice_submit_date;
		
		if ($type == 'insert')
		{
			$id = $this->invoice_model->insert($data);
			
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
			$return = $this->invoice_model->update($id, $data);
		}
		
		$purchaseorder_ids = $this->input->post('purchaseorder_id');
		$po_id = $purchaseorder_ids[0];
		$this->purchaseorder_invoice_model->delete_where(array(
			'invoice_id' => $id,
		));
		$this->purchaseorder_invoice_model->insert(array(
			'purchaseorder_id' => $po_id,
			'invoice_id' => $id,
		));
		
		return $return;
	}

	//--------------------------------------------------------------------
	
	private function delete_invoice($id)
	{
		
		// Delete all PO-Invoice relation
		$this->purchaseorder_invoice_model->delete_where(array('invoice_id' => $id));
		
		// Delete invoice
		$this->invoice_model->delete($id);
			
		return TRUE;
	}

	public function purchaseorder_json()
	{
		$tag = $this->input->get("tag");
		$this->db->like('purchaseorder_number', $tag, 'after');
		$records = $this->purchaseorder_model->find_all();
		$arr = array();
		foreach($records as $record){
			$arr[] = array(
				'key' => $record->id,
				'value' => $record->purchaseorder_number,
			);
		}
		echo json_encode($arr);
		exit();
	}

}