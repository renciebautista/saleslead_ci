<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grouptype_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('grouptype_desc',$filter);
		$this->db->order_by('grouptype_desc');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file grouptype_model.php */
/* Location: ./application/modules/grouptype/models/grouptype_model.php */