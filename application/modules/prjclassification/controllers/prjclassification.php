<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjclassification extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Prjclassification_model');
	}

	public function index()
	{
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['prjclassifications'] = $this->Prjclassification_model->search($this->data['filter']);
		$this->layout->view('prjclassification/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjclassification', 'Project Classification', 'required|is_unique[prjclassifications.prjclassification_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('prjclassification/create');
		}else{
			$prjclassification = strtoupper(trim($this->input->post('prjclassification')));
			$this->Prjclassification_model->insert(array('prjclassification_desc' => $prjclassification));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$prjclassification.' project classification!');
			redirect('prjclassification');
		}
	}

	public function edit($id = null){
		if((count($this->Prjclassification_model->get($id))< 1) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjclassification', 'Project Classification', 'required|is_unique[prjclassifications.prjclassification_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjclassification'] = $this->Prjclassification_model->get($id);
			$this->layout->view('prjclassification/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjclassification = strtoupper(trim($this->input->post('prjclassification')));
			$this->Prjclassification_model->update($_id,array('prjclassification_desc' => $prjclassification));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$prjclassification.' project classification!');
			redirect('prjclassification');
		}
	}

	public function delete($id = null){
		if((count($this->Prjclassification_model->get($id))< 1) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjclassification'] = $this->Prjclassification_model->get($id);
			$this->layout->view('prjclassification/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjclassification = $this->Prjclassification_model->get($_id);
			$this->Prjclassification_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$prjclassification['prjclassification_desc'].' projcet classification!');
			redirect('prjclassification');
		}
	}

}

/* End of file prjclassification.php */
/* Location: ./application/modules/prjclassification/controllers/prjclassification.php */