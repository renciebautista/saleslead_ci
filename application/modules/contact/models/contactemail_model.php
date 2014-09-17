<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactemail_model extends MY_Model {

	public $before_create = array('created_at','updated_at');
	public $before_update = array('updated_at');

	protected $return_type = 'array';

	public function get_by_contact($contact_id){
		$this->db->where('contact_id',$contact_id);
		$this->db->order_by('updated_at','desc');
		return $this->db->get($this->_table)->result_array();
	}

	public function is_my_contact_email($id,$user_id){
		$this->db->where('id',$id);
		$this->db->where('created_by',$user_id);
        return (boolean)$this->db->get($this->_table)->row_array();
	}

	public function validate_email($email,$user_id){
		$this->db->where('email_address',$email);
		$this->db->where('created_by',$user_id);
        return (boolean)$this->db->get($this->_table)->row_array();
	}

}

/* End of file contactemail_model.php */
/* Location: ./application/modules/contact/models/contactemail_model.php */