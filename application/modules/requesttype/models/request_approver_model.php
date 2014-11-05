<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_approver_model extends MY_Model {

	protected $return_type = 'array';

	public function get_request_approver($filter,$id,$type){
		$this->db->select('request_approvers.user_id,user_details.first_name,user_details.middle_name,user_details.last_name,department');
		$this->db->join('user_details','user_details.uacc_id_fk = request_approvers.user_id');
		$this->db->join('departments','departments.id = user_details.department_id');
		$this->db->where("(first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		$this->db->where('request_type_id',$id);
		$this->db->where('type',$type);
		return $this->db->get($this->_table)->result_array();
	}

	public function user_already_exist($request_type_id, $user_id,$type){
		$this->db->where('request_type_id',$request_type_id);
		$this->db->where('user_id',$user_id);
		$this->db->where('type',$type);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function get_selected_users($request_type_id,$type){
		$this->db->where('request_type_id',$request_type_id);
		$this->db->where('type',$type);
		$records = $this->db->get($this->_table)->result_array();
		$data = array();
		if(!empty($records)){
			foreach ($records as $row) {
				$data[] = $row['user_id'];
			}
		}
		return $data;
	}

	public function my_for_approval($user_id,$type){
		$this->db->select('request_type_id');
		$this->db->where('user_id',$user_id);
		$this->db->where('type',$type);
		$records = $this->db->get($this->_table)->result_array();
		$data = array();
		if(!empty($records)){
			foreach ($records as $row) {
				$data[] = $row['request_type_id'];
			}
		}
		return $data;
	}

	public function valid_approver($user_id,$request_type_id,$type){
		$this->db->where('user_id',$user_id);
		$this->db->where('request_type_id',$request_type_id);
		$this->db->where('type',$type);
		return (boolean)$this->db->get($this->_table)->row_array();
	}
}

/* End of file request_approver_model.php */
/* Location: ./application/modules/requesttype/models/request_approver_model.php */