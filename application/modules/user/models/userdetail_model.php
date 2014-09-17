<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userdetail_model extends MY_Model {

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	protected $return_type = 'array';

	public $_table = 'user_details';
	public $primary_key = 'uacc_id';

}

/* End of file userdetail_model.php */
/* Location: ./application/modules/user/models/userdetail_model.php */