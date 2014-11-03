<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_contact_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	public function projects($filter,$contact_id){
		$this->db->select('project_contacts.id as project_contact_id,project_contacts.project_id,
			project_contacts.approved,
			projects.project_name,projects.lot,projects.street,projects.brgy,
			cities.city,provinces.province,
			grouptypes.grouptype_desc,
			projectcontact_status.pc_status');
		$this->db->where('project_contacts.contact_id',$contact_id);
		$this->db->where("( project_name LIKE '%{$filter}%' OR projects.lot LIKE '%{$filter}%' OR projects.street LIKE '%{$filter}%' OR projects.brgy LIKE '%{$filter}%' OR cities.city LIKE '%{$filter}%' OR provinces.province LIKE '%{$filter}%')");
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('projectcontact_status','projectcontact_status.id = project_contacts.approved');
		$this->db->order_by('projects.project_name');
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

	public function project_contacts($project_id,$group_id,$user_id){
		$this->datatables->select("project_contacts.id, project_contacts.contact_id,
			concat(last_name,', ',first_name,' ',middle_name) as contact_name,
			project_contacts.approved,
			projectcontact_status.pc_status,
			companies.company,
			concat(lot,' ',street,' ',brgy,' ',cities.city,' ',provinces.province,'') as address",false);
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('projectcontact_status','projectcontact_status.id = project_contacts.approved');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('project_contacts.type_id',$group_id);
		$this->db->where('contacts.created_by',$user_id);
		$this->db->order_by('first_name,company');
		return $this->db->get($this->_table)->result_array();
	}

	public function for_approval_project_contacts($project_id){
		$this->datatables->select("project_contacts.id, project_contacts.contact_id,
			concat(contacts.last_name,', ',contacts.first_name,' ',contacts.middle_name) as contact_name,
			companies.company,
			concat(lot,' ',street,' ',brgy,' ',cities.city,' ',provinces.province,'') as address,
			grouptypes.grouptype_desc,
			concat(user_details.last_name,', ',user_details.first_name,' ',user_details.middle_name) as created_by_name,",false);
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_contacts.created_by');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('project_contacts.approved',1);
		$this->db->order_by('user_details.first_name,company');
		return $this->db->get($this->_table)->result_array();
	}

	public function for_approval_project_contact_count($project_id){
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('project_contacts.approved',1);
		$this->db->from($this->_table);
		return $this->db->count_all_results();
	}

	public function project_contact_list($project_id){
		$this->datatables->select("project_contacts.id, project_contacts.contact_id,
			concat(contacts.last_name,', ',contacts.first_name,' ',contacts.middle_name) as contact_name,
			companies.company,
			concat(lot,' ',street,' ',brgy,' ',cities.city,' ',provinces.province,'') as address,
			grouptypes.grouptype_desc,
			concat(user_details.last_name,', ',user_details.first_name,' ',user_details.middle_name) as created_by_name,
			project_contacts.approved,
			projectcontact_status.pc_status",false);
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_contacts.created_by');
		$this->db->join('projectcontact_status','projectcontact_status.id = project_contacts.approved');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('project_contacts.approved >',1);
		$this->db->order_by('project_contacts.approved,user_details.first_name,company');
		return $this->db->get($this->_table)->result_array();
	}

	public function for_approval_project_contacts_company($user_id){
		$this->db->select('projects.id, projects.project_name,
			lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->where('projects.assigned_to',$user_id);
		$this->db->where('project_contacts.approved',1);
		$this->db->group_by('projects.id');
		return $this->db->get($this->_table)->result_array();
	}

	public function for_approval_project_contacts_count($user_id){
		$this->db->select('project_contacts.created_at');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->where('projects.assigned_to',$user_id);
		$this->db->where('project_contacts.approved',1);
		$this->db->order_by('project_contacts.created_at');
		return $this->db->get($this->_table)->result_array();

		// $this->db->join('projects','projects.id = project_contacts.project_id');
		// $this->db->where('projects.assigned_to',$user_id);
		// $this->db->where('project_contacts.approved',0);
		// $this->db->from($this->_table);
		// return $this->db->count_all_results();
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
		// $this->db->where('approved',1);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function is_my_project_contact($id,$user_id){
		$this->db->where('id',$id);
		$this->db->where('created_by',$user_id);
		$this->db->where('approved',2);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function allowed_to_update($project_contact_id,$user_id){
		$project = $this->_allowed_to_update($project_contact_id,$user_id);
		if($project['status_id'] < 3){
			if(($project['created_by'] == $user_id) || (($project['approved'] == 2) && ($project['created_by'] == $user_id))){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	private function _allowed_to_update($project_contact_id,$user_id){
		$this->db->select('projects.status_id,projects.created_by,project_contacts.approved,
			contacts.created_by');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->where('project_contacts.id',$project_contact_id);
		$this->db->where('project_contacts.created_by',$user_id);
		return $this->db->get($this->_table)->row_array();
	}

	public function joined_projects($filter,$user_id){
		$this->db->select("projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name",false);
		$this->db->where("( project_name LIKE '%{$filter}%' OR projects.lot LIKE '%{$filter}%' OR projects.street LIKE '%{$filter}%' OR projects.brgy LIKE '%{$filter}%' OR cities.city LIKE '%{$filter}%' OR provinces.province LIKE '%{$filter}%')");
		$this->db->where('contacts.created_by',$user_id);
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.assigned_to');
		
		$this->db->group_by('project_contacts.project_id');
		$this->db->order_by('projects.project_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function joined_project_contact($project_id,$user_id){
		$this->datatables->select("project_contacts.id, project_contacts.contact_id,
			concat(contacts.last_name,', ',contacts.first_name,' ',contacts.middle_name) as contact_name,
			companies.company,
			concat(lot,' ',street,' ',brgy,' ',cities.city,' ',provinces.province,'') as address,
			grouptypes.grouptype_desc,
			concat(user_details.last_name,', ',user_details.first_name,' ',user_details.middle_name) as created_by_name,
			project_contacts.approved,
			projectcontact_status.pc_status",false);
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_contacts.created_by');
		$this->db->join('projectcontact_status','projectcontact_status.id = project_contacts.approved');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('contacts.created_by',$user_id);
		$this->db->order_by('contact_name');
		return $this->db->get($this->_table)->result_array();
	}

	public function my_joined_project_contact($project_id,$user_id){
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->where('contacts.created_by',$user_id);
		$this->db->where('project_contacts.project_id',$project_id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}
}

/* End of file project_contact_model.php */
/* Location: ./application/modules/project/models/project_contact_model.php */