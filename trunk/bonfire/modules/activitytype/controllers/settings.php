<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('ActivityType.Settings.View');
		$this->load->model('activitytype_model', null, true);
		$this->lang->load('activitytype');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->activitytype_model->find_all();

		Assets::add_js($this->load->view('settings/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage Type");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a ActivityType object.
	*/
	public function create() 
	{
		$this->auth->restrict('ActivityType.Settings.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_activitytype())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('activitytype_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'activitytype');
					
				Template::set_message(lang("activitytype_create_success"), 'success');
				Template::redirect(SITE_AREA .'/settings/activitytype');
			}
			else 
			{
				Template::set_message(lang('activitytype_create_failure') . $this->activitytype_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('activitytype_create_new_button'));
		Template::set('toolbar_title', lang('activitytype_create') . ' Type');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of ActivityType data.
	*/
	public function edit() 
	{
		$this->auth->restrict('ActivityType.Settings.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('activitytype_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/activitytype');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_activitytype('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('activitytype_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'activitytype');
					
				Template::set_message(lang('activitytype_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('activitytype_edit_failure') . $this->activitytype_model->error, 'error');
			}
		}
		
		Template::set('activitytype', $this->activitytype_model->find($id));
	
		Template::set('toolbar_title', lang('activitytype_edit_heading'));
		Template::set('toolbar_title', lang('activitytype_edit') . ' Type');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of ActivityType data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('ActivityType.Settings.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->activitytype_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('activitytype_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'activitytype');
					
				Template::set_message(lang('activitytype_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('activitytype_delete_failure') . $this->activitytype_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/settings/activitytype');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_activitytype()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_activitytype($type='insert', $id=0) 
	{	
					
		$this->form_validation->set_rules('activitytype_name','Name','required|max_length[255]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		$data['activitytype_name']        = $this->input->post('activitytype_name');
		
		if ($type == 'insert')
		{
			$id = $this->activitytype_model->insert($data);
			
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
			$return = $this->activitytype_model->update($id, $data);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}