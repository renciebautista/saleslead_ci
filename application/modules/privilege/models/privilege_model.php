<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privilege_model extends MY_Model {	

	public $_table = 'user_privileges';
	public $primary_key = 'upriv_id';
	protected $return_type = 'array';

	public function search($filter = null){
		$this->db->like('upriv_name',$filter);
		$this->db->order_by('upriv_name');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file privilege_model.php */
/* Location: ./application/modules/privilege/models/privilege_model.php */