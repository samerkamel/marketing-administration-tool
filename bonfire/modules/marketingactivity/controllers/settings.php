<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('MarketingActivity.Settings.View');
		$this->load->model('marketingactivity_model', null, true);
		$this->lang->load('marketingactivity');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->marketingactivity_model->find_all();

		Assets::add_js($this->load->view('settings/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage MarketingActivity");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a MarketingActivity object.
	*/
	public function create() 
	{
		$this->auth->restrict('MarketingActivity.Settings.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_marketingactivity())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('marketingactivity_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'marketingactivity');
					
				Template::set_message(lang("marketingactivity_create_success"), 'success');
				Template::redirect(SITE_AREA .'/settings/marketingactivity');
			}
			else 
			{
				Template::set_message(lang('marketingactivity_create_failure') . $this->marketingactivity_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('marketingactivity_create_new_button'));
		Template::set('toolbar_title', lang('marketingactivity_create') . ' MarketingActivity');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of MarketingActivity data.
	*/
	public function edit() 
	{
		$this->auth->restrict('MarketingActivity.Settings.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('marketingactivity_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/marketingactivity');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_marketingactivity('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('marketingactivity_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketingactivity');
					
				Template::set_message(lang('marketingactivity_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('marketingactivity_edit_failure') . $this->marketingactivity_model->error, 'error');
			}
		}
		
		Template::set('marketingactivity', $this->marketingactivity_model->find($id));
	
		Template::set('toolbar_title', lang('marketingactivity_edit_heading'));
		Template::set('toolbar_title', lang('marketingactivity_edit') . ' MarketingActivity');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of MarketingActivity data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('MarketingActivity.Settings.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->marketingactivity_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('marketingactivity_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketingactivity');
					
				Template::set_message(lang('marketingactivity_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('marketingactivity_delete_failure') . $this->marketingactivity_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/settings/marketingactivity');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_marketingactivity()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_marketingactivity($type='insert', $id=0) 
	{	
					
		$this->form_validation->set_rules('marketingactivity_name','Name','required|max_length[225]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		$data['marketingactivity_name']        = $this->input->post('marketingactivity_name');
		
		if ($type == 'insert')
		{
			$id = $this->marketingactivity_model->insert($data);
			
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
			$return = $this->marketingactivity_model->update($id, $data);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}