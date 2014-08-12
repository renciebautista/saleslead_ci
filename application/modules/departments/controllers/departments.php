<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Department_model');
	}

	public function index(){
		$data['departments'] = $this->Department_model->order_by('department')->get_all();
		$this->layout->view('departments/index', $data);

	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('departments/create');
		}else{
			$department = strtoupper(trim($this->input->post('department')));
			$this->Department_model->insert(array('department' => $department));

			$this->flash_message->set('message','alert alert-success','Successfully created '.$department.' department!');
			redirect('departments');
		}
	}

	public function edit($id){
		if(count($this->Department_model->get($id))< 1){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$data['department'] = $this->Department_model->get($id);
			$this->layout->view('departments/edit',$data);
		}else{
			$_id = $this->input->post('_id');
			$department = strtoupper(trim($this->input->post('department')));
			$this->Department_model->update($_id,array('department' => $department));

			$this->flash_message->set('message','alert alert-success','Successfully updated '.$department.' department!');
			redirect('departments');
		}
	}

	public function delete($id){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$data['department'] = $this->Department_model->get($id);
			$this->layout->view('departments/delete',$data);
		}else{
			$_id = $this->input->post('_id');
			$department = $this->Department_model->get($_id);
			$this->Department_model->delete($_id);

			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$department->department.' department!');
			redirect('departments');
		}
	}

}

/* End of file departments.php */
/* Location: ./application/modules/departments/controllers/departments.php */