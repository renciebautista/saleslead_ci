<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_classificaton_history_model extends MY_Model {

	protected $return_type = 'array';
	public $before_create = array('created_at');


	public function get_contact_classificatons($project_contact_id){
		$this->db->select('project_classificaton_histories.id,project_classificaton_histories.created_at,prjclassifications.prjclassification_desc');
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('prjclassifications','prjclassifications.id = project_classificaton_histories.prlclass_id');
		$this->db->order_by('created_at');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file project_classificaton_history_model.php */
/* Location: ./application/modules/prjclassification/models/project_classificaton_history_model.php */