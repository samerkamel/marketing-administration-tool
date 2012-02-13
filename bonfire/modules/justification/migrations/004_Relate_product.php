<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Relate_product extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'product_id' => array(
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

		$this->dbforge->drop_column('justification', 'product_id');

	}
	
	//--------------------------------------------------------------------
	
}