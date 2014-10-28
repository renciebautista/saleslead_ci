<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requesttype_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('requesttype',$filter);
		$this->db->order_by('requesttype');
		return $this->db->get($this->_table)->result_array();
	}

	public function unique_except_me($string,$id){
		$this->db->where('requesttype',$string);
		$this->db->where('id !=', $id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}


}

/* End of file requesttype_model.php */
/* Location: ./application/modules/requesttype/models/requesttype_model.php */