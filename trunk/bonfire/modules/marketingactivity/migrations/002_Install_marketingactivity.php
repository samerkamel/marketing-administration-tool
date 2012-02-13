<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_marketingactivity extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`marketingactivity_name` VARCHAR(225) NOT NULL");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('marketingactivity');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('marketingactivity');

	}
	
	//--------------------------------------------------------------------
	
}