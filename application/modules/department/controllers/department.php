<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Department_model');
	}

	public function index()
	{
		$this->data['departments'] = $this->Department_model->get_all();
		$this->layout->view('department/index',$this->data);
	}

}

/* End of file department.php */
/* Location: ./application/controllers/department.php */