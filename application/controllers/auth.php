<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();

		// $this->output->enable_profiler(TRUE);

		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		$this->auth = new stdClass;
		
		// Load 'standard' flexi auth library by default.
		$this->load->library('flexi_auth');	

		// if ($this->session->flashdata('message')) { $this->session->keep_flashdata('message'); }
		
		// Define a global variable to store data that is then used by the end view page.
		$this->data = null;
	
	}

	public function index(){
		$this->login();
	}

	public function login(){
		if ($this->input->post('login_user'))
		{
			$this->load->model('Auth_model');
			$this->Auth_model->login();
		}

		// Get any status message that may have been set.
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		
		$this->load->view('auth/login', $this->data);
	}

	/**
	 * logout
	 * This example logs the user out of all sessions on all computers they may be logged into.
	 * In this demo, this page is accessed via a link on the demo header once a user is logged in.
	 */
	public function logout() 
	{
		// By setting the logout functions argument as 'TRUE', all browser sessions are logged out.
		$this->flexi_auth->logout(TRUE);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_auth->get_messages());		
 
		redirect('auth');
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */