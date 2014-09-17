<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends MY_Model {

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	protected $return_type = 'array';

	public function my_companies($filter=null,$id,$limit=null){
		$this->db->select('companies.id,company,lot,street,brgy,city,province');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->like('company',$filter);
		$this->db->where('created_by',$id);
		$this->db->order_by('company');
		if(!is_null($limit)){
			$this->db->limit($limit);
		}
		return $this->db->get($this->_table)->result_array();
	}

	public function company_exist($company,$id){
		$this->db->where('company',$company);
		$this->db->where('created_by',$id);
		return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function details($id){
		$this->db->select('companies.id,company,lot,street,brgy,city,province,companies.city_id');
		$this->db->join('cities','cities.id = companies.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->where('companies.id',$id);
		return $this->db->get($this->_table)->row_array();
	}

	public function is_my_company($id,$user_id){
		$this->db->where('id',$id);
		$this->db->where('created_by',$user_id);
        return (boolean)$this->db->get($this->_table)->row_array();
	}

}

/* End of file company_model.php */
/* Location: ./application/modules/company/models/company_model.php */