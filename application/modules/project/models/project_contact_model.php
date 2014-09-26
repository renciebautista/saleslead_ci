<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_contact_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at');

	public function projects($filter,$contact_id){
		$this->db->select('project_contacts.id as project_contact_id,project_contacts.project_id,
			projects.project_name,projects.lot,projects.street,projects.brgy,
			cities.city,provinces.province');
		$this->db->where('project_contacts.contact_id',$contact_id);
		$this->db->where("( project_name LIKE '%{$filter}%' OR projects.lot LIKE '%{$filter}%' OR projects.street LIKE '%{$filter}%' OR projects.brgy LIKE '%{$filter}%' OR cities.city LIKE '%{$filter}%' OR provinces.province LIKE '%{$filter}%')");
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		return $this->db->get($this->_table)->result_array();
	}

	public function ajax_project_contacts($project_id,$group_id){
		$this->datatables->select("concat(last_name,', ',first_name,' ',middle_name) as contact_name,
			concat(companies.company,'<br><i><span>',lot,'</span> <span>',lower(street),'</span> <span>',lower(brgy),'</span> <span>',cities.city,'</span> <span>',provinces.province,'</span></i>') as company",false);
		$this->datatables->from($this->_table);
		$this->datatables->join('contacts','contacts.id = project_contacts.contact_id');
		$this->datatables->join('companies','companies.id = contacts.company_id');
		$this->datatables->join('cities','cities.id = companies.city_id');
		$this->datatables->join('provinces','provinces.id = cities.province_id');
		$this->datatables->where('project_contacts.project_id',$project_id);
		$this->datatables->where('project_contacts.type_id',$group_id);
		return $this->datatables->generate();
	}

	public function project_contacts($project_id,$group_id){
		$this->datatables->select("project_contacts.id, project_contacts.contact_id,
			concat(last_name,', ',first_name,' ',middle_name) as contact_name,
			companies.company,
			concat(lot,' ',street,' ',brgy,' ',cities.city,' ',provinces.province,'') as address",false);
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('project_contacts.type_id',$group_id);
		$this->db->order_by('first_name,company');
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

	public function project_contact_exist_in_group($contact_id,$project_id,$group_id){
		$this->db->where('project_id',$project_id);
		$this->db->where('contact_id',$contact_id);
		$this->db->where('type_id',$group_id);
		$this->db->where('approved',1);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function is_my_project_contact($id,$user_id){
		$this->db->where('id',$id);
		$this->db->where('created_by',$user_id);
		$this->db->where('approved',1);
		return (boolean)$this->db->get($this->_table)->row_array();
	}
}

/* End of file project_contact_model.php */
/* Location: ./application/modules/project/models/project_contact_model.php */