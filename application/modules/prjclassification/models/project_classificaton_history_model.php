<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_classificaton_history_model extends MY_Model {

	protected $return_type = 'array';
	public $before_create = array('created_at');


	public function get_contact_classificatons($project_contact_id){
		$history = $this->_get_contact_classificatons($project_contact_id);
		if(!empty($history)){
			foreach ($history as $key => $value) {
				$history[$key]['files'] = $this->Projectfile_model->getfiles($value['id'],2);
			}
		}

		return $history;
	}

	private function _get_contact_classificatons($project_contact_id){
		$this->db->select('project_classificaton_histories.id,project_classificaton_histories.created_at,prjclassifications.prjclassification_desc');
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('prjclassifications','prjclassifications.id = project_classificaton_histories.prlclass_id');
		$this->db->order_by('created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_history($project_id){
		$details = $this->_get_all_history($project_id);
		if(!empty($details)){
			foreach ($details as $key => $value) {
				$details[$key]['files'] = $this->Projectfile_model->getfiles($value['id'],2);
			}
		}

		return $details;
	}

	private function _get_all_history($project_id){
		$this->db->select('project_classificaton_histories.id,project_classificaton_histories.created_at,
			contacts.first_name,contacts.middle_name,contacts.last_name,
			user_details.avatar, 
			grouptypes.grouptype_desc,
			prjclassifications.prjclassification_desc,
			user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->join('project_contacts','project_contacts.id = project_classificaton_histories.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_classificaton_histories.created_by');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('prjclassifications','prjclassifications.id = project_classificaton_histories.prlclass_id');
		$this->db->order_by('project_classificaton_histories.created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_history_user($project_id){
		$this->db->select('user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->join('project_contacts','project_contacts.id = project_classificaton_histories.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_classificaton_histories.created_by');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('prjclassifications','prjclassifications.id = project_classificaton_histories.prlclass_id');
		$this->db->group_by('project_classificaton_histories.created_by');
		$this->db->order_by('user_details.last_name');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file project_classificaton_history_model.php */
/* Location: ./application/modules/prjclassification/models/project_classificaton_history_model.php */