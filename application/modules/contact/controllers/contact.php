<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('grouptype/Grouptype_model');
		$this->load->model('company/Company_model');
		$this->load->model('city/City_model');
	}


	public function index()
	{
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contacts'] = $this->Contact_model->search($this->data['filter']);
		$this->layout->view('contact/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('company_id', 'Company Id', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('title', 'Title / Position', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('contact/create',$this->data);
		}else{
			$data['created_by'] = $this->flexi_auth->get_user_id();
			$data['company_id'] = strtoupper(trim($this->input->post('company_id')));
			$data['first_name'] = strtoupper(trim($this->input->post('first_name')));
			$data['middle_name'] = strtoupper(trim($this->input->post('middle_name')));
			$data['last_name'] = strtoupper(trim($this->input->post('last_name')));
			$data['title'] = strtoupper(trim($this->input->post('title')));

			$contact_id = $this->Contact_model->insert($data);
			$this->flash_message->set('message','alert alert-success','Successfully created a contact!');
			redirect('contact/details/'.$contact_id);
		}
	}

	public function details($id = null){

	}

	public function createcompany(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('lot', 'Lot', 'trim');
		$this->form_validation->set_rules('street', 'Street', 'trim');
		$this->form_validation->set_rules('brgy', 'Bgry', 'trim|required');
		$this->form_validation->set_rules('city_id', 'City', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('grouptype[]', 'Group Type', 'trim');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['grouptypes'] = $this->Grouptype_model->order_by('grouptype_desc')->get_all();
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->layout->view('contact/createcompany',$this->data);
		}else{
			$this->db->trans_start();
				$company = strtoupper(trim($this->input->post('company_name')));
				$groups = $this->input->post('grouptype');
				$company_id = $this->Company_model->insert(array(
					'company' => $company, 
					'lot' => strtoupper(trim($this->input->post('lot'))),
					'street' => strtoupper(trim($this->input->post('street'))),
					'brgy' => strtoupper(trim($this->input->post('brgy'))),
					'city_id' => strtoupper(trim($this->input->post('city_id'))),
					'created_by' => $this->flexi_auth->get_user_id()));
			$this->db->trans_complete();
			
			if ($this->db->trans_status() === FALSE){
			   	$this->flash_message->set('message','alert alert-error','Error occured on adding record.');
			}else{
				$this->flash_message->set('message','alert alert-success','Successfully created '.$company.' company!');
			}
			redirect('contact/create/');
		}

	}

}

/* End of file contact.php */
/* Location: ./application/modules/contact/controllers/contact.php */