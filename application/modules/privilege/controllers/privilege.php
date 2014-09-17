<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privilege extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Privilege_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('PRIVILEGES MAINTENANCE')){
			redirect('privilege/access_denied');		
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['privileges'] = $this->Privilege_model->search($this->data['filter']);
		$this->layout->view('privilege/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('PRIVILEGES MAINTENANCE')){
			redirect('privilege/access_denied');		
		}
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('privilege', 'Privilege', 'required|trim|is_unique[user_privileges.upriv_name]');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('privilege/create',$this->data);
		}else{
			$name = strtoupper(trim($this->input->post('privilege')));
			$description = strtoupper(trim($this->input->post('description')));
			$this->flexi_auth->insert_privilege($name, $description);
			$this->flash_message->set('message','alert alert-success','Successfully created '.$name.' privilege!');
			redirect('privilege');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('PRIVILEGES MAINTENANCE')){
			redirect('privilege/access_denied');		
		}

		if(!$this->Privilege_model->id_exist($id,'upriv_id') || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('privilege', 'Privilege', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->data['privilege'] = $this->Privilege_model->get($id);
			$this->layout->view('privilege/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$data['upriv_name'] = strtoupper(trim($this->input->post('privilege')));
			$data['upriv_desc'] = strtoupper(trim($this->input->post('description')));
			$this->flexi_auth->update_privilege($_id,$data);
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$data['upriv_name'].' privilege!');
			redirect('privilege');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('PRIVILEGES MAINTENANCE')){
			redirect('privilege/access_denied');		
		}

		if(!$this->Privilege_model->id_exist($id,'upriv_id') || (is_null($id))){
			$this->not_found();
			return;
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');;

		if ($this->form_validation->run() == FALSE){
			$this->data['privilege'] = $this->Privilege_model->get($id);
			$this->layout->view('privilege/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$privilege = $this->Privilege_model->get($_id);
			if(($this->Privilege_model->related_to('user_privilege_groups','upriv_groups_upriv_fk',$_id)) ||
				($this->Privilege_model->related_to('user_privilege_users','upriv_users_upriv_fk',$_id))){
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$privilege['upriv_name'].' it is related to a record!');
				redirect('privilege/delete/'.$_id);
			}else{
				$this->Privilege_model->delete($_id);
				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$privilege['upriv_name'].' privilege!');
				redirect('privilege');
			}	
		}
	}

}

/* End of file privilege.php */
/* Location: ./application/modules/privilege/controllers/privilege.php */