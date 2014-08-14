<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends MY_Model {

	protected $return_type = 'array';
	public $_table = 'user_groups';

	public function search($filter){
		$this->db->like('ugrp_name',$filter);
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file role_model.php */
/* Location: ./application/modules/role/models/role_model.php */