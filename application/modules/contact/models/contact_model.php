<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends MY_Model {

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	protected $return_type = 'array';

	public function search($filter){
		$this->db->select('contacts.id,first_name,middle_name,last_name,company,
			company,lot,street,brgy,city,province');
		// $this->db->like('department',$filter);
		$this->db->order_by('last_name,first_name,company');
		$this->db->join('companies','companies.id = contacts.company_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file contact_model.php */
/* Location: ./application/modules/contact/models/contact_model.php */