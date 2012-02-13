<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Purchaseorder_invoice_model extends BF_Model {

	protected $table		= "purchaseorder_invoice";
	protected $key			= array('purchaseorder_id', 'invoice_id');
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
}
