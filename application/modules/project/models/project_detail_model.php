<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_detail_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at');

	public function get_details($project_contact_id,$group_id){
		$details = $this->_get_details($project_contact_id,$group_id);
		if(!empty($details)){
			foreach ($details as $key => $value) {
				$details[$key]['files'] = $this->Projectfile_model->getfiles($value['id'],$group_id);
			}
		}

		return $details;
	}



	private function _get_details($project_contact_id,$group_id){
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->where('group_id',$group_id);
		$this->db->order_by('created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_details($project_id,$group_id){
		
		$details = $this->_get_all_details($project_id,$group_id);
		if(!empty($details)){
			foreach ($details as $key => $value) {
				$details[$key]['files'] = $this->Projectfile_model->getfiles($value['id'],$group_id);
			}
		}

		return $details;
	}

	private function _get_all_details($project_id,$group_id){
		$this->db->select('project_details.id,project_details.details,project_details.created_at,
			contacts.first_name,contacts.middle_name,contacts.last_name,
			user_details.avatar, 
			grouptypes.grouptype_desc,
			remarks,
			user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('group_id',$group_id);
		$this->db->join('project_contacts','project_contacts.id = project_details.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_details.created_by');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->order_by('project_details.created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_details_user($project_id,$group_id){
		$this->db->select('user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('group_id',$group_id);
		$this->db->join('project_contacts','project_contacts.id = project_details.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_details.created_by');
		$this->db->group_by('project_details.created_by');
		$this->db->order_by('user_details.last_name');
		return $this->db->get($this->_table)->result_array();
	}
}

/* End of file project_detail_model.php */
/* Location: ./application/modules/project/models/project_detail_model.php */