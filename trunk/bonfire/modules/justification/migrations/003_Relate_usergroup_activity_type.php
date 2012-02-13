<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Relate_usergroup_activity_type extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'usergroup_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
			),
			'marketingactivity_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
			),
			'activitytype_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE,
			),
		);
		$this->dbforge->add_column('justification', $fields);

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_column('justification', 'usergroup_id');
		$this->dbforge->drop_column('justification', 'marketingactivity_id');
		$this->dbforge->drop_column('justification', 'activitytype_id');

	}
	
	//--------------------------------------------------------------------
	
}