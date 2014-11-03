<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model');
		$this->load->model('Contactphone_model');
		$this->load->model('Contactemail_model');
		$this->load->model('Paintspecification_model');
		$this->load->model('Paintspecification_log');
		$this->load->model('Projectfile_model');
		$this->load->model('Requests_model');
		$this->load->model('grouptype/Grouptype_model');
		$this->load->model('company/Company_model');
		$this->load->model('city/City_model');
		$this->load->model('project/Project_contact_model');
		$this->load->model('project/Project_model');
		$this->load->model('project/Project_detail_model');
		$this->load->model('prjclassification/Prjclassification_model');
		$this->load->model('prjcategory/Prjcategory_model');
		$this->load->model('prjcategory/Prjsubcategory_model');
		$this->load->model('prjstage/Prjstage_model');
		$this->load->model('prjstatus/Prjstatus_model');
		$this->load->model('painttype/Painttype_model');
		$this->load->model('notifications/Notification_model');
		$this->load->model('requesttype/Requesttype_model');
		$this->load->model('companytype/Companytype_model');
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
					$row_array['text'] = strtoupper($contact['last_name'].', '.$contact['first_name'].' '.$contact['middle_name']);
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

// ========================================================

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
			$this->data['companytypes'] = $this->Companytype_model->order_by('companytype')->get_all();
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->layout->view('contact/createcompany',$this->data);
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

	public function getfile($hash = null){
		$file = $this->Projectfile_model->downloadfile($hash);
		if($file){
			$this->load->helper('download');
			$filename = $file['filename'];
			$data = file_get_contents('uploads/files/'.$hash); // Read the file's contents
			force_download($filename, $data);
		}else{
			$this->_pageNotFound();
			return;
		}
		
	}

	private function upload_files($remark_id,$group_id){
		if($_FILES['files']['name'][0] != ''){

			$this->load->library('upload');
			$this->upload->initialize(array(
				"upload_path"   => "./uploads/files/",
				"allowed_types" => "pdf|gif|jpg|png|txt|xls|xlsx|doc|docx|jpeg|bmp|csv",
				"encrypt_name" => true,
				"max_size" => 0
			));
			if($this->upload->do_multi_upload("files")){
				//Code to run upon successful upload.
				$files = $this->upload->get_multi_upload_data();
				// debug($files);
				if(!empty($files)){
					$data = array();
					foreach ($files as $file) {
						$_file = array(
							'group_id' => $group_id,
							'remark_id' => $remark_id,
							'hashname' => $file['file_name'],
							'filename' => $file['client_name']);
						$data[] = $_file;
					}
					$this->Projectfile_model->insert_many($data);
				}
				return TRUE;
			}else{
				$this->flash_message->set('message','alert alert-danger',$this->upload->display_errors());
				return FALSE;
			}
		}
		return TRUE;
	}

	public function project($contact_id = null) {
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Contact_model->is_my_contact($contact_id,$this->_user_id) || (is_null($contact_id))){
			$this->not_found();
			return;
		}

		$this->session->set_userdata('back_link','contact/project/'.$contact_id);


		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['contact'] = $this->Contact_model->details($contact_id);
		$this->data['projects'] = $this->Project_contact_model->projects($this->data['filter'],$contact_id);
		$this->layout->view('contact/project',$this->data);
	}

	public function updateproject($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('details', 'Details', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		$group_id = 1;

		if ($this->form_validation->run() == FALSE){
			$project_contact = $this->Project_contact_model->get($project_contact_id);
			$this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);

			$this->data['details'] = $this->Project_detail_model->get_details($project_contact_id,$group_id);

			$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
			$this->layout->view('contact/updateproject',$this->data);
		}else{
			// debug($_FILES);
			
			$project_contact_id = $this->input->post('project_contact_id');
			$details = trim($this->input->post('details'));
			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $project_contact_id,
				'details' => $details
				));

			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $project_contact_id,
				'group_id' => $group_id,
				'remarks' => substr($details, 0, 100),
				'created_by' => $this->_user_id));

			if($this->upload_files($remark_id,$group_id)){
				$this->flash_message->set('message','alert alert-success','Details successfully updated!');
			}

			redirect('contact/updateproject/'.$project_contact_id);
		}
	}

	public function updateclassification($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('prlclass_id', 'Project Classifications', 'trim|required|is_natural_no_zero');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$group_id = 2;
		if ($this->form_validation->run() == FALSE){
			$project_contact = $this->Project_contact_model->get($project_contact_id);
			$this->data['contact'] = $this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['classifications'] = $this->Prjclassification_model->order_by('prjclassification_desc')->get_all();

			$this->data['details'] = $this->Project_detail_model->get_details($project_contact_id,$group_id);

			$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
			$this->layout->view('contact/updateclassification',$this->data);
		}else{


			$project_contact_id = $this->input->post('project_contact_id');
			$classification = $this->Prjclassification_model->get($this->input->post('prlclass_id'));
			$details = "Project classification is updated to ".$classification['prjclassification_desc'].".";
			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $project_contact_id,
				'details' => $details
				));

			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $project_contact_id,
				'group_id' => $group_id,
				'remarks' => "Changed project classifications",
				'created_by' => $this->_user_id));
			
			if($this->upload_files($remark_id,$group_id)){
				$this->flash_message->set('message','alert alert-success','Details successfully updated!');
			}

			redirect('contact/updateclassification/'.$project_contact_id);
		}
	}
	public function updatecategory($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('prjcat_id', 'Category Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$group_id = 3;
		if ($this->form_validation->run() == FALSE){
			$project_contact = $this->Project_contact_model->get($project_contact_id);
			$this->data['contact'] = $this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
			$this->data['categories'] = $this->Prjcategory_model->order_by('prjcategory_desc')->get_all();

			$this->data['details'] = $this->Project_detail_model->get_details($project_contact_id,$group_id);

			$this->layout->view('contact/updatecategory',$this->data);
		}else{
			
			$project_contact_id = $this->input->post('project_contact_id');

			$category = $this->Prjcategory_model->get($this->input->post('prjcat_id'));
			$subcategory = $this->Prjsubcategory_model->get($this->input->post('prjsubcat_id'));
			$details = "Project category is updated to ".$category['prjcategory_desc']." - ".$subcategory['prjsubcategory_desc'].".";
			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $project_contact_id,
				'details' => $details
				));

			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $project_contact_id,
				'group_id' => $group_id,
				'remarks' => "Changed project category",
				'created_by' => $this->_user_id));

			if($this->upload_files($remark_id,$group_id)){
				$this->flash_message->set('message','alert alert-success','Details successfully updated!');
			}

			redirect('contact/updatecategory/'.$project_contact_id);
		}
	}

	public function updatestage($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('prjstage_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('remarks', 'Details', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$group_id = 4;
		if ($this->form_validation->run() == FALSE){
			$project_contact = $this->Project_contact_model->get($project_contact_id);
			$this->data['contact'] = $this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
			$this->data['stages'] = $this->Prjstage_model->order_by('prjstage_desc')->get_all();

			$this->data['details'] = $this->Project_detail_model->get_details($project_contact_id,$group_id);

			$this->layout->view('contact/updatestage',$this->data);
		}else{

			$project_contact_id = $this->input->post('project_contact_id');
			$stages = $this->Prjstage_model->get($this->input->post('prjstage_id'));
			$details = "Project stage is updated to ".$stages['prjstage_desc']."<br><em>".trim($this->input->post('remarks'))."</em>";
			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $project_contact_id,
				'details' => $details
				));


			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $project_contact_id,
				'group_id' => $group_id,
				'remarks' => "Changed project stage",
				'created_by' => $this->_user_id));

			if($this->upload_files($remark_id,$group_id)){
				$this->flash_message->set('message','alert alert-success','Details successfully updated!');
			}

			redirect('contact/updatestage/'.$project_contact_id);
		}
	}
	public function updatestatus($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('prjstatus_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('remarks', 'Details', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$group_id = 5;
		if ($this->form_validation->run() == FALSE){
			$project_contact = $this->Project_contact_model->get($project_contact_id);
			$this->data['contact'] = $this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
			$this->data['status'] = $this->Prjstatus_model->order_by('prjstatus_desc')->get_all();

			$this->data['details'] = $this->Project_detail_model->get_details($project_contact_id,$group_id);

			$this->layout->view('contact/updatestatus',$this->data);
		}else{

			$project_contact_id = $this->input->post('project_contact_id');
			$status = $this->Prjstatus_model->get($this->input->post('prjstatus_id'));
			$details = "Project status is updated to ".$status['prjstatus_desc']."<br><em>".trim($this->input->post('remarks'))."</em>";
			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $project_contact_id,
				'details' => $details
				));


			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $project_contact_id,
				'group_id' => $group_id,
				'remarks' => "Changed project status",
				'created_by' => $this->_user_id));

			if($this->upload_files($remark_id,$group_id)){
				$this->flash_message->set('message','alert alert-success','Details successfully updated!');
			}
			redirect('contact/updatestatus/'.$project_contact_id);
		}
	}
