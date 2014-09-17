<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('department',$filter);
		$this->db->order_by('department');
		return $this->db->get($this->_table)->result_array();
	}


}

/* End of file department_model.php */
/* Location: ./application/modules/department/models/department_model.php */