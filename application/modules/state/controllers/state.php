<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('State_model');
	}

	public function index(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['states'] = $this->State_model->search($this->data['filter']);
		$this->layout->view('state/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('state', 'State', 'required|is_unique[states.state_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('state/create');
		}else{
			$state = strtoupper(trim($this->input->post('state')));
			$this->State_model->insert(array('state_desc' => $state));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$state.' state!');
			redirect('state');
		}
	}

	public function edit($id = null){
		if((count($this->State_model->get($id))< 1) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('state', 'State', 'required|is_unique[states.state_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['state'] = $this->State_model->get($id);
			$this->layout->view('state/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$state = strtoupper(trim($this->input->post('state')));
			$this->State_model->update($_id,array('state_desc' => $state));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$state.' state!');
			redirect('state');
		}
	}

	public function delete($id = null){
		if((count($this->State_model->get($id))< 1) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['state'] = $this->State_model->get($id);
			$this->layout->view('state/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$state = $this->State_model->get($_id);
			$this->State_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$state['state_desc'].' state!');
			redirect('state');
		}
	}

}

/* End of file state.php */
/* Location: ./application/modules/state/controllers/state.php */