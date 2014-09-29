<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_status_history_model extends MY_Model {

	protected $return_type = 'array';
	public $before_create = array('created_at');


	public function get_contact_status($project_contact_id){
		$this->db->select('project_status_histories.id,project_status_histories.remarks,project_status_histories.created_at,
			prjstatuses.prjstatus_desc');
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('prjstatuses','prjstatuses.id = project_status_histories.prjstatus_id');
		$this->db->order_by('created_at');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file project_status_history_model.php */
/* Location: ./application/modules/prjstatus/models/project_status_history_model.php */