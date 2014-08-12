<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->layout->setLayout('layouts/default_layout');
	}

	public function not_found(){
		$this->layout->view('shared/not_found');
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */