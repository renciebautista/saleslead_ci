<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privilege extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Privilege_model');
	}

	public function index(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['privileges'] = $this->Privilege_model->search($this->data['filter']);
		$this->layout->view('privilege/index',$this->data);
	}

	public function create(){
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

}

/* End of file privilege.php */
/* Location: ./application/modules/privilege/controllers/privilege.php */