<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('Contactphone_model');
		$this->load->model('Contactemail_model');
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
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');		
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contacts'] = $this->Contact_model->search($this->data['filter'],$this->_user_id);
		$this->layout->view('contact/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

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
			redirect('contact/phones/'.$contact_id);
		}
	}

	public function edit($contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', 'Contact Id', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('title', 'Title / Position', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['contact'] = $this->Contact_model->details($contact_id);
			$this->layout->view('contact/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');

			$data['company_id'] = $this->input->post('company_id');
			$data['first_name'] = strtoupper(trim($this->input->post('first_name')));
			$data['middle_name'] = strtoupper(trim($this->input->post('middle_name')));
			$data['last_name'] = strtoupper(trim($this->input->post('last_name')));
			$data['title'] = strtoupper(trim($this->input->post('title')));

			$this->Contact_model->update($_id,$data);
			$this->flash_message->set('message','alert alert-success','Successfully updated a contact!');
			redirect('contact');
		}
	}

	public function delete($contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['contact'] = $this->Contact_model->details($contact_id);
			$this->layout->view('contact/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$contact = $this->Contact_model->get($_id);
			if($this->Contact_model->related_to('project_contacts','contact_id',$_id)){
				$this->flash_message->set('message','alert alert-danger','Cannot delete this contact it is related to a project!');
				redirect('contact/delete/'.$_id);
			}else{
				$this->Contact_model->delete($_id);

				$this->Contactphone_model->delete_by('contact_id',$_id);
				$this->Contactemail_model->delete_by('contact_id',$_id);
				
				$this->flash_message->set('message','alert alert-success','Successfully deleted a contact!');
				redirect('contact');
			}			
		}
	}

	public function createcompany(){
		if (!$this->flexi_auth->is_privileged('COMPANY MAINTENANCE')){
			redirect('contact/access_denied');
		}
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

	public function phones($contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contact'] = $this->Contact_model->details($contact_id);
		$this->data['phones'] = $this->Contactphone_model->get_by_contact($contact_id);
		$this->layout->view('contact/phones',$this->data);
	}

	public function addphone($contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('contact_id', 'Contact Id', 'trim|required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|numeric');
		$this->form_validation->set_rules('remarks', 'Remarks', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['contact'] = $this->Contact_model->details($contact_id);
			$this->layout->view('contact/addphones',$this->data);
		}else{
			$phone_number = $this->input->post('phone_number');
			$contact_id = $this->input->post('contact_id');
			$this->Contactphone_model->insert( array(
				'created_by' => $this->_user_id,
				'contact_id' => $contact_id ,
				'phone_number' => $phone_number,
				'remarks' => $this->input->post('remarks'),
				));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$phone_number.' phone number!');
			redirect('contact/phones/'.$contact_id);
		}
	}

	public function editphone($phone_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contactphone_model->is_my_contact_phone($phone_id,$this->_user_id) || (is_null($phone_id))){
			$this->not_found();
			return;
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('phone_id', 'Phone Id', 'trim|required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|numeric');
		$this->form_validation->set_rules('remarks', 'Middle Name', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$phone = $this->Contactphone_model->get($phone_id);
			$this->data['phone'] = $phone;
			$this->data['contact'] = $this->Contact_model->details($phone['contact_id']);
			$this->layout->view('contact/editphone',$this->data);
		}else{
			$phone_id = $this->input->post('phone_id');
			$phone = $this->Contactphone_model->get($phone_id);
			$contact = $this->Contact_model->details($phone['contact_id']);
			$phone_number = $this->input->post('phone_number');
			$this->Contactphone_model->update($phone_id, array(
				'phone_number' => $phone_number,
				'remarks' => $this->input->post('remarks'),
				));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$phone_number.' phone number!');
			redirect('contact/phones/'.$contact['id']);
		}
	}

	public function deletephone($phone_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contactphone_model->is_my_contact_phone($phone_id,$this->_user_id) || (is_null($phone_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$phone = $this->Contactphone_model->get($phone_id);
			$this->data['phone'] = $phone;
			$this->data['contact'] = $this->Contact_model->details($phone['contact_id']);
			$this->layout->view('contact/deletephone',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$phone = $this->Contactphone_model->get($phone_id);
			$contact = $this->Contact_model->details($phone['contact_id']);
			$this->Contactphone_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$phone['phone_number'].' phone number!');
			redirect('contact/phones/'.$contact['id']);	
		}
	}
// ========================================================
	public function email_check($str){
		if($this->Contactemail_model->validate_email($str,$this->_user_id)){
			$this->form_validation->set_message('email_check', 'This %s already exist!');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function emails($contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contact'] = $this->Contact_model->details($contact_id);
		$this->data['emails'] = $this->Contactemail_model->get_by_contact($contact_id);
		$this->layout->view('contact/emails',$this->data);
	}

	public function addemail($contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('contact_id', 'Contact Id', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_email_check');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['contact'] = $this->Contact_model->details($contact_id);
			$this->layout->view('contact/addemail',$this->data);
		}else{
			$email = $this->input->post('email');
			$contact_id = $this->input->post('contact_id');
			$this->Contactemail_model->insert( array(
				'created_by' => $this->_user_id,
				'contact_id' => $contact_id ,
				'email_address' => $email,
				));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$email.' contact email!');
			redirect('contact/emails/'.$contact_id);
		}
	}

	public function editemail($email_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contactemail_model->is_my_contact_email($email_id,$this->_user_id) || (is_null($email_id))){
			$this->not_found();
			return;
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email_id', 'Email Id', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_email_check');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$email = $this->Contactemail_model->get($email_id);
			$this->data['email'] = $email;
			$this->data['contact'] = $this->Contact_model->details($email['contact_id']);
			$this->layout->view('contact/editemail',$this->data);
		}else{
			$email_id = $this->input->post('email_id');
			$email = $this->Contactemail_model->get($email_id);
			$contact = $this->Contact_model->details($email['contact_id']);
			$email_address = $this->input->post('email');
			$this->Contactemail_model->update($email_id, array(
				'email_address' => $email_address
				));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$email_address.' contact email!');
			redirect('contact/emails/'.$contact['id']);
		}
	}

	public function deleteemail($email_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contactemail_model->is_my_contact_email($email_id,$this->_user_id) || (is_null($email_id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$email = $this->Contactemail_model->get($email_id);
			$this->data['email'] = $email;
			$this->data['contact'] = $this->Contact_model->details($email['contact_id']);
			$this->layout->view('contact/deleteemail',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$email = $this->Contactemail_model->get($email_id);
			$contact = $this->Contact_model->details($email['contact_id']);
			$this->Contactemail_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$email['email_address'].' contact email!');
			redirect('contact/emails/'.$contact['id']);	
		}
	}
// ========================================================

	public function project($contact_id = null) {
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contact'] = $this->Contact_model->details($contact_id);
		$this->data['projects'] = $this->Project_contact_model->projects($this->data['filter'],$contact_id);
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