<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('state_desc',$filter);
		$this->db->order_by('state_desc');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file state_model.php */
/* Location: ./application/modules/state/models/state_model.php */