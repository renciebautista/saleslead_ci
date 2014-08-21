<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Company_model');
		$this->load->model('grouptype/Grouptype_model');
		$this->load->model('state/State_model');
		$this->load->model('city/City_model');
		$this->load->model('Company_address_model');
		$this->load->model('Address_grouptype_model');
	}

	public function index(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['comapanies'] = $this->Company_model->search($this->data['filter']);
		$this->layout->view('company/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('company_name', 'Company Name', 'required|is_unique[companies.company]');
		$this->form_validation->set_rules('lot', 'Lot', 'trim');
		$this->form_validation->set_rules('street', 'Street', 'trim');
		$this->form_validation->set_rules('brgy', 'Bgry', 'trim|required');
		$this->form_validation->set_rules('city_id', 'City', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('grouptype[]', 'Group Type', 'trim');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['grouptypes'] = $this->Grouptype_model->order_by('grouptype_desc')->get_all();
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->layout->view('company/create',$this->data);
		}else{
			$this->db->trans_start();
				$company = strtoupper(trim($this->input->post('company_name')));
				$groups = $this->input->post('grouptype');
				$company_id = $this->Company_model->insert(array('company' => $company, 'created_by' => $this->flexi_auth->get_user_id()));

				$address_id = $this->Company_address_model->insert(array(
					'company_id' => $company_id,
					'lot' => strtoupper(trim($this->input->post('lot'))),
					'street' => strtoupper(trim($this->input->post('street'))),
					'bgry' => strtoupper(trim($this->input->post('brgy'))),
					'city_id' => strtoupper(trim($this->input->post('city_id'))),
					'created_by' => $this->flexi_auth->get_user_id()));

				$this->Address_grouptype_model->insert_group($address_id,$groups);
			$this->db->trans_complete();
			
			if ($this->db->trans_status() === FALSE){
			   	$this->flash_message->set('message','alert alert-error','Error occured on adding record.');
			}else{
				$this->flash_message->set('message','alert alert-success','Successfully created '.$company.' company!');
			}
			redirect('company');
		}
	}

}

/* End of file company.php */
/* Location: ./application/modules/company/controllers/company.php */