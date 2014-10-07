<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paintspecification_model extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	public function specifications($project_contact_id)
	{
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('painttypes','painttypes.id = paintspecifications.painttype_id');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file paintspecification_model.php */
/* Location: ./application/modules/project/models/paintspecification_model.php */