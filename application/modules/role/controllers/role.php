<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Role_model');
	}

	public function index(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['roles'] = $this->Role_model->search($this->data['filter']);
		$this->layout->view('role/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('role', 'Role', 'required|is_unique[user_groups.ugrp_name]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('role/create',$this->data);
		}else{
			$role = strtoupper(trim($this->input->post('role')));
			$this->Role_model->insert(array('ugrp_name' => $role));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$role.' role!');
			redirect('role');
		}
	}

	// public function edit($id = null){
	// 	if((count($this->Role_model->get($id))< 1) || (is_null($id))){
	// 		$this->not_found();
	// 		return;
	// 	}

	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');

	// 	$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

	// 	if ($this->form_validation->run() == FALSE){
	// 		$data['department'] = $this->Role_model->get($id);
	// 		$this->layout->view('department/edit',$data);
	// 	}else{
	// 		$_id = $this->input->post('_id');
	// 		$department = strtoupper(trim($this->input->post('department')));
	// 		$this->Role_model->update($_id,array('department' => $department));
	// 		$this->flash_message->set('message','alert alert-success','Successfully updated '.$department.' department!');
	// 		redirect('department');
	// 	}
	// }

	// public function delete($id = null){
	// 	if((count($this->Role_model->get($id))< 1) || (is_null($id))){
	// 		$this->not_found();
	// 		return;
	// 	}

	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_rules('_id', '', 'required');

	// 	$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

	// 	if ($this->form_validation->run() == FALSE){
	// 		$data['department'] = $this->Role_model->get($id);
	// 		$this->layout->view('department/delete',$data);
	// 	}else{
	// 		$_id = $this->input->post('_id');
	// 		$department = $this->Role_model->get($_id);
	// 		$this->Role_model->delete($_id);
	// 		$this->flash_message->set('message','alert alert-success','Successfully deleted '.$department->department.' department!');
	// 		redirect('department');
	// 	}
	// }
	// permissions
}

/* End of file role.php */
/* Location: ./application/modules/role/controllers/role.php */