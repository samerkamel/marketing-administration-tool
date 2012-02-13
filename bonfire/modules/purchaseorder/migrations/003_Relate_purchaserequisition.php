<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Relate_purchaserequisition extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`purchaserequisition_id` int(11) NOT NULL');
		$this->dbforge->add_field('`purchaseorder_id` int(11) NOT NULL');
		$this->dbforge->add_key('purchaserequisition_id', true);
		$this->dbforge->add_key('purchaseorder_id', true);
		$this->dbforge->create_table('purchaserequisition_purchaseorder');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('purchaserequisition_purchaseorder');

	}
	
	//--------------------------------------------------------------------
	
}