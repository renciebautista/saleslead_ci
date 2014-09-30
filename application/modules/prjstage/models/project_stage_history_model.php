<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_stage_history_model extends MY_Model {

	protected $return_type = 'array';
	public $before_create = array('created_at');


	public function get_contact_stages($project_contact_id){
		$this->db->select('project_stage_histories.id,project_stage_histories.remarks,project_stage_histories.created_at,
			prjstages.prjstage_desc');
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('prjstages','prjstages.id = project_stage_histories.prjstage_id');
		$this->db->order_by('created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_history($project_id){
		$this->db->select('project_stage_histories.id,project_stage_histories.created_at,
			project_stage_histories.remarks,
			contacts.first_name,contacts.middle_name,contacts.last_name,
			user_details.avatar, 
			grouptypes.grouptype_desc,
			prjstages.prjstage_desc,
			user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->join('project_contacts','project_contacts.id = project_stage_histories.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = project_stage_histories.created_by');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('prjstages','prjstages.id = project_stage_histories.prjstage_id');
		$this->db->order_by('project_stage_histories.created_at');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file project_stage_history_model.php */
/* Location: ./application/modules/prjstage/models/project_stage_history_model.php */