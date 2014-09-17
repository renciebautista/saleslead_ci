<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companytype_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('companytype',$filter);
		$this->db->order_by('companytype');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file companytype_model.php */
/* Location: ./application/modules/companytype/models/companytype_model.php */