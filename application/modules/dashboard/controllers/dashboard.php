<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('project/Project_model');
	}

	public function index(){
		$this->data['new_project'] = $this->Project_model->new_assigned_project($this->_user_id);
		$this->layout->view('dashboard/index',$this->data);
		$priveleges = $this->session->userdata['flexi_auth']['privileges'];
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */