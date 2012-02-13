<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_purchaserequisition extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`purchaserequisition_number` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_vendor` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_job_number` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_description` TEXT NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_amount` BIGINT(11) NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_creation_date` DATE NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_start_circulation_date` DATE NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_approve_manager_date` DATE NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_approve_vp_date` DATE NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_complete_circulation_date` DATE NOT NULL");
			$this->dbforge->add_field("`purchaserequisition_submit_proc_date` DATE NOT NULL");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('purchaserequisition');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('purchaserequisition');

	}
	
	//--------------------------------------------------------------------
	
}