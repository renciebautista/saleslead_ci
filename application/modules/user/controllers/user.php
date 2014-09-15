<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('department/Department_model');
		$this->load->model('group/Group_model');
	}

	public function index()
	{
		$this->data['filter'] = trim($this->input->get('q'));
		// $this->data['departments'] = $this->Department_model->search($this->data['filter']);
		$this->layout->view('user/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('emp_id', 'Employee Id', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');

		$this->form_validation->set_rules('department_id', 'Department ', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('role_id', 'Role', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_message('valid_email', 'A valid email is required.');
		$this->form_validation->set_message('matches', 'This field does not match the Password field.');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['departments'] = $this->Department_model->order_by('department')->get_all();
			$this->data['roles'] = $this->Group_model->order_by('ugrp_name')->get_all();
			$this->layout->view('user/create',$this->data);
		}else{
			// Get user login details from input.
			$email = $this->input->post('email');
			$username = strtolower($this->input->post('username'));
			$role = $this->input->post('role_id');
			$password = $this->input->post('password');

			// Get user profile data from input.
			// You can add whatever columns you need to customise user tables.
			$user_detail = array(
				'first_name' => $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),
				'last_name' => $this->input->post('last_name'),
				'emp_id' => $this->input->post('emp_id'),
				'department_id' => $this->input->post('department_id'),
				'created_by' => 1,
				'created_at' => date('YmdHis'),
				'updated_at' => date('YmdHis')
			);

			// Set whether to instantly activate account.
			// This var will be used twice, once for registration, then to check if to log the user in after registration.
			$instant_activate = TRUE;

			// The last 2 variables on the register function are optional, these variables allow you to:
			// #1. Specify the group ID for the user to be added to (i.e. 'Moderator' / 'Public'), the default is set via the config file.
			// #2. Set whether to automatically activate the account upon registration, default is FALSE. 
			// Note: An account activation email will be automatically sent if auto activate is FALSE, or if an activation time limit is set by the config file.
			$response = $this->flexi_auth->insert_user($email, $username, $password, $user_detail, $role, $instant_activate);

			if ($response)
			{
				// This is an example 'Welcome' email that could be sent to a new user upon registration.
				// Bear in mind, if registration has been set to require the user activates their account, they will already be receiving an activation email.
				// Therefore sending an additional email welcoming the user may be deemed unnecessary.
				// $email_data = array('identity' => $email);
				// $this->flexi_auth->send_email($email, 'Welcome', 'registration_welcome.tpl.php', $email_data);
				// Note: The 'registration_welcome.tpl.php' template file is located in the '../views/includes/email/' directory defined by the config file.
				
				###+++++++++++++++++###
				
				// Save any public status or error messages (Whilst suppressing any admin messages) to CI's flash session data.
				$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
				
				// This is an example of how to log the user into their account immeadiately after registering.
				// This example would only be used if users do not have to authenticate their account via email upon registration.
				// if ($instant_activate && $this->flexi_auth->login($email, $password))
				// {
				// 	// Redirect user to public dashboard.
				// 	redirect('auth_public/dashboard');
				// }
				
				// Redirect user to login page
				redirect('user');
			}
		}
	}

}

/* End of file user.php */
/* Location: ./application/modules/user/controllers/user.php */