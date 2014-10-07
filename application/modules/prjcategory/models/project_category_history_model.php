<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_category_history_model extends MY_Model {

	protected $return_type = 'array';
	public $before_create = array('created_at');


	public function get_contact_categories($project_contact_id){
		$this->db->select('project_category_histories.id,project_category_histories.created_at,
			prjcategories.prjcategory_desc,
			prjsubcategories.prjsubcategory_desc');
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('prjcategories','prjcategories.id = project_category_histories.prjcat_id');
		$this->db->join('prjsubcategories','prjsubcategories.id = project_category_histories.prjsubcat_id','left');
		$this->db->order_by('created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_history($project_id){
		$this->db->select('project_category_histories.id,project_category_histories.created_at,
			contacts.first_name,contacts.middle_name,contacts.last_name,
			user_details.avatar, 
			grouptypes.grouptype_desc,
			prjcategories.prjcategory_desc,
			prjsubcategories.prjsubcategory_desc,
			user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->join('project_contacts','project_contacts.id = project_category_histories.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_category_histories.created_by');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('prjcategories','prjcategories.id = project_category_histories.prjcat_id');
		$this->db->join('prjsubcategories','prjsubcategories.id = project_category_histories.prjsubcat_id','left');
		$this->db->order_by('project_category_histories.created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_history_user($project_id){
		$this->db->select('user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->join('project_contacts','project_contacts.id = project_category_histories.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_category_histories.created_by');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('prjcategories','prjcategories.id = project_category_histories.prjcat_id');
		$this->db->join('prjsubcategories','prjsubcategories.id = project_category_histories.prjsubcat_id','left');
		$this->db->group_by('project_category_histories.created_by');
		$this->db->order_by('user_details.last_name');
		return $this->db->get($this->_table)->result_array();
	}


}

/* End of file project_category_history_model.php */
/* Location: ./application/modules/prjcategory/models/project_category_history_model.php */