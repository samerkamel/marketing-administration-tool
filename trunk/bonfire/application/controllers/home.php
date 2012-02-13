<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {

	//--------------------------------------------------------------------
	
	public function index() 
	{	
		redirect(SITE_AREA . '/reports/marketinglogbook');
	}
	
	//--------------------------------------------------------------------
	

}