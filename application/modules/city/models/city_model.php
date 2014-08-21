<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends MY_Model {

	protected $return_type = 'array';

	public function get_all_cities()
	{
		$this->db->select('cities.id,cities.city,provinces.province');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->order_by('city');
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file city_model.php */
/* Location: ./application/modules/city/models/city_model.php */