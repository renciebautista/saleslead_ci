<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_category_history_model extends MY_Model {

	protected $return_type = 'array';
	public $before_create = array('created_at');


	public function get_contact_categories($project_contact_id){
		$this->db->select('project_category_histories.id,project_category_histories.created_at,
			prjcategories.prjcategory_desc,
			prjsubcategories.prjsubcategory_desc');
		$this->db->where('project_contact_id',$project_contact_id);
		$this->db->join('prjcategories','prjcategories.id = project_category_histories.prjcat_id');
		$this->db->join('prjsubcategories','prjsubcategories.id = project_category_histories.prjsubcat_id','left');
		$this->db->order_by('created_at');
		return $this->db->get($this->_table)->result_array();
	}


}

/* End of file project_category_history_model.php */
/* Location: ./application/modules/prjcategory/models/project_category_history_model.php */