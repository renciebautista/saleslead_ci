<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends MY_Model {

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	protected $return_type = 'array';

	public function search($filter){
		$this->db->like('company',$filter);
		$this->db->order_by('company');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file company_model.php */
/* Location: ./application/modules/company/models/company_model.php */