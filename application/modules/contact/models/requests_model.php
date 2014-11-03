<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	public function get_contact_request($project_contact_id){
		$this->db->select('requests.id,requests.created_at,requests.particular,requests.remarks,
			requests.amount,requests.date_needed,requests.approved_amount,requests.status_id,
			requesttypes.requesttype,
			request_status.status');
		$this->db->join('requesttypes','requesttypes.id = requests.requesttype_id');
		$this->db->join('request_status','request_status.id = requests.status_id');
		$this->db->where('project_contact_id',$project_contact_id);
		return $this->db->get($this->_table)->result_array();
	}

	public function get_details($id){
		$this->db->select('requests.id,requests.created_at,requests.particular,requests.remarks,
			requests.amount,requests.date_needed,requests.approved_amount,requests.status_id,
			requesttypes.requesttype,requests.project_contact_id,
			request_status.status');
		$this->db->join('requesttypes','requesttypes.id = requests.requesttype_id');
		$this->db->join('request_status','request_status.id = requests.status_id');
		$this->db->where('requests.id',$id);
		return $this->db->get($this->_table)->row_array();
	}

	public function for_edit($id){
		$this->db->where('status_id',1);
		$this->db->where('id',$id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function get_all_for_approval_in_group(){
		$query = sprintf("SELECT requests.requesttype_id,requesttypes.requesttype,
			COUNT(requests.requesttype_id) as total_request
			FROM requests 
			JOIN requesttypes ON requesttypes.id = requests.requesttype_id
			GROUP BY requests.requesttype_id
			ORDER BY requesttypes.requesttype");
		return $this->db->query($query)->result_array();
	}

}

/* End of file requests_model.php */
/* Location: ./application/modules/contact/models/requests_model.php */