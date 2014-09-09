<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('project/Project_model');
	}

	public function index()
	{
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['status'] = trim($this->input->get('s'));
		$this->data['tasks'] = array();
		$this->layout->view('task/index',$this->data);
	}

	public function details(){
		$this->data['project'] = $this->Project_model->details(3);
		$this->layout->view('task/details',$this->data);
	}

	public function advances(){
		$this->data['project'] = $this->Project_model->details(3);
		$this->data['advances'] = array();
		$this->layout->view('task/advances',$this->data);
	}

	public function addadvances(){
		$this->data['project'] = $this->Project_model->details(3);

		$this->layout->view('task/addadvances',$this->data);
	}

	public function liquidations(){
		$this->data['project'] = $this->Project_model->details(3);
		$this->data['liquidations'] = array();
		$this->layout->view('task/liquidations',$this->data);
	}
	
	public function addliquidations(){
		$this->data['project'] = $this->Project_model->details(3);

		$this->layout->view('task/addliquidations',$this->data);
	}
}

/* End of file task.php */
/* Location: ./application/modules/task/controllers/task.php */