<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjsubcategory_model extends MY_Model {

	protected $return_type = 'array';

	public function search($id,$filter){
		$this->db->where('prjcategory_id',$id);
		$this->db->like('prjsubcategory_desc',$filter);
		$this->db->order_by('prjsubcategory_desc');
		return $this->db->get($this->_table)->result_array();
	}

	public function have_subcategory($id){
		$this->db->where('prjcategory_id',$id);
		$this->db->from($this->_table);
		if($this->db->count_all_results() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function details($id){
		$this->db->select('prjsubcategories.id,prjsubcategories.prjsubcategory_desc,prjsubcategories.prjcategory_id,
			prjcategories.prjcategory_desc');
		$this->db->join('prjcategories','prjcategories.id = prjsubcategories.prjcategory_id');
		$this->db->where('prjsubcategories.id',$id);
		return $this->db->get($this->_table)->row_array();
	}

	public function subcategory_exist($category_id,$subcategory){
		$this->db->where('prjcategory_id',$category_id);
		$this->db->where('prjsubcategory_desc',$subcategory);
        return (boolean)$this->db->get($this->_table)->row_array();
	}

}

/* End of file prjsubcategory_model.php */
/* Location: ./application/modules/prjcategory/models/prjsubcategory_model.php */