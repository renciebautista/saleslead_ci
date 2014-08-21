<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address_grouptype_model extends MY_Model {

	public $_table = 'address_grouptypes';
	protected $return_type = 'array';

	public function insert_group($address_id,$groups){
		if(!empty($groups)){
			$data = array();
			foreach ($groups as $row) {
				$arr['address_id'] = $address_id;
				$arr['grouptype_id'] = $row;
				$data[] = $arr;
			}

			$this->db->insert_batch($this->_table, $data); 
		}
	}
}

/* End of file address_grouptype_model.php */
/* Location: ./application/modules/company/models/address_grouptype_model.php */