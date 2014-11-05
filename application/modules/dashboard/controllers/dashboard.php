<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('project/Project_model');
		$this->load->model('project/Project_contact_model');
		$this->load->model('notifications/Notification_model');
		$this->load->model('request/Requests_model');
	}

	public function index(){
		$this->data['new_contacts'] = $this->Project_contact_model->for_approval_project_contacts_count($this->_user_id);
		$this->data['new_projects'] = $this->Project_model->new_assigned_project_count($this->_user_id);
		$this->data['project_comments'] = $this->Notification_model->project_comments($this->_user_id);
		$this->data['joined_projects'] = $this->Notification_model->joined_projects($this->_user_id);
		$this->data['for_assigning'] = $this->Project_model->forassigning_count();

		$requesttypes = $this->Request_approver_model->my_for_approval($this->_user_id,1);
		$this->data['request_approval'] = $this->Requests_model->for_approval_count($requesttypes);
		
		$this->layout->view('dashboard/index',$this->data);
		$priveleges = $this->session->userdata['flexi_auth']['privileges'];
	}

	public function contacts_approval()
	{
		$this->data['projects'] = $this->Project_contact_model->for_approval_project_contacts_company($this->_user_id);
		$this->layout->view('dashboard/contacts_approval',$this->data);
	}

	public function projectcomments(){
		$this->session->set_userdata('back_link','dashboard/projectcomments');
		$this->data['projects'] = $this->Notification_model->projects_with_comments($this->_user_id);
		$this->layout->view('dashboard/projectcomments',$this->data);
	}

	public function joinedcontacts($id = null){
		if(is_null($id)){
			$this->data['notifications'] = $this->Notification_model->joined_project_notifications($this->_user_id);
			$this->layout->view('dashboard/joinedcontacts',$this->data);
		}else{
			$this->Notification_model->delete($id);
			// $this->flash_message->set('message','alert alert-success','Painting specification successfully updated!');
			redirect('dashboard/joinedcontacts');
		}
	}

	public function clearnotifications(){
		$this->Notification_model->delete_all($this->_user_id);
		redirect('dashboard/joinedcontacts');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */