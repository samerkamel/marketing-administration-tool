<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Justification_model extends BF_Model {

	protected $table		= "justification";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
}
