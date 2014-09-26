<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends MY_Model {

	protected $return_type = 'array';
	public $primary_key = 'ugrp_id';
	public $_table = 'user_groups';

	public function search($filter){
		$this->db->like('ugrp_name',$filter);
		return $this->db->get($this->_table)->result_array();
	}

	public function delete_privileges($group_id){
		$this->db->where('upriv_groups_ugrp_fk',$group_id);
		$this->db->delete('user_privilege_groups');
	}

	public function privileges($group_id){
		$this->db->select('upriv_groups_upriv_fk');
		$this->db->where('upriv_groups_ugrp_fk',$group_id);
		$records = $this->db->get('user_privilege_groups')->result_array();

		$data = array();
		if(!empty($records)){
			foreach ($records as $value) {
				$data[] = $value['upriv_groups_upriv_fk'];
			}
		}
		return $data;
	}

	public function update_group_privileges($group_id,$privileges){
		$this->db->where('upriv_groups_ugrp_fk',$group_id);
		$this->db->delete('user_privilege_groups');

		if(!empty($privileges)){
			$data = array();
			foreach ($privileges as $privilege) {
				$arr['upriv_groups_ugrp_fk'] = $group_id;
				$arr['upriv_groups_upriv_fk'] = $privilege;
				$data[] = $arr;
			}
			$this->db->insert_batch('user_privilege_groups',$data);
		}
	}

}

/* End of file group_model.php */
/* Location: ./application/modules/group/models/group_model.php */