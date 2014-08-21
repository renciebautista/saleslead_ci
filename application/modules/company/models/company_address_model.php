<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_address_model extends MY_Model {

	public $_table = 'company_addresses';

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	protected $return_type = 'array';

}

/* End of file company_address_model.php */
/* Location: ./application/modules/company/models/company_address_model.php */