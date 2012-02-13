<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('UserGroup.Settings.View');
		$this->load->model('usergroup_model', null, true);
		$this->lang->load('usergroup');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->usergroup_model->find_all();

		Assets::add_js($this->load->view('settings/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage UserGroup");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a UserGroup object.
	*/
	public function create() 
	{
		$this->auth->restrict('UserGroup.Settings.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_usergroup())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('usergroup_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'usergroup');
					
				Template::set_message(lang("usergroup_create_success"), 'success');
				Template::redirect(SITE_AREA .'/settings/usergroup');
			}
			else 
			{
				Template::set_message(lang('usergroup_create_failure') . $this->usergroup_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('usergroup_create_new_button'));
		Template::set('toolbar_title', lang('usergroup_create') . ' UserGroup');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of UserGroup data.
	*/
	public function edit() 
	{
		$this->auth->restrict('UserGroup.Settings.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('usergroup_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/usergroup');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_usergroup('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('usergroup_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'usergroup');
					
				Template::set_message(lang('usergroup_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('usergroup_edit_failure') . $this->usergroup_model->error, 'error');
			}
		}
		
		Template::set('usergroup', $this->usergroup_model->find($id));
	
		Template::set('toolbar_title', lang('usergroup_edit_heading'));
		Template::set('toolbar_title', lang('usergroup_edit') . ' UserGroup');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of UserGroup data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('UserGroup.Settings.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->usergroup_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('usergroup_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'usergroup');
					
				Template::set_message(lang('usergroup_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('usergroup_delete_failure') . $this->usergroup_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/settings/usergroup');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_usergroup()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_usergroup($type='insert', $id=0) 
	{	
					
		$this->form_validation->set_rules('usergroup_name','Name','required|max_length[225]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		// make sure we only pass in the fields we want
		
		$data = array();
		$data['usergroup_name']        = $this->input->post('usergroup_name');
		
		if ($type == 'insert')
		{
			$id = $this->usergroup_model->insert($data);
			
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
			$return = $this->usergroup_model->update($id, $data);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}