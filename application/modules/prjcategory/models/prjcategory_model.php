<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjcategory_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('prjcategory_desc',$filter);
		$this->db->order_by('prjcategory_desc');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file prjcategory_model.php */
/* Location: ./application/modules/prjcategory/models/prjcategory_model.php */