<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

	protected $return_type = 'array';
	public $_table = 'user_accounts';
	public $primary_key = 'uacc_id';

	public function search($filter,$active = null){
		$this->db->select('user_accounts.uacc_id as id, user_details.first_name,user_details.middle_name,user_details.last_name,
			department,user_groups.ugrp_name');
		$this->db->where("(first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		if(!is_null($active)){
			$this->db->where('user_accounts.uacc_active',$active);
		}
		$this->db->join('user_details','user_details.uacc_id_fk = user_accounts.uacc_id');
		$this->db->join('departments','departments.id = user_details.department_id');
		$this->db->join('user_groups','user_groups.ugrp_id = user_accounts.uacc_group_fk');
		$this->db->order_by('last_name,first_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_active(){
		$this->db->select('user_accounts.uacc_id as id, user_details.first_name,user_details.middle_name,user_details.last_name');
		$this->db->where('uacc_active',1);
		$this->db->where('uacc_suspend',0);
		$this->db->where('uacc_group_fk >',1);
		$this->db->join('user_details','user_details.uacc_id_fk = user_accounts.uacc_id');
		$this->db->order_by('last_name,first_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function details($id){
		$this->db->select('user_accounts.uacc_id as id, user_details.first_name,
			user_details.middle_name,user_details.last_name,emp_id,
			department,user_groups.ugrp_name,user_details.bank_account,user_accounts.uacc_email,
			user_details.department_id,user_accounts.uacc_group_fk,user_accounts.uacc_active,
			ugrp_name');
		$this->db->where('user_accounts.uacc_id',$id);
		$this->db->join('user_details','user_details.uacc_id_fk = user_accounts.uacc_id');
		$this->db->join('departments','departments.id = user_details.department_id');
		$this->db->join('user_groups','user_groups.ugrp_id = user_accounts.uacc_group_fk');
		$this->db->order_by('last_name,first_name');
		return $this->db->get($this->_table)->row_array();
	}

	public function available_user($filter,$except = null){
		$this->db->select('user_accounts.uacc_id as id, user_details.first_name,user_details.middle_name,user_details.last_name,
			department,user_groups.ugrp_name');
		$this->db->where("(first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		$this->db->where('user_accounts.uacc_active',1);
		$this->db->where('uacc_suspend',0);
		if(!empty($except)){
			$this->db->where_not_in('user_accounts.uacc_id', $except);
		}
		$this->db->join('user_details','user_details.uacc_id_fk = user_accounts.uacc_id');
		$this->db->join('departments','departments.id = user_details.department_id');
		$this->db->join('user_groups','user_groups.ugrp_id = user_accounts.uacc_group_fk');
		$this->db->order_by('last_name,first_name');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file user_model.php */
/* Location: ./application/modules/user/models/user_model.php */