<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $_user_id;

	function __construct(){
		parent::__construct();

		$this->output->enable_profiler(TRUE);

		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		$this->auth = new stdClass;
		
		// Load 'standard' flexi auth library by default.
		$this->load->library('flexi_auth');	
		
     	// Check user is logged in as an admin.
		// For security, admin users should always sign in via Password rather than 'Remember me'.

		// if (! $this->flexi_auth->is_logged_in_via_password()) 
		if(!$this->flexi_auth->is_logged_in())
		{
			// Set a custom error message.
			$this->flexi_auth->set_error_message('You must login to access this area.', TRUE);
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			redirect('auth');
		}

		$this->_user_id = $this->flexi_auth->get_user_id();

		// Define a global variable to store data that is then used by the end view page.
		$this->data = null;

		$user = $this->flexi_auth->get_user_by_id_row_array();
		
		$this->data['user_full_name'] = (! empty($user)) ? ucwords(strtolower($user['last_name'].', '.$user['first_name'].' '.$user['middle_name'])) : null;

		$this->layout->setLayout('layouts/default_layout');
	
	}

	public function not_found(){
		$this->layout->view('shared/not_found',$this->data);
	}

	public function access_denied(){
		$this->layout->view('shared/access_denied',$this->data);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */