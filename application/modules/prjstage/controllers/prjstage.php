<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjstage extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Prjstage_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('PROJECT STAGE MAINTENANCE')){
			redirect('prjstage/access_denied');		
		}
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['prjstages'] = $this->Prjstage_model->search($this->data['filter']);
		$this->layout->view('prjstage/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('PROJECT STAGE MAINTENANCE')){
			redirect('prjstage/access_denied');		
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjstage', 'Project Stage', 'required|is_unique[prjstages.prjstage_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('prjstage/create',$this->data);
		}else{
			$prjstage = strtoupper(trim($this->input->post('prjstage')));
			$this->Prjstage_model->insert(array('prjstage_desc' => $prjstage));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$prjstage.' project stage!');
			redirect('prjstage');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT STAGE MAINTENANCE')){
			redirect('prjstage/access_denied');		
		}
		if(!$this->Prjstage_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjstage', 'Project Stage', 'required|is_unique[prjstages.prjstage_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjstage'] = $this->Prjstage_model->get($id);
			$this->layout->view('prjstage/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjstage = strtoupper(trim($this->input->post('prjstage')));
			$this->Prjstage_model->update($_id,array('prjstage_desc' => $prjstage));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$prjstage.' project stage!');
			redirect('prjstage');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT STAGE MAINTENANCE')){
			redirect('prjstage/access_denied');		
		}
		if(!$this->Prjstage_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjstage'] = $this->Prjstage_model->get($id);
			$this->layout->view('prjstage/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjstage = $this->Prjstage_model->get($_id);
			$this->Prjstage_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$prjstage['prjstage_desc'].' project stage!');
			redirect('prjstage');
		}
	}


}

/* End of file prjstage.php */
/* Location: ./application/modules/prjstage/controllers/prjstage.php */