<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjstatus_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('prjstatus_desc',$filter);
		$this->db->order_by('prjstatus_desc');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file prjstatus_model.php */
/* Location: ./application/modules/prjstatus/models/prjstatus_model.php */