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
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->order_by('projects.created_at,project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function duplicate_project($user_id,$project_name,$lot,$street,$brgy,$city_id){
		$this->db->where('created_by',$user_id);
		$this->db->where('project_name',$project_name);
		$this->db->where('lot',$lot);
		$this->db->where('street',$street);
		$this->db->where('brgy',$brgy);
		$this->db->where('city_id',$city_id);

		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function public_projects($filter){
		$this->db->select("projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name,
			concat(user_details_2.last_name,', ',user_details_2.first_name,' ',user_details_2.middle_name) as assigned_to_name",false);
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->join('user_details as user_details_2','user_details_2.uacc_id_fk = projects.assigned_to');
		$this->db->where("(project_name LIKE '%{$filter}%')");
		$this->db->where('projects.status_id',2);
		$this->db->order_by('projects.created_at,project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function ajax_public_projects(){
		$this->datatables->select("projects.project_name as project_name,
			ucase(concat(lot,' ',street,' ',brgy,', ',city,' ',province)) as address",false);
		$this->datatables->from($this->_table);
		$this->datatables->join('cities','cities.id = projects.city_id');
		$this->datatables->join('provinces','provinces.id = cities.province_id');
		$this->datatables->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->datatables->where('projects.status_id',2);

		return $this->datatables->generate();
	}

	

	public function created_projects($filter,$status,$id){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name,status.status,
			projects.created_at');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->join('status','status.id = projects.status_id');

		$this->db->where("(project_name LIKE '%{$filter}%' OR first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		if($status == 0){
			$this->db->where('projects.status_id',1);	
		}
		if($status == 1){
			$this->db->where('projects.status_id',2);	
		}
		if($status == 2){
			$this->db->where('projects.status_id',3);	
		}
		$this->db->where('projects.created_by',$id);	
		$this->db->order_by('projects.created_at,project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function forassigning($filter){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name');
		$this->db->where("(project_name LIKE '%{$filter}%' OR first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->where('projects.status_id',1);
		$this->db->order_by('projects.created_at,project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function forassigning_count(){
		$this->db->select('projects.updated_at');
		$this->db->where('projects.status_id',1);
		$this->db->order_by('projects.updated_at');
		return $this->db->get($this->_table)->result_array();

	}

	public function ajax_forassigning(){
		$this->datatables->select("concat('<strong>',projects.project_name,'</strong><br><i><span>',lot,'</span> <span>',lower(street),'</span> <span>',lower(brgy),'</span> <span>',cities.city,'</span> <span>',provinces.province,'</span></i>') as project_name,
			concat(user_details.last_name,', ',user_details.first_name,' ',user_details.middle_name) as created_by",false);
		$this->datatables->from($this->_table);
		$this->datatables->join('cities','cities.id = projects.city_id');
		$this->datatables->join('provinces','provinces.id = cities.province_id');
		$this->datatables->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->datatables->where('projects.status_id',1);
		$this->db->order_by('projects.created_at,project_name');
		return $this->datatables->generate();
	}

	public function is_forassigning($id){
		$this->db->where('projects.id',$id);
		$this->db->where('projects.status_id',1);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function new_assigned_project_count($id){
		$this->db->select('projects.updated_at');
		$this->db->where('projects.status_id',2);
		$this->db->where('projects.assigned_to',$id);
		$this->db->where('projects.assigned_viewed',0);
		$this->db->order_by('projects.updated_at');
		return $this->db->get($this->_table)->result_array();

		// $this->db->where('projects.status_id',2);
		// $this->db->where('projects.assigned_to',$id);
		// $this->db->from($this->_table);
		// return $this->db->count_all_results();
	}

	public function assigned($filter,$id){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name,
			sl_statuses.sl_status,projects.assigned_viewed,');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->join('sl_statuses','sl_statuses.id = projects.sl_status_id');
		$this->db->where("(project_name LIKE '%{$filter}%' OR first_name LIKE '%{$filter}%' OR middle_name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%')");
		$this->db->where('projects.status_id',2);
		$this->db->where('projects.assigned_to',$id);
		$this->db->order_by('project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function is_assigned($id,$user_id){
		$this->db->where('id',$id);
		$this->db->where('assigned_to',$user_id);
		$this->db->where('status_id',2);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function details($id){
		$this->db->select('projects.id,projects.project_name,projects.lot,projects.street,projects.brgy,
			projects.status_id,projects.assigned_viewed,
			cities.city,provinces.province,
			user_details.first_name, user_details.middle_name, user_details.last_name,projects.created_at');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->where('projects.id',$id);
		return $this->db->get($this->_table)->row_array();
	}

	public function my_created_project($id,$user_id){
		$this->db->where('id',$id);
		$this->db->where('created_by',$user_id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function allowed_to_update($id,$user_id){
		$this->db->where('projects.id',$id);
		$this->db->where('projects.created_by',$user_id);
		$this->db->where('projects.status_id',1);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function is_public($id){
		$this->db->where('id',$id);
		$this->db->where('status_id',2);
		return (boolean)$this->db->get($this->_table)->row_array();
	}
}

/* End of file project_model.php */
/* Location: ./application/modules/project/models/project_model.php */