<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Drop_description_amount extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;
		
		$this->dbforge->drop_column('purchaserequisition', 'purchaserequisition_description');
		$this->dbforge->drop_column('purchaserequisition', 'purchaserequisition_amount');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'purchaserequisition_description' => array(
				'type' => 'TEXT',
				'null' => FALSE,
			),
			'purchaserequisition_amount' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'null' => FALSE,
			),
		);
		$this->dbforge->add_column('purchaserequisition', $fields);

	}
	
	//--------------------------------------------------------------------
	
}