<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Product.Settings.View');
		$this->load->model('product_model', null, true);
		$this->lang->load('product');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->product_model->find_all();

		Assets::add_js($this->load->view('settings/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage Product");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a Product object.
	*/
	public function create() 
	{
		$this->auth->restrict('Product.Settings.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_product())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('product_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'product');
					
				Template::set_message(lang("product_create_success"), 'success');
				Template::redirect(SITE_AREA .'/settings/product');
			}
			else 
			{
				Template::set_message(lang('product_create_failure') . $this->product_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('product_create_new_button'));
		Template::set('toolbar_title', lang('product_create') . ' Product');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of Product data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Product.Settings.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('product_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/product');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_product('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('product_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'product');
					
				Template::set_message(lang('product_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('product_edit_failure') . $this->product_model->error, 'error');
			}
		}
		
		Template::set('product', $this->product_model->find($id));
	
		Template::set('toolbar_title', lang('product_edit_heading'));
		Template::set('toolbar_title', lang('product_edit') . ' Product');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of Product data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Product.Settings.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->product_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('product_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'product');
					
				Template::set_message(lang('product_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('product_delete_failure') . $this->product_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/settings/product');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_product()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_product($type='insert', $id=0) 
	{	
					
		$this->form_validation->set_rules('product_name','Name','required|max_length[255]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		$data['product_name']        = $this->input->post('product_name');
		
		if ($type == 'insert')
		{
			$id = $this->product_model->insert($data);
			
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
			$return = $this->product_model->update($id, $data);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}