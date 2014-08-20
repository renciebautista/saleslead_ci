<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends MY_Model {

	protected $return_type = 'array';

	public function search($filter){
		// $this->db->like('department',$filter);
		// $this->db->order_by('department');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file contact_model.php */
/* Location: ./application/modules/contact/models/contact_model.php */