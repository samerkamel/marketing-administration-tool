<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_purchaseorder extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`purchaseorder_number` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`purchaseorder_received_date` DATE NOT NULL");
			$this->dbforge->add_field("`purchaseorder_promised_date` DATE NOT NULL");
			$this->dbforge->add_field("`purchaseorder_amount` BIGINT(11) NOT NULL");
			$this->dbforge->add_field("`purchaseorder_submit_date` DATE NOT NULL");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('purchaseorder');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('purchaseorder');

	}
	
	//--------------------------------------------------------------------
	
}