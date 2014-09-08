<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	public function search(){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id = projects.created_by');
		$this->db->order_by('projects.created_at,project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function public_projects(){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id = projects.created_by');
		$this->db->where('projects.assigned_to >',0);
		$this->db->where('projects.sl_status_id',1);
		$this->db->order_by('projects.created_at,project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function forassigning($filter){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name');
		$this->db->where("(project_name LIKE '%{$filter}%' OR first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id = projects.created_by');
		$this->db->where('projects.assigned_to',0);
		$this->db->where('projects.sl_status_id',1);
		$this->db->order_by('projects.created_at,project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function assigned($id,$filter){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name,
			sl_statuses.sl_status');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id = projects.created_by');
		$this->db->join('sl_statuses','sl_statuses.id = projects.sl_status_id');
		$this->db->where("(project_name LIKE '%{$filter}%' OR first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		$this->db->where('projects.sl_status_id',1);
		$this->db->where('projects.assigned_to',$id);
		$this->db->order_by('project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function details($id){
		$this->db->select('projects.id,projects.project_name,projects.lot,projects.street,projects.brgy,
			cities.city,provinces.province,
			user_details.first_name, user_details.middle_name, user_details.last_name,projects.created_at');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id = projects.created_by');
		$this->db->where('projects.id',$id);
		return $this->db->get($this->_table)->row_array();
	}
}

/* End of file project_model.php */
/* Location: ./application/modules/project/models/project_model.php */