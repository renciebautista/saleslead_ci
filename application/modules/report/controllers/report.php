<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('project/Project_detail_model');
	}

	public function index()
	{
		
	}

	public function callreport(){
		if(!$_POST){
			$this->data['start_date'] = '';
			$this->data['end_date'] = '';
			$this->data['callreports'] = array();
		}else{
			$this->data['start_date'] = $this->input->post('start_date');
			$this->data['end_date'] = $this->input->post('end_date');
			$this->data['callreports'] = $this->Project_detail_model->get_call_report($this->_user_id,$this->data['start_date'],$this->data['end_date']);
		}
		$this->layout->view('report/callreport',$this->data);
		
	}

	// public function area(){
	// 	$this->data['report'] = array();
	// 	$this->layout->view('report/area',$this->data);
	// }

	// public function salesman(){
	// 	$this->data['report'] = array();
	// 	$this->layout->view('report/salesman',$this->data);
	// }

	// public function salesmanweekly(){
	// 	$this->data['report'] = array();
	// 	$this->layout->view('report/salesmanweekly',$this->data);
	// }
}

/* End of file report.php */
/* Location: ./application/modules/report/controllers/report.php */