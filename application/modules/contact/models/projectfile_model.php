<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projectfile_model extends MY_Model {

	protected $return_type = 'array';

	public function downloadfile($hash){
		$this->db->where('hashname',$hash);
		return $this->db->get($this->_table)->row_array();
	}

	public function getfiles($id,$group){
		$this->db->where('remark_id',$id);
		$this->db->where('group_id',$group);
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file projectfile_model.php */
/* Location: ./application/modules/contact/models/projectfile_model.php */