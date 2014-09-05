<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_contact_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at');

	public function projects($contact_id){
		$this->db->select('project_contacts.id as project_contact_id,project_contacts.project_id,
			projects.project_name,projects.lot,projects.street,projects.brgy,
			cities.city,provinces.province');
		$this->db->where('project_contacts.contact_id',$contact_id);
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		return $this->db->get($this->_table)->result_array();
	}

	public function details($id){
		$this->db->select('project_contacts.project_id as project_id,projects.project_name,projects.lot,projects.street,projects.brgy,
			cities.city,provinces.province,project_contacts.id as project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->where('project_contacts.id',$id);
		return $this->db->get($this->_table)->row_array();
	}

	
}

/* End of file project_contact_model.php */
/* Location: ./application/modules/project/models/project_contact_model.php */