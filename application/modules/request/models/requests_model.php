<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	public function get_contact_request($project_contact_id){
		$this->db->select('requests.id,requests.created_at,requests.particular,requests.remarks,
			requests.amount,requests.date_needed,requests.approved_amount,requests.status_id,
			requesttypes.requesttype,requests.requesttype_id,
			request_status.status');
		$this->db->join('requesttypes','requesttypes.id = requests.requesttype_id');
		$this->db->join('request_status','request_status.id = requests.status_id');
		$this->db->where('project_contact_id',$project_contact_id);
		return $this->db->get($this->_table)->result_array();
	}

	public function get_details($id){
		$this->db->select('requests.id,requests.created_at,requests.particular,requests.remarks,
			requests.amount,requests.date_needed,requests.approved_amount,requests.status_id,
			requests.requesttype_id,
			requesttypes.requesttype,requests.project_contact_id,
			request_status.status,project_contacts.contact_id,project_contacts.project_id,
			user_details.first_name, user_details.middle_name, user_details.last_name,');
		$this->db->join('requesttypes','requesttypes.id = requests.requesttype_id');
		$this->db->join('request_status','request_status.id = requests.status_id');
		$this->db->join('project_contacts','project_contacts.id = requests.project_contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = requests.created_by');
		$this->db->where('requests.id',$id);
		return $this->db->get($this->_table)->row_array();
	}

	public function for_edit($id){
		$this->db->where('status_id',1);
		$this->db->where('id',$id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function for_approval($id){
		$this->db->where('status_id',1);
		$this->db->where('id',$id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function get_all_for_approval_in_group($requesttypes){
		$types = '';
		if(!empty($requesttypes)){
			$arg = implode(',',$requesttypes);
			$types = "AND requests.requesttype_id IN (".$arg.")";

			$query = sprintf("SELECT requests.requesttype_id,requesttypes.requesttype,
				COUNT(requests.requesttype_id) as total_request
				FROM requests 
				JOIN requesttypes ON requesttypes.id = requests.requesttype_id
				WHERE requests.status_id = '1'
				%s
				GROUP BY requests.requesttype_id
				ORDER BY requesttypes.requesttype",$types);
			return $this->db->query($query)->result_array();
		}else{
			return;
		}
		
	}

	public function get_for_approval($group_id){
		$this->db->select('requests.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name,
			particular,amount');
		$this->db->join('project_contacts','project_contacts.id = requests.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = requests.created_by');
		$this->db->where('requests.requesttype_id',$group_id);
		$this->db->where('requests.status_id',1);
		return $this->db->get($this->_table)->result_array();
	}

	public function project_cost_summary($project_id){
		$query = sprintf("SELECT id,requesttype,COALESCE(total_approved,0.00) as total_approved FROM requesttypes
			LEFT JOIN
			(
			SELECT requests.requesttype_id, sum(approved_amount) as total_approved FROM requests
			JOIN project_contacts ON project_contacts.id = requests.project_contact_id
			WHERE project_contacts.project_id = '%d'
			GROUP BY requests.requesttype_id
			) AS costs
			ON costs.requesttype_id = requesttypes.id
			ORDER BY requesttype",$project_id);
		return $this->db->query($query)->result_array();
	}

	public function for_approval_count($requesttypes){
		$this->db->select('requests.updated_at');
		$this->db->where('requests.status_id',1);
		$this->db->where_in('requests.requesttype_id', $requesttypes);
		$this->db->order_by('requests.updated_at');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file requests_model.php */
/* Location: ./application/modules/contact/models/requests_model.php */