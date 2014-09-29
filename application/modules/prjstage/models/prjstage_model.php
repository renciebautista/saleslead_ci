<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjstage_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('prjstage_desc',$filter);
		$this->db->order_by('prjstage_desc');
		return $this->db->get($this->_table)->result_array();
	}

	public function unique_except_me($string,$id){
		$this->db->where('prjstage_desc',$string);
		$this->db->where('id !=', $id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

}

/* End of file prjstage_model.php */
/* Location: ./application/modules/prjstage/models/prjstage_model.php */