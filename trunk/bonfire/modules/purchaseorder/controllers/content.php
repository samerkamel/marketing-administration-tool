<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('PurchaseOrder.Content.View');
		
		$this->load->model('purchaserequisition/purchaserequisition_model', null, true);
		$this->load->model('purchaseorder/purchaserequisition_purchaseorder_model', null, true);
		$this->load->model('purchaseorder_model', null, true);
		$this->load->model('invoice/purchaseorder_invoice_model', null, true);
		$this->load->model('invoice/invoice_model', null, true);
		
		$this->lang->load('purchaseorder');
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
		$pagination_config['base_url'] = site_url('admin/content/purchaseorder/index');
        $pagination_config['total_rows'] = $this->purchaseorder_model->count_all();
        $pagination_config['per_page']   = $this->limit ? $this->limit : 15;
        $pagination_config['num_links']   = 20;
        $pagination_config['uri_segment'] = 5;
		$this->pagination->initialize($pagination_config);
		$data['records'] = $this->purchaseorder_model->limit($pagination_config['per_page'],$limit)->order_by('id', 'desc')->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage PurchaseOrder");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a PurchaseOrder object.
	*/
	public function create() 
	{
		$this->auth->restrict('PurchaseOrder.Content.Create');
		
		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_purchaseorder())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('purchaseorder_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'purchaseorder');
					
				Template::set_message(lang("purchaseorder_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/purchaseorder');
			}
			else 
			{
				$purchaserequisition_options = array();
				$purchaserequisition_ids = $this->input->post('purchaserequisition_ids');
				if(!isset($purchaserequisition_ids)){
					$purchaserequisition_ids = array();
				}
				foreach($purchaserequisition_ids as $pr_id){
					$purchaserequisition = $this->purchaserequisition_model->find_by('id', $pr_id);
					$purchaserequisition_options[$pr_id] = $purchaserequisition->purchaserequisition_number;
				}
				Template::set('purchaserequisition_options', $purchaserequisition_options);
		
				Template::set_message(lang('purchaseorder_create_failure') . $this->purchaseorder_model->error, 'error');
			}
		}
		
		Template::set('toolbar_title', lang('purchaseorder_create_new_button'));
		Template::set('toolbar_title', lang('purchaseorder_create') . ' PurchaseOrder');
		
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of PurchaseOrder data.
	*/
	public function edit() 
	{
		$this->auth->restrict('PurchaseOrder.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('purchaseorder_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/purchaseorder');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_purchaseorder('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('purchaseorder_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'purchaseorder');
					
				Template::set_message(lang('purchaseorder_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('purchaseorder_edit_failure') . $this->purchaseorder_model->error, 'error');
			}
		}
		
		Template::set('purchaseorder', $this->purchaseorder_model->find($id));
		
		$purchaserequisition_options = array();
		$pr_po_ids = $this->purchaserequisition_purchaseorder_model->find_all_by('purchaseorder_id', $id);
		foreach($pr_po_ids as $pr_po_id){
			$purchaserequisition = $this->purchaserequisition_model->find_by('id', $pr_po_id->purchaserequisition_id);
			$purchaserequisition_options[$pr_po_id->purchaserequisition_id] = $purchaserequisition->purchaserequisition_number;
		}
		Template::set('purchaserequisition_options', $purchaserequisition_options);
	
		Template::set('toolbar_title', lang('purchaseorder_edit_heading'));
		Template::set('toolbar_title', lang('purchaseorder_edit') . ' PurchaseOrder');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of PurchaseOrder data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('PurchaseOrder.Content.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->delete_purchaseorder($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('purchaseorder_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'purchaseorder');
					
				Template::set_message(lang('purchaseorder_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('purchaseorder_delete_failure') . $this->purchaseorder_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/purchaseorder');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_purchaseorder()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_purchaseorder($type='insert', $id=0) 
	{	
		$this->form_validation->set_rules('purchaserequisition_ids','PR Number(s)','required');			
		$this->form_validation->set_rules('purchaseorder_number','PO Number','required|max_length[255]');			
		$this->form_validation->set_rules('purchaseorder_received_date','PO Received from Procurement Date','required');			
		$this->form_validation->set_rules('purchaseorder_promised_date','Promised Date','required');			
		$this->form_validation->set_rules('purchaseorder_amount','PO Amount','required|max_length[11]');			
		$this->form_validation->set_rules('purchaseorder_submit_date','Submit to Vendor Date','required');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		$data['purchaseorder_number']        = $this->input->post('purchaseorder_number');
		$data['purchaseorder_received_date']        = $this->input->post('purchaseorder_received_date');
		$data['purchaseorder_promised_date']        = $this->input->post('purchaseorder_promised_date');
		$data['purchaseorder_amount']        = $this->input->post('purchaseorder_amount');
		$data['purchaseorder_submit_date']        = $this->input->post('purchaseorder_submit_date');
		
		if ($type == 'insert')
		{
			$id = $this->purchaseorder_model->insert($data);
			
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
			$return = $this->purchaseorder_model->update($id, $data);
		}
		
		$purchaserequisition_ids = $this->input->post('purchaserequisition_ids');
		$this->purchaserequisition_purchaseorder_model->delete_where(array(
			'purchaseorder_id' => $id,
		));
		foreach($purchaserequisition_ids as $pr_id){
			$this->purchaserequisition_purchaseorder_model->insert(array(
				'purchaserequisition_id' => $pr_id,
				'purchaseorder_id' => $id,
			));
		}
		
		return $return;
	}

	//--------------------------------------------------------------------
	
	private function delete_purchaseorder($id)
	{
		
		// Delete PR-PO relation
		$this->purchaserequisition_purchaseorder_model->delete_where(array('purchaseorder_id' => $id));
		
		// Delete PO
		$this->purchaseorder_model->delete($id);
		
		// Find all invoices that correspond to the deleted PO
		$po_invoices = $this->purchaseorder_invoice_model->find_all_by('purchaseorder_id', $id);
		
		// Delete all PO-Invoice relation
		$this->purchaseorder_invoice_model->delete_where(array('purchaseorder_id' => $id));
		
		// Delete all invoices
		foreach($po_invoices as $po_invoice){
			$this->invoice_model->delete($po_invoice->invoice_id);
		}
			
		return TRUE;
	}

	public function purchaserequisition_json()
	{
		$tag = $this->input->get("tag");
		$this->db->like('purchaserequisition_number', $tag, 'after');
		$records = $this->purchaserequisition_model->find_all();
		$arr = array();
		foreach($records as $record){
			$arr[] = array(
				'key' => $record->id,
				'value' => $record->purchaserequisition_number,
			);
		}
		echo json_encode($arr);
		exit();
	}

}