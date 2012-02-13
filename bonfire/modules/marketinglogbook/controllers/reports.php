<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reports extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->load->model('marketinglogbook_model', null, true);
		$this->load->model('justification/justification_model', null, true);
		$this->load->model('usergroup/usergroup_model', null, true);
		$this->load->model('marketingactivity/marketingactivity_model', null, true);
		$this->load->model('activitytype/activitytype_model', null, true);
		$this->load->model('product/product_model', null, true);
		$this->load->model('purchaserequisition/purchaserequisition_model', null, true);
		
		$this->auth->restrict('MarketingLogbook.Reports.View');
		$this->lang->load('marketinglogbook');
		
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_js('jquery-ui-1.8.8.min.js');
		
		$this->load->helper('csv');
		$this->load->helper('number');
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index($limit = 0) 
	{
		$this->db->join('usergroup', 'usergroup.id = justification.usergroup_id', 'left');
		$this->db->join('marketingactivity', 'marketingactivity.id = justification.marketingactivity_id', 'left');
		$this->db->join('activitytype', 'activitytype.id = justification.activitytype_id', 'left');
		$this->db->join('product', 'product.id = justification.product_id', 'left');
		$this->db->join('purchaserequisition', 'justification.id = purchaserequisition.justification_id', 'left');
		$this->db->join('purchaserequisition_purchaseorder', 'purchaserequisition_purchaseorder.purchaserequisition_id = purchaserequisition.id', 'left');
		$this->db->join('purchaseorder', 'purchaserequisition_purchaseorder.purchaseorder_id = purchaseorder.id', 'left');
		$this->db->join('purchaseorder_invoice', 'purchaseorder_invoice.purchaseorder_id = purchaseorder.id', 'left');
		$this->db->join('invoice', 'purchaseorder_invoice.invoice_id = invoice.id', 'left');
		
		$is_filtered = FALSE;
		if($this->input->post('submit') || $this->input->post('download')){
			$this->form_validation->set_rules('usergroup_id','User Group','');
			$this->form_validation->set_rules('marketingactivity_id','Activity','');
			$this->form_validation->set_rules('activitytype_id','Type','');
			$this->form_validation->set_rules('product_id','Product','');
			$this->form_validation->set_rules('purchaserequisition_number','PR
			Number','');
			$this->form_validation->set_rules('purchaseorder_number','PO Number','');
			$this->form_validation->set_rules('invoice_number','Invoice Number','');
			$this->form_validation->set_rules('purchaserequisition_vendor','Vendor','');
			$this->form_validation->set_rules('start_justification_approval_date','Start Justification Approval Date','');
			$this->form_validation->set_rules('end_justification_approval_date','End Justification Approval Date','');
			$this->form_validation->set_rules('start_bast_date','Start BAST Date','');
			$this->form_validation->set_rules('end_bast_date','End BAST Date','');

			if ($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			
			if($this->input->post('usergroup_id')){
				$this->db->where('usergroup_id', $this->input->post('usergroup_id'));
				$is_filtered = TRUE;
			}
			if($this->input->post('marketingactivity_id')){
				$this->db->where('marketingactivity_id', $this->input->post('marketingactivity_id'));
				$is_filtered = TRUE;
			}
			if($this->input->post('activitytype_id')){
				$this->db->where('activitytype_id', $this->input->post('activitytype_id'));
				$is_filtered = TRUE;
			}
			if($this->input->post('product_id')){
				$this->db->where('product_id', $this->input->post('product_id'));
				$is_filtered = TRUE;
			}
			if($this->input->post('purchaserequisition_number')){
				$this->db->where('purchaserequisition_number', $this->input->post('purchaserequisition_number'));
				$is_filtered = TRUE;
			}
			if($this->input->post('purchaseorder_number')){
				$this->db->where('purchaseorder_number', $this->input->post('purchaseorder_number'));
				$is_filtered = TRUE;
			}
			if($this->input->post('invoice_number')){
				$this->db->where('invoice_number', $this->input->post('invoice_number'));
				$is_filtered = TRUE;
			}
			if($this->input->post('purchaserequisition_vendor')){
				$this->db->like('purchaserequisition_vendor', $this->input->post('purchaserequisition_vendor'));
				$is_filtered = TRUE;
			}
			if($this->input->post('start_justification_approval_date')){
				$this->db->where('justification_approval_date >=', $this->input->post('start_justification_approval_date'));
				$is_filtered = TRUE;
			}
			if($this->input->post('end_justification_approval_date')){
				$this->db->where('justification_approval_date <=', $this->input->post('end_justification_approval_date'));
				$is_filtered = TRUE;
			}
			if($this->input->post('start_bast_date')){
				$this->db->where('invoice_bast_date >=', $this->input->post('start_bast_date'));
				$is_filtered = TRUE;
			}
			if($this->input->post('end_bast_date')){
				$this->db->where('invoice_bast_date <=', $this->input->post('end_bast_date'));
				$is_filtered = TRUE;
			}
		}
		
		$data = array();
		if ($this->input->post('download')){
			$data['records'] = $this->marketinglogbook_model->order_by('justification.id', 'desc')->find_logbook();
			
			$header = explode(',', 'ID, User Group, Activity, Type, Product, Budget Approval Date, Description, Budget Amount, Justification Number, Justification Creation Date, PR Number, Vendor, Job Number, PR Creation Date, Start Circulation, Approve Manager Budget, Approve VP or GM, Circulation Complete Date, PR Submit to Procurement, PO Number, PO Received from Procurement Date, Promised Date, PO Amount, Submit to Vendor Date, BAST Date, Received in Oracle Date, Received Amount, Remark PO, Invoice Number, Invoice Received Date, Invoice Amount, Sign Manager Date, Complete Date, Sign VP or GM Date, Complete Date, Submit to Treasury Date');
			object_arr_to_csv($data['records'], $header, "logbook.csv");
			
			exit();
		}else{
			if(! $is_filtered){
				$pagination_config['base_url'] = site_url('admin/reports/marketinglogbook/index');
				$pagination_config['total_rows'] = $this->marketinglogbook_model->count_all();
				$pagination_config['per_page']   = $this->limit ? $this->limit : 25;
				$pagination_config['num_links']   = 20;
				$pagination_config['uri_segment'] = 5;
				$this->pagination->initialize($pagination_config);
				$data['records'] = $this->marketinglogbook_model->limit($pagination_config['per_page'],$limit)->order_by('justification.id', 'desc')->find_logbook();
				$data['use_pagination'] = TRUE;
			}else{
				$data['records'] = $this->marketinglogbook_model->order_by('justification.id', 'desc')->find_logbook();
				$data['use_pagination'] = FALSE;
			}
			
			Assets::add_js($this->load->view('reports/js', null, true), 'inline');
			
			$data['usergroups'] = $this->usergroup_model->find_all();
			$data['marketingactivities'] = $this->marketingactivity_model->find_all();
			$data['activitytypes'] = $this->activitytype_model->find_all();
			$data['products'] = $this->product_model->find_all();
			
			Template::set('data', $data);
			Template::set('toolbar_title', "Show Marketing Logbook");
			Template::render();
		}
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_marketinglogbook()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_marketinglogbook($type='insert', $id=0) 
	{	
		

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		
		if ($type == 'insert')
		{
			$id = $this->marketinglogbook_model->insert($data);
			
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
			$return = $this->marketinglogbook_model->update($id, $data);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}