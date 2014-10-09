<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paintspecification_log extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at');

	public function logs($project_contact_id)
	{
		$this->db->where('project_contact_id',$project_contact_id);
		return $this->db->get($this->_table)->result_array();
	}
}

/* End of file paintspecification_log.php */
/* Location: ./application/modules/contact/models/paintspecification_log.php */