<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_typelist_model extends MY_Model {

	protected $return_type = 'array';
	public $_table = 'company_typelist';

	public function insert_types($company_id,$company_types){
		if(!empty($company_types)){
			$data = array();
			foreach ($company_types as $value) {
				$arr['company_id'] = $company_id;
				$arr['companytype_id'] = $value;
				$data[] = $arr;
			}
			$this->db->insert_batch($this->_table,$data);
			return TRUE;
		}
		return FALSE;
	}

	public function update_types($company_id,$company_types){
		$this->db->where('company_id',$company_id);
		$this->db->delete($this->_table);
		
		if(!empty($company_types)){
			$data = array();
			foreach ($company_types as $value) {
				$arr['company_id'] = $company_id;
				$arr['companytype_id'] = $value;
				$data[] = $arr;
			}
			$this->db->insert_batch($this->_table,$data);
			return TRUE;
		}
		return FALSE;
	}

	public function type_list($company_id){
		$this->db->select('companytype_id');
		$this->db->where('company_id',$company_id);
		$records = $this->db->get($this->_table)->result_array();
		$data = array();
		if(!empty($records)){
			foreach ($records as $value) {
				$data[] = $value['companytype_id'];
			}
		}

		return $data;
	}

	public function type_list_details($company_id){
		$this->db->where('company_id',$company_id);
		$this->db->join('companytypes','companytypes.id = company_typelist.companytype_id');
		return $this->db->get($this->_table)->result_array();
	}
}

/* End of file company_typelist_model.php */
/* Location: ./application/modules/company/models/company_typelist_model.php */