<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$data['content'] = 'users/index';
		$this->load->view('layouts/default_layout',$data);
	}

}

/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */