<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends MY_Model {

	protected $return_type = 'array';
	public $before_create = array('created_at');

	public function project_comments($user_id){
		$this->db->select('notifications.created_at');
		$this->db->join('project_contacts','project_contacts.id = notifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->where('projects.assigned_to',$user_id);
		$this->db->where('notifications.type',1);
		$this->db->order_by('notifications.created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function projects_with_comments($user_id){
		$this->db->select('projects.id,project_name,lot,street,brgy,city,province,
			user_details.first_name, user_details.middle_name, user_details.last_name,
			sl_statuses.sl_status,projects.assigned_viewed,');
		$this->db->join('project_contacts','project_contacts.id = notifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('cities','cities.id = projects.city_id');
		$this->db->join('provinces','provinces.id = cities.province_id');
		$this->db->join('user_details','user_details.uacc_id_fk = projects.created_by');
		$this->db->join('sl_statuses','sl_statuses.id = projects.sl_status_id');
		$this->db->where('projects.assigned_to',$user_id);
		$this->db->where('notifications.type',1);
		$this->db->group_by('projects.id');
		return $this->db->get($this->_table)->result_array();
	}

	public function joined_projects($user_id){
		$this->db->select('notifications.created_at');
		$this->db->join('project_contacts','project_contacts.id = notifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->where('contacts.created_by',$user_id);
		$this->db->where('notifications.type',2);
		$this->db->order_by('notifications.created_at');
		return $this->db->get($this->_table)->result_array();
	}

	public function joined_project_notifications($user_id){
		$this->db->select('first_name,middle_name,last_name,projects.project_name,grouptypes.grouptype_desc,
			notifications.remarks,notifications.id');
		$this->db->join('project_contacts','project_contacts.id = notifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->where('contacts.created_by',$user_id);
		$this->db->where('notifications.type',2);
		$this->db->order_by('notifications.created_at');
		return $this->db->get($this->_table)->result_array();
	}


	public function get_count($project_id,$group_id,$type_id){
		$this->db->join('project_contacts','project_contacts.id = notifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('notifications.type',$type_id);
		$this->db->where('notifications.group_id',$group_id);
		$this->db->from($this->_table);
		return $this->db->count_all_results();
	}

	public function delete_notifications($project_id,$user_id,$group_id){
		$ids = $this->get_for_deleting($project_id,$user_id,$group_id);
		if(!empty($ids)){
			foreach ($ids as $id) {
				$this->db->where('id',$id['id']);
				$this->db->delete($this->_table);;
			}
		}
	}

	private function get_for_deleting($project_id,$user_id,$group_id){
		$this->db->select('notifications.id');
		$this->db->join('project_contacts','project_contacts.id = notifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->where('projects.assigned_to',$user_id);
		$this->db->where('notifications.group_id',$group_id);
		return $this->db->get($this->_table)->result_array();
	}


	public function delete_all($user_id){
		$this->db->select('notifications.id');
		$this->db->join('project_contacts','project_contacts.id = notifications.project_contact_id');
		$this->db->join('projects','projects.id = project_contacts.project_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->where('contacts.created_by',$user_id);
		$this->db->where('notifications.type',2);
		$records = $this->db->get($this->_table)->result_array();
		$data = array();
		if(!empty($records)){
			foreach ($records as $row) {
				$data[] = $row['id'];
			}

			$this->db->where_in('id', $data);
			$this->db->delete($this->_table);
		}
	}

}

/* End of file notification_model.php */
/* Location: ./application/modules/notifications/models/notification_model.php */