<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('project/Project_model');
		$this->load->model('project/Project_contact_model');
	}

	public function index(){
		$this->data['new_contacts'] = $this->Project_contact_model->for_approval_project_contacts_count($this->_user_id);
		$this->data['new_projects'] = $this->Project_model->new_assigned_project_count($this->_user_id);
		$this->layout->view('dashboard/index',$this->data);
		$priveleges = $this->session->userdata['flexi_auth']['privileges'];
	}

	public function contacts_approval()
	{
		$this->data['projects'] = $this->Project_contact_model->for_approval_project_contacts_company($this->_user_id);
		$this->layout->view('dashboard/contacts_approval',$this->data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */