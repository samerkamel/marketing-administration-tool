<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Purchaserequisition_purchaseorder_model extends BF_Model {

	protected $table		= "purchaserequisition_purchaseorder";
	protected $key			= array('purchaserequisition_id', 'purchaseorder_id');
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
}
