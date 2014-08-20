<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('grouptype/Grouptype_model');
	}


	public function index()
	{
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contacts'] = $this->Contact_model->search($this->data['filter']);
		$this->layout->view('contact/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('department', 'Department', 'required|is_unique[departments.department]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['grouptypes'] = $this->Grouptype_model->order_by('grouptype_desc')->get_all();
			$this->layout->view('contact/create',$this->data);
		}else{
			$department = strtoupper(trim($this->input->post('department')));
			$this->Department_model->insert(array('department' => $department));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$department.' department!');
			redirect('department');
		}
	}

}

/* End of file contact.php */
/* Location: ./application/modules/contact/controllers/contact.php */