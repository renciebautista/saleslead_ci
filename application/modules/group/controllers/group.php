<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Group_model');
		$this->load->model('privilege/Privilege_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('GROUPS MAINTENANCE')){
			redirect('group/access_denied');		
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['groups'] = $this->Group_model->search($this->data['filter']);
		$this->layout->view('group/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('group', 'Group', 'required|is_unique[user_groups.ugrp_name]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('group/create',$this->data);
		}else{
			$group = strtoupper(trim($this->input->post('group')));
			$this->Group_model->insert(array('ugrp_name' => $group));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$group.' group!');
			redirect('group');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('GROUPS MAINTENANCE')){
			redirect('department/access_denied');		
		}

		if(!$this->Group_model->id_exist($id,'ugrp_id') || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('group', 'Group', 'required|is_unique[user_groups.ugrp_name]');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->data['group'] = $this->Group_model->get($id);
			$this->layout->view('group/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$group = strtoupper(trim($this->input->post('group')));
			$this->Group_model->update($_id,array('ugrp_name' => $group));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$group.' group!');
			redirect('group');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('GROUPS MAINTENANCE')){
			redirect('department/access_denied');		
		}

		if(!$this->Group_model->id_exist($id,'ugrp_id') || (is_null($id))){
			$this->not_found();
			return;
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');;

		if ($this->form_validation->run() == FALSE){
			$this->data['group'] = $this->Group_model->get($id);
			$this->layout->view('group/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$group = $this->Group_model->get($_id);
			if($this->Group_model->related_to('user_accounts','uacc_group_fk',$_id)) {
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$group['ugrp_name'].' it is related to a record!');
				redirect('group/delete/'.$_id);
			}else{
				$this->Group_model->delete($_id);
				$this->Group_model->delete_privileges($_id);
				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$group['ugrp_name'].' group!');
				redirect('group');
			}	

			
		}
	}

	public function privileges($group_id = null){
		if (!$this->flexi_auth->is_privileged('GROUPS MAINTENANCE')){
			redirect('department/access_denied');		
		}

		if(!$this->Group_model->id_exist($group_id,'ugrp_id') || (is_null($group_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('group_id', 'Group Id', 'required');
		$this->form_validation->set_rules('privileges', 'privileges', '');
		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['group'] = $this->Group_model->get($group_id);
			$this->data['selected'] = $this->Group_model->privileges($group_id);
			$this->data['privileges'] = $this->Privilege_model->search();
			$this->layout->view('group/privileges',$this->data);
		}else{
			$group_id = $this->input->post('group_id');
			$privileges = $this->input->post('privileges');

			$this->Group_model->update_group_privileges($group_id,$privileges);
			$this->flash_message->set('message','alert alert-success','Successfully updated group privileges!');
			redirect('group');
		}

		
	}

}

/* End of file group.php */
/* Location: ./application/modules/group/controllers/group.php */