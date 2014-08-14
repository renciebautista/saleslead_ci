<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Department_model');
	}

	public function index(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['departments'] = $this->Department_model->search($this->data['filter']);
		$this->layout->view('department/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('department/create');
		}else{
			$department = strtoupper(trim($this->input->post('department')));
			$this->Department_model->insert(array('department' => $department));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$department.' department!');
			redirect('department');
		}
	}

	public function edit($id = null){
		if((count($this->Department_model->get($id))< 1) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$data['department'] = $this->Department_model->get($id);
			$this->layout->view('department/edit',$data);
		}else{
			$_id = $this->input->post('_id');
			$department = strtoupper(trim($this->input->post('department')));
			$this->Department_model->update($_id,array('department' => $department));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$department.' department!');
			redirect('department');
		}
	}

	public function delete($id = null){
		if((count($this->Department_model->get($id))< 1) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$data['department'] = $this->Department_model->get($id);
			$this->layout->view('department/delete',$data);
		}else{
			$_id = $this->input->post('_id');
			$department = $this->Department_model->get($_id);
			$this->Department_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$department->department.' department!');
			redirect('department');
		}
	}

}

/* End of file department.php */
/* Location: ./application/controllers/department.php */