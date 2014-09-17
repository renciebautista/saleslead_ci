<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Company_model');
		$this->load->model('Address_grouptype_model');
		$this->load->model('Company_typelist_model');
		$this->load->model('companytype/Companytype_model');
		$this->load->model('city/City_model');
		$this->load->model('contact/Contact_model');

	}

	public function lists(){
		if($this->input->is_ajax_request()){
			$filter = $this->input->get('q');
			$page_limit = $this->input->get('page_limit');
			$companies = $this->Company_model->my_companies($filter,$this->_user_id,$page_limit);

			$data = array();
			if(!empty($companies)){
				foreach ($companies as $company) {
					$row_array['id'] = $company['id'];
					$row_array['text'] = $company['company'];
					$row_array['address'] = ucwords(strtolower($company['lot'].' '.$company['street'].' '.$company['brgy'].', '.$company['city'].' '.$company['province']));
					$data[] = $row_array;
				}
			}
			echo json_encode(array(
				'status' => 'success',
				'contacts' => $data
				));
		}
	}
	public function info(){
		if($this->input->is_ajax_request()){
			$id = $this->input->get('id');
			$company = $this->Company_model->details($id);

			$data = array();
			if(!empty($company)){
				$data['id'] = $company['id'];
				$data['text'] = $company['company'];
				$data['address'] = ucwords(strtolower($company['lot'].' '.$company['street'].' '.$company['brgy'].', '.$company['city'].' '.$company['province']));
			}
			echo json_encode(array(
				'status' => 'success',
				'contacts' => $data
				));
		}
	}

// ============================================================
	public function index(){
		if (!$this->flexi_auth->is_privileged('COMPANY MAINTENANCE')){
			redirect('company/access_denied');		
		}
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['comapanies'] = $this->Company_model->my_companies($this->data['filter'],$this->_user_id);
		$this->layout->view('company/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('COMPANY MAINTENANCE')){
			redirect('company/access_denied');		
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('lot', 'Lot', 'trim');
		$this->form_validation->set_rules('street', 'Street', 'trim');
		$this->form_validation->set_rules('brgy', 'Bgry', 'trim|required');
		$this->form_validation->set_rules('city_id', 'City', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('companytype[]', 'Company Type', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['companytypes'] = $this->Companytype_model->order_by('companytype')->get_all();
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->layout->view('company/create',$this->data);
		}else{
			$this->db->trans_start();
				$company = strtoupper(trim($this->input->post('company_name')));
				$company_types = $this->input->post('companytype');
				$company_id = $this->Company_model->insert(array(
					'company' => $company, 
					'lot' => strtoupper(trim($this->input->post('lot'))),
					'street' => strtoupper(trim($this->input->post('street'))),
					'brgy' => strtoupper(trim($this->input->post('brgy'))),
					'city_id' => strtoupper(trim($this->input->post('city_id'))),
					'created_by' => $this->_user_id));

				$this->Company_typelist_model->insert_types($company_id,$company_types);

			$this->db->trans_complete();
			
			if ($this->db->trans_status() === FALSE){
			   	$this->flash_message->set('message','alert alert-error','Error occured on adding record.');
			}else{
				$this->flash_message->set('message','alert alert-success','Successfully created '.$company.' company!');
			}
			redirect('company');
		}
	}

	public function edit($company_id = null){
		if (!$this->flexi_auth->is_privileged('COMPANY MAINTENANCE')){
			redirect('company/access_denied');		
		}

		if(!$this->Company_model->is_my_company($company_id,$this->_user_id) || (is_null($company_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('lot', 'Lot', 'trim');
		$this->form_validation->set_rules('street', 'Street', 'trim');
		$this->form_validation->set_rules('brgy', 'Bgry', 'trim|required');
		$this->form_validation->set_rules('city_id', 'City', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('companytype[]', 'Company Type', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['companytypes'] = $this->Companytype_model->order_by('companytype')->get_all();
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->data['company_types'] = $this->Company_typelist_model->type_list($company_id);
			$this->data['company'] = $this->Company_model->details($company_id);
			$this->layout->view('company/edit',$this->data);
		}else{
			$this->db->trans_start();
				$_id = $this->input->post('_id');
				$company = strtoupper(trim($this->input->post('company_name')));
				$company_types = $this->input->post('companytype');
				$this->Company_model->update($_id,array(
					'company' => $company, 
					'lot' => strtoupper(trim($this->input->post('lot'))),
					'street' => strtoupper(trim($this->input->post('street'))),
					'brgy' => strtoupper(trim($this->input->post('brgy'))),
					'city_id' => strtoupper(trim($this->input->post('city_id')))));

				$this->Company_typelist_model->update_types($company_id,$company_types);

			$this->db->trans_complete();
			
			if ($this->db->trans_status() === FALSE){
			   	$this->flash_message->set('message','alert alert-error','Error occured on updating record.');
			}else{
				$this->flash_message->set('message','alert alert-success','Successfully updated '.$company.' company!');
			}
			redirect('company');
		}
	}

	public function delete($company_id = null){
		if (!$this->flexi_auth->is_privileged('COMPANY MAINTENANCE')){
			redirect('company/access_denied');		
		}

		if(!$this->Company_model->is_my_company($company_id,$this->_user_id) || (is_null($company_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->data['companytypes'] = $this->Company_typelist_model->type_list_details($company_id);
			$this->data['company'] = $this->Company_model->details($company_id);
			$this->layout->view('company/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$company = $this->Company_model->get($_id);
			if($this->Company_model->related_to('contacts','company_id',$_id)){
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$company['company'].' it is related to a contact!');
				redirect('company/delete/'.$_id);
			}else{
				$this->Company_model->delete($_id);
				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$company['company'].' company!');
				redirect('company');
			}			
		}
	}

	public function contacts($company_id = null){
		if (!$this->flexi_auth->is_privileged('COMPANY MAINTENANCE')){
			redirect('company/access_denied');		
		}

		if(!$this->Company_model->is_my_company($company_id,$this->_user_id) || (is_null($company_id))){
			$this->not_found();
			return;
		}
		
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['company'] = $this->Company_model->details($company_id);
		$this->data['contacts'] = $this->Contact_model->get_by_company_id($this->data['filter'],$this->_user_id,$company_id);
		$this->layout->view('company/contacts',$this->data);
	}

	public function createcontact($company_id = null){
		if (!$this->flexi_auth->is_privileged('COMPANY MAINTENANCE')){
			redirect('company/access_denied');		
		}

		if(!$this->Company_model->is_my_company($company_id,$this->_user_id) || (is_null($company_id))){
			$this->not_found();
			return;
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('company_id', 'Company Id', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('title', 'Title / Position', 'trim|required');

		// $this->form_validation->set_message('required', 'This field is required.');
		// $this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['company'] = $this->Company_model->details($company_id);
			$this->layout->view('company/createcontact',$this->data);
		}else{
			$data['created_by'] = $this->_user_id;
			$data['company_id'] = $this->input->post('company_id');
			$data['first_name'] = strtoupper(trim($this->input->post('first_name')));
			$data['middle_name'] = strtoupper(trim($this->input->post('middle_name')));
			$data['last_name'] = strtoupper(trim($this->input->post('last_name')));
			$data['title'] = strtoupper(trim($this->input->post('title')));

			$contact_id = $this->Contact_model->insert($data);
			$this->flash_message->set('message','alert alert-success','Successfully created a contact!');
			redirect('contact/phones/'.$contact_id);
		}
		
	}
//-----------------------------------------------------
	// Ajax request
	
}

/* End of file company.php */
/* Location: ./application/modules/company/controllers/company.php */