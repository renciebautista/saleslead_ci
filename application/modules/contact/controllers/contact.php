<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('grouptype/Grouptype_model');
		$this->load->model('company/Company_model');
		$this->load->model('city/City_model');
		$this->load->model('project/Project_contact_model');
		$this->load->model('project/Project_model');
		$this->load->model('project/Project_detail_model');
	}

	// Ajax request
	public function lists(){
		if($this->input->is_ajax_request()){
			$filter = $this->input->get('q');
			$page_limit = $this->input->get('page_limit');
			$contacts = $this->Contact_model->my_contacts($filter,$this->_user_id,$page_limit);

			$data = array();
			if(!empty($contacts)){
				foreach ($contacts as $contact) {
					$row_array['id'] = $contact['id'];
					$row_array['text'] = strtoupper($contact['last_name'].', '.$contact['first_name'].' '.$contact['last_name']);
					$row_array['company'] = $contact['company'];
					$row_array['address'] = ucwords(strtolower($contact['lot'].' '.$contact['street'].' '.$contact['brgy'].', '.$contact['city'].' '.$contact['province']));
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
			$contact = $this->Contact_model->details($id);

			$data = array();
			if(!empty($contact)){
				$data['id'] = $contact['id'];
				$data['text'] = strtoupper($contact['last_name'].', '.$contact['first_name'].' '.$contact['last_name']);
				$data['company'] = $contact['company'];
				$data['address'] = ucwords(strtolower($contact['lot'].' '.$contact['street'].' '.$contact['brgy'].', '.$contact['city'].' '.$contact['province']));
			}
			echo json_encode(array(
				'status' => 'success',
				'contacts' => $data
				));
		}
	}

// ============================================================

	public function index(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contacts'] = $this->Contact_model->search($this->data['filter'],$this->_user_id);
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
			$data['created_by'] = $this->_user_id;
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
				$contact = strtoupper(trim($this->input->post('company_name')));
				$groups = $this->input->post('grouptype');
				$contact_id = $this->Company_model->insert(array(
					'company' => $contact, 
					'lot' => strtoupper(trim($this->input->post('lot'))),
					'street' => strtoupper(trim($this->input->post('street'))),
					'brgy' => strtoupper(trim($this->input->post('brgy'))),
					'city_id' => strtoupper(trim($this->input->post('city_id'))),
					'created_by' => $this->_user_id,
					));
			$this->db->trans_complete();
			
			if ($this->db->trans_status() === FALSE){
			   	$this->flash_message->set('message','alert alert-danger','Error occured on adding record.');
			}else{
				$this->flash_message->set('message','alert alert-success','Successfully created '.$contact.' company!');
			}
			redirect('contact/create/');
		}
	}
// ========================================================

	public function project($contact_id = null) {
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contact'] = $this->Contact_model->details($contact_id);
		$this->data['projects'] = $this->Project_contact_model->projects($contact_id);
		$this->layout->view('contact/project',$this->data);
	}

	public function updateproject($project_contact_id = null){
		$this->data['details'] = $this->Project_detail_model->get_contact_details($project_contact_id);
		$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
		$this->layout->view('contact/updateproject',$this->data);
	}

	public function updatedetails(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('details', 'Details', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->flash_message->set('message','alert alert-danger','Error occured on updating project details.');
			redirect('contact');
		}else{
			$project_contact_id = $this->input->post('project_contact_id');
			$this->Project_detail_model->insert(array(
				'created_by' => $this->_user_id,
				'project_contact_id' => $project_contact_id,
				'details' => trim($this->input->post('details'))
				));
			redirect('contact/updateproject/'.$project_contact_id);
		}
	}
// ========================================================
}

/* End of file contact.php */
/* Location: ./application/modules/contact/controllers/contact.php */