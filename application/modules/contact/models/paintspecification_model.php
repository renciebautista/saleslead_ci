<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paintspecification_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	public function specifications($project_contact_id)
	{
		$this->db->select('paintspecifications.*,painttypes.painttype');
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('painttypes','painttypes.id = paintspecifications.painttype_id');
		return $this->db->get($this->_table)->result_array();
	}

	public function is_my_project_specs($id,$user_id){
		$this->db->where('id',$id);
		$this->db->where('created_by',$user_id);
		return $this->db->get($this->_table)->result_array();
	}

	public function allowed_to_update($id,$user_id){
		$this->db->where('paintspecifications.id',$id);
		$this->db->where('paintspecifications.created_by',$user_id);
		$this->db->where('projects.status_id < ',3);
		$this->db->join('project_contacts','project_contacts.id = paintspecifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function get_details($id){
		$this->db->select('paintspecifications.*,painttypes.painttype');
		$this->db->where('paintspecifications.id',$id);
		$this->db->join('painttypes','painttypes.id = paintspecifications.painttype_id');
		return $this->db->get($this->_table)->row_array();
	}

}

/* End of file paintspecification_model.php */
/* Location: ./application/modules/project/models/paintspecification_model.php */