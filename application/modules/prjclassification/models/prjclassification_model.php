<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjclassification_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('prjclassification_desc',$filter);
		$this->db->order_by('prjclassification_desc');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file prjclassification_model.php */
/* Location: ./application/modules/prjclassification/models/prjclassification_model.php */