// ========================================================
	public function updatespecification($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$project_contact = $this->Project_contact_model->get($project_contact_id);
		$this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
		$this->data['specs'] = $this->Paintspecification_model->specifications($project_contact_id);

		// $this->data['logs'] = $this->Paintspecification_log->logs($project_contact_id);
		$this->data['logs'] = $this->Project_detail_model->get_details($project_contact_id,6);

		$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
		$this->layout->view('contact/updatespecification',$this->data);
	}

	public function addspecification($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('type', 'Paint Type', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('area', 'Area', 'trim|required');
		$this->form_validation->set_rules('paint', 'Paint', 'trim|required');
		$this->form_validation->set_rules('cost', 'Cost', 'trim|required');
		$this->form_validation->set_rules('details', 'Details', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$group_id = 6;
		if ($this->form_validation->run() == FALSE){
			$this->data['types'] = $this->Painttype_model->order_by('painttype')->get_all();
			$this->data['project_contact_id'] = $project_contact_id;
			$this->layout->view('contact/addspecification',$this->data);
		}else{
			$project_contact_id = $this->input->post('project_contact_id');
			$details = trim($this->input->post('details'));
			$this->Paintspecification_model->insert(array(
				'project_contact_id' => $project_contact_id,
				'created_by' => $this->_user_id,
				'painttype_id' => $this->input->post('type'),
				'area' => str_replace(",","", $this->input->post('area')),
				'paint' => str_replace(",","", $this->input->post('paint')),
				'cost' => str_replace(",","", $this->input->post('cost')),
				'details' => $details
				));
			$type = $this->Painttype_model->get($this->input->post('type'));

			$details = trim($this->input->post('details'));
			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $project_contact_id,
				'details' => $this->Paintspecification_log->generate_logs($type['painttype'],$details,$this->input->post('area'),$this->input->post('paint'),$this->input->post('cost')),
				'remarks' => "Paint specification added.",
				));

			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $project_contact_id,
				'group_id' => $group_id,
				'remarks' => "Add paint specification",
				'created_by' => $this->_user_id));

			$this->flash_message->set('message','alert alert-success','Painting specification successfully updated!');
			redirect('contact/updatespecification/'.$project_contact_id);
		}
	}

	public function deletespec($specs_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Paintspecification_model->is_my_project_specs($specs_id,$this->_user_id) || (is_null($specs_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Paintspecification_model->allowed_to_update($specs_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$group_id = 6;
		if ($this->form_validation->run() == FALSE){
			$this->data['types'] = $this->Painttype_model->order_by('painttype')->get_all();
			$this->data['specs'] = $this->Paintspecification_model->get_details($specs_id);
			$this->layout->view('contact/deletespec',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$specs = $this->Paintspecification_model->get_details($_id);

			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $specs['project_contact_id'],
				'details' => $this->Paintspecification_log->generate_logs($specs['painttype'],$specs['details'],
					number_format($specs['area'],2),number_format($specs['paint'],2),number_format($specs['cost'],2)),
				'remarks' => "Paint specification deleted.",
				));

			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $specs['project_contact_id'],
				'group_id' => $group_id,
				'remarks' => "Delete paint specification",
				'created_by' => $this->_user_id));
			
			$this->Paintspecification_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted a specification!');
			redirect('contact/updatespecification/'.$specs['project_contact_id']);
		}
	}

	public function editspec($specs_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Paintspecification_model->is_my_project_specs($specs_id,$this->_user_id) || (is_null($specs_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Paintspecification_model->allowed_to_update($specs_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');
		$this->form_validation->set_rules('type', 'Paint Type', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('area', 'Area', 'trim|required');
		$this->form_validation->set_rules('paint', 'Paint', 'trim|required');
		$this->form_validation->set_rules('cost', 'Cost', 'trim|required');
		$this->form_validation->set_rules('details', 'Details', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$group_id = 6;
		if ($this->form_validation->run() == FALSE){
			$this->data['types'] = $this->Painttype_model->order_by('painttype')->get_all();
			$this->data['specs'] = $this->Paintspecification_model->get_details($specs_id);
			$this->layout->view('contact/editspec',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$specs = $this->Paintspecification_model->get_details($_id);
			$details = trim($this->input->post('details'));
			$this->Paintspecification_model->update($_id,array(
				'painttype_id' => $this->input->post('type'),
				'area' => str_replace(",","", $this->input->post('area')),
				'paint' => str_replace(",","", $this->input->post('paint')),
				'cost' => str_replace(",","", $this->input->post('cost')),
				'details' => $details,
				));
			$type = $this->Painttype_model->get($this->input->post('type'));

			$old = $this->Paintspecification_log->generate_logs($type['painttype'],$details,
					number_format($specs['area'],2),number_format($specs['paint'],2),number_format($specs['cost'],2));
			$new = $this->Paintspecification_log->generate_logs($type['painttype'],$details,$this->input->post('area'),$this->input->post('paint'),$this->input->post('cost'));

			$remark_id = $this->Project_detail_model->insert(array(
				'group_id' => $group_id,
				'created_by' => $this->_user_id,
				'project_contact_id' => $specs['project_contact_id'],
				'details' => $new. 'from' .$old,
				'remarks' => "Paint updated to",
				));


			// add notification
			$this->Notification_model->insert(array(
				'type' => 1,
				'project_contact_id' => $specs['project_contact_id'],
				'group_id' => $group_id,
				'remarks' => "Edit paint specification",
				'created_by' => $this->_user_id));

			$this->flash_message->set('message','alert alert-success','Painting specification successfully updated!');
			redirect('contact/updatespecification/'.$specs['project_contact_id']);
		}
	}

	public function request($project_contact_id = null){
		$project_contact = $this->Project_contact_model->get($project_contact_id);
		$this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);

		$this->data['requests'] = $this->Requests_model->get_contact_request($project_contact_id);
		$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
		$this->layout->view('contact/request',$this->data);
	}

	public function addrequest($project_contact_id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->is_my_project_contact($project_contact_id,$this->_user_id) || (is_null($project_contact_id))){
			redirect('contact/access_denied');
		}

		if(!$this->Project_contact_model->allowed_to_update($project_contact_id,$this->_user_id)){
			redirect('contact/access_denied');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_contact_id', 'Project Contact Id', 'trim|required');
		$this->form_validation->set_rules('requesttype_id', 'Request Type', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('date_needed', 'Date Needed', 'trim|required');
		$this->form_validation->set_rules('particular', 'Particular', 'trim|required');
		$this->form_validation->set_rules('remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount   ', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$project_contact = $this->Project_contact_model->get($project_contact_id);
			$this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['project'] = $this->Project_contact_model->details($project_contact_id);
			$this->data['requesttypes'] = $this->Requesttype_model->order_by('requesttype')->get_all();
			$this->layout->view('contact/addrequest',$this->data);
		}else{
			$project_contact_id = $this->input->post('project_contact_id');
			$this->Requests_model->insert(array(
				'project_contact_id' => $project_contact_id,
				'requesttype_id' => $this->input->post('requesttype_id'),
				'date_needed' => date('Y-m-d',strtotime($this->input->post('date_needed'))),
				'particular' => $this->input->post('particular'),
				'remarks' => $this->input->post('remarks'),
				'amount' => str_replace(",", "", $this->input->post('amount')),
				'created_by' => $this->_user_id
				));
			$this->flash_message->set('message','alert alert-success','Request successfully created!');
			redirect('contact/request/'.$project_contact_id);
		}
	}

	public function editrequest($id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}
		$this->_request_access($id);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', 'Request Id', 'trim|required');
		$this->form_validation->set_rules('requesttype_id', 'Request Type', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('date_needed', 'Date Needed', 'trim|required');
		$this->form_validation->set_rules('particular', 'Particular', 'trim|required');
		$this->form_validation->set_rules('remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount   ', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$request = $this->Requests_model->get($id);
			$this->data['request'] = $request;
			$project_contact = $this->Project_contact_model->get($request['project_contact_id']);
			$this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['project'] = $this->Project_contact_model->details($request['project_contact_id']);
			$this->data['requesttypes'] = $this->Requesttype_model->order_by('requesttype')->get_all();
			$this->layout->view('contact/editrequest',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$request = $this->Requests_model->get($_id);
			$this->Requests_model->update($_id, array(
				'requesttype_id' => $this->input->post('requesttype_id'),
				'date_needed' => date('Y-m-d',strtotime($this->input->post('date_needed'))),
				'particular' => $this->input->post('particular'),
				'remarks' => $this->input->post('remarks'),
				'amount' => str_replace(",", "", $this->input->post('amount'))
				));
			$this->flash_message->set('message','alert alert-success','Request successfully updated!');
			redirect('contact/request/'.$request['project_contact_id']);
		}
	}

	public function deleterequest($id = null){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}
		$this->_request_access($id);
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', 'Request Id', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$request = $this->Requests_model->get_details($id);
			$this->data['request'] = $request;
			$project_contact = $this->Project_contact_model->get($request['project_contact_id']);
			$this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['project'] = $this->Project_contact_model->details($request['project_contact_id']);
			$this->layout->view('contact/deleterequest',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$request = $this->Requests_model->get_details($id);
			$this->Requests_model->delete($_id);

			$this->flash_message->set('message','alert alert-success','Request successfully deleted!');
			redirect('contact/request/'.$request['project_contact_id']);		

		}
	}

	private function _request_access($id){
		if (!$this->flexi_auth->is_privileged('CONTACT MAINTENANCE')){
			redirect('contact/access_denied');
		}

		if(!$this->Requests_model->for_edit($id)){
			redirect('contact/access_denied');
		}
	}
}

/* End of file contact.php */
/* Location: ./application/modules/contact/controllers/contact.php */