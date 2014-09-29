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

}

/* End of file project_stage_history_model.php */
/* Location: ./application/modules/prjstage/models/project_stage_history_model.php */