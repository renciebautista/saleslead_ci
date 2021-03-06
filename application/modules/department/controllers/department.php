<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Department_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('DEPARTMENTS MAINTENANCE')){
			redirect('department/access_denied');		
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['departments'] = $this->Department_model->search($this->data['filter']);
		$this->layout->view('department/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('DEPARTMENTS MAINTENANCE')){
			redirect('department/access_denied');		
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('department/create',$this->data);
		}else{
			$department = strtoupper(trim($this->input->post('department')));
			$this->Department_model->insert(array('department' => $department));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$department.' department!');
			redirect('department');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('DEPARTMENTS MAINTENANCE')){
			redirect('department/access_denied');		
		}

		if(!$this->Department_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', 'Department Id', 'required');
		$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['department'] = $this->Department_model->get($id);
			$this->layout->view('department/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$department = strtoupper(trim($this->input->post('department')));
			$this->Department_model->update($_id,array('department' => $department));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$department.' department!');
			redirect('department');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('DEPARTMENTS MAINTENANCE')){
			redirect('department/access_denied');		
		}

		if(!$this->Department_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['department'] = $this->Department_model->get($id);
			$this->layout->view('department/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$department = $this->Department_model->get($_id);
			if($this->Department_model->related_to('user_details','department_id',$_id)){
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$department['department'].' it is related to a record!');
				redirect('department/delete/'.$_id);
			}else{
				$this->Department_model->delete($_id);
				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$department['department'].' department!');
				redirect('department');
			}			
		}
	}

}

/* End of file department.php */
/* Location: ./application/controllers/department.php */