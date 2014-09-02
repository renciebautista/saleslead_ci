<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Company_model');
		$this->load->model('grouptype/Grouptype_model');
		$this->load->model('city/City_model');
		$this->load->model('Address_grouptype_model');
	}



	public function index(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['comapanies'] = $this->Company_model->my_companies($this->data['filter'],$this->flexi_auth->get_user_id());
		$this->layout->view('company/index',$this->data);
	}

	public function create(){
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
			$this->layout->view('company/create',$this->data);
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
			redirect('company');
		}
	}

	public function contacts($id = null){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['company'] = $this->Company_model->details($id);
		$this->data['contacts'] = array();
		$this->layout->view('company/contacts',$this->data);
	}

	public function createcontact($id = null){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['company'] = $this->Company_model->details($id);
		$this->data['contacts'] = array();
		$this->layout->view('company/createcontact',$this->data);
	}
//-----------------------------------------------------
	// Ajax request
	public function lists(){
		if($this->input->is_ajax_request()){
			$filter = $this->input->get('q');
			$page_limit = $this->input->get('page_limit');
			$companies = $this->Company_model->my_companies($filter,$this->flexi_auth->get_user_id(),$page_limit);

			$data = array();
			if(!empty($companies)){
				foreach ($companies as $company) {
					$row_array['id'] = $company['id'];
					$row_array['text'] = $company['company'];
					$row_array['company'] = ucwords(strtolower($company['lot'].' '.$company['street'].' '.$company['brgy'].', '.$company['city'].' '.$company['province']));
					$data[] = $row_array;
				}
			}
			echo json_encode(array(
				'status' => 'success',
				'contacts' => $data
				));
		}
	}
}

/* End of file company.php */
/* Location: ./application/modules/company/controllers/company.php */