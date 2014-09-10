<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function area(){
		$this->data['report'] = array();
		$this->layout->view('report/area',$this->data);
	}

	public function salesman(){
		$this->data['report'] = array();
		$this->layout->view('report/salesman',$this->data);
	}

	public function salesmanweekly(){
		$this->data['report'] = array();
		$this->layout->view('report/salesmanweekly',$this->data);
	}
}

/* End of file report.php */
/* Location: ./application/modules/report/controllers/report.php */