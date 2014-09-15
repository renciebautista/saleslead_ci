<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	

	public function index()
	{
		// debug($this->flexi_auth->get_user_by_id_row_array());
		$this->layout->view('dashboard/index',$this->data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */