<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjstatus extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Prjstatus_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['prjstatuses'] = $this->Prjstatus_model->search($this->data['filter']);
		$this->layout->view('prjstatus/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjstatus', 'Project Status', 'required|is_unique[prjstatuses.prjstatus_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('prjstatus/create',$this->data);
		}else{
			$prjstatus = strtoupper(trim($this->input->post('prjstatus')));
			$this->Prjstatus_model->insert(array('prjstatus_desc' => $prjstatus));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$prjstatus.' project status!');
			redirect('prjstatus');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}

		if(!$this->Prjstatus_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjstatus', 'prjstatus', 'required|is_unique[prjstatuses.prjstatus_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjstatus'] = $this->Prjstatus_model->get($id);
			$this->layout->view('prjstatus/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjstatus = strtoupper(trim($this->input->post('prjstatus')));
			$this->Prjstatus_model->update($_id,array('prjstatus_desc' => $prjstatus));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$prjstatus.' project status!');
			redirect('prjstatus');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}

		if(!$this->Prjstatus_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjstatus'] = $this->Prjstatus_model->get($id);
			$this->layout->view('prjstatus/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjstatus = $this->Prjstatus_model->get($_id);
			$this->Prjstatus_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$prjstatus['prjstatus'].' prjstatus!');
			redirect('prjstatus');
		}
	}

}

/* End of file prjstatus.php */
/* Location: ./application/modules/prjstatus/controllers/prjstatus.php */