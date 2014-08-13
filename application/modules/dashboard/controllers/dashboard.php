<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		$this->layout->view('dashboard/index');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */