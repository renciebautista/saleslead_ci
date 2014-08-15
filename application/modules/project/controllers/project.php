<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('prjclassification/Prjclassification_model');
		$this->load->model('prjcategory/Prjcategory_model');
		$this->load->model('prjstage/Prjstage_model');
		$this->load->model('prjstatus/Prjstatus_model');
	}

	public function index()
	{
		$this->data['filter'] = trim($this->input->get('q'));
		$this->layout->view('project/index',$this->data);
	}

	public function create(){
		$this->data['prjclassifications'] = $this->Prjclassification_model->order_by('prjclassification_desc')->get_all();
		$this->data['prjcategories'] = $this->Prjcategory_model->order_by('prjcategory_desc')->get_all();
		$this->data['prjstages'] = $this->Prjstage_model->order_by('prjstage_desc')->get_all();
		$this->data['prjstatuses'] = $this->Prjstatus_model->order_by('prjstatus_desc')->get_all();
		$this->layout->view('project/create',$this->data);
	}

}

/* End of file project.php */
/* Location: ./application/modules/project/controllers/project.php */