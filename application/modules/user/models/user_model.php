<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	protected $return_type = 'array';
	public $_table = 'user_accounts';

	public function get_all_active(){
		$this->db->select('user_accounts.uacc_id as id, user_details.first_name,user_details.middle_name,user_details.last_name');
		$this->db->where('uacc_active',1);
		$this->db->where('uacc_suspend',0);
		$this->db->join('user_details','user_details.uacc_id = user_accounts.uacc_id');
		$this->db->order_by('last_name,first_name');
		return $this->db->get($this->_table)->result_array();
	}
}

/* End of file user_model.php */
/* Location: ./application/modules/user/models/user_model.php */