<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_invoice extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`invoice_bast_date` DATE NOT NULL");
			$this->dbforge->add_field("`invoice_received_oracle_date` DATE NOT NULL");
			$this->dbforge->add_field("`invoice_received_amount` BIGINT(11) NOT NULL");
			$this->dbforge->add_field("`invoice_remark_po` ENUM('Open','Close') NOT NULL");
			$this->dbforge->add_field("`invoice_number` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`invoice_received_date` DATE NOT NULL");
			$this->dbforge->add_field("`invoice_amount` BIGINT(11) NOT NULL");
			$this->dbforge->add_field("`invoice_sign_manager_date` DATE NOT NULL");
			$this->dbforge->add_field("`invoice_complete_1_date` DATE NOT NULL");
			$this->dbforge->add_field("`invoice_sign_vp_date` DATE NOT NULL");
			$this->dbforge->add_field("`invoice_complete_2_date` DATE NOT NULL");
			$this->dbforge->add_field("`invoice_submit_date` DATE NOT NULL");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('invoice');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('invoice');

	}
	
	//--------------------------------------------------------------------
	
}