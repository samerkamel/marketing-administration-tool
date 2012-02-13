<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_justification extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`justification_approval_date` DATE NOT NULL");
			$this->dbforge->add_field("`justification_description` TEXT NOT NULL");
			$this->dbforge->add_field("`justification_amount` BIGINT(11) NOT NULL");
			$this->dbforge->add_field("`justification_number` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`justification_creation_date` DATE NOT NULL");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('justification');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('justification');

	}
	
	//--------------------------------------------------------------------
	
}