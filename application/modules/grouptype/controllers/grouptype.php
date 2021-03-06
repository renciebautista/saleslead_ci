<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grouptype extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Grouptype_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('CONTACT TYPE STATUS MAINTENANCE')){
			redirect('grouptype/access_denied');		
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['grouptypes'] = $this->Grouptype_model->search($this->data['filter']);
		$this->layout->view('grouptype/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('CONTACT TYPE STATUS MAINTENANCE')){
			redirect('grouptype/access_denied');		
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('grouptype', 'Group Type', 'required|is_unique[grouptypes.grouptype_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('grouptype/create',$this->data);
		}else{
			$grouptype = strtoupper(trim($this->input->post('grouptype')));
			$this->Grouptype_model->insert(array('grouptype_desc' => $grouptype));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$grouptype.' contact type!');
			redirect('grouptype');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT TYPE STATUS MAINTENANCE')){
			redirect('grouptype/access_denied');		
		}

		if(!$this->Grouptype_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('grouptype', 'Group Type', 'required|is_unique[grouptypes.grouptype_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['grouptype'] = $this->Grouptype_model->get($id);
			$this->layout->view('grouptype/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$grouptype = strtoupper(trim($this->input->post('grouptype')));
			$this->Grouptype_model->update($_id,array('grouptype_desc' => $grouptype));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$grouptype.' contact type!');
			redirect('grouptype');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT TYPE STATUS MAINTENANCE')){
			redirect('grouptype/access_denied');		
		}

		if(!$this->Grouptype_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['grouptype'] = $this->Grouptype_model->get($id);
			$this->layout->view('grouptype/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$grouptype = $this->Grouptype_model->get($_id);
			$this->Grouptype_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$grouptype['grouptype_desc'].' contact type!');
			redirect('grouptype');
		}
	}
}

/* End of file grouptype.php */
/* Location: ./application/modules/grouptype/controllers/grouptype.php */