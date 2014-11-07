<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('Project_contact_model');
		$this->load->model('city/City_model');
		$this->load->model('user/User_model');
		$this->load->model('grouptype/Grouptype_model');
		$this->load->model('Project_detail_model');
		$this->load->model('contact/Paintspecification_model');
		$this->load->model('contact/Paintspecification_log');
		$this->load->model('notifications/Notification_model');
		$this->load->model('contact/Projectfile_model');
	}

	public function index(){	
		if (!$this->flexi_auth->is_privileged('PUBLIC PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}
		if($this->input->is_ajax_request()){
			echo $this->Project_model->ajax_public_projects();
		}else{
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['projects'] = $this->Project_model->public_projects($this->data['filter']);
			$this->layout->view('project/index',$this->data);
		}
		
	}

	public function duplicate_project($str){
		$lot = strtoupper(trim($this->input->post('lot')));
		$street = strtoupper(trim($this->input->post('street')));
		$brgy = strtoupper(trim($this->input->post('brgy')));
		$city_id = $this->input->post('city_id');
		if($this->Project_model->duplicate_project($this->_user_id,$str,$lot,$street,$brgy,$city_id)){
			$this->form_validation->set_message('duplicate_project', 'Project name and details already exist!');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('CREATED PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_name' , 'Project Name', 'trim|required|callback_duplicate_project');
		$this->form_validation->set_rules('lot', 'Lot', 'trim');
		$this->form_validation->set_rules('street', 'Street', 'trim');
		$this->form_validation->set_rules('brgy', 'Bgry', 'trim|required');
		$this->form_validation->set_rules('city_id', 'City', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('contact_id', 'Contact Id', 'trim|is_natural_no_zero|required');
		$this->form_validation->set_rules('type_id', 'Contact Type Id', 'trim|is_natural_no_zero|required');
		
		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_natural_no_zero', 'This field is required.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->data['types'] = $this->Grouptype_model->order_by('grouptype_desc')->get_all();
			$this->layout->view('project/create',$this->data);
		}else{
			$this->db->trans_start();
				$project_id = $this->Project_model->insert(array(
					'project_name' => strtoupper(trim($this->input->post('project_name'))),
					'lot' => strtoupper(trim($this->input->post('lot'))),
					'street' => strtoupper(trim($this->input->post('street'))),
					'brgy' => strtoupper(trim($this->input->post('brgy'))),
					'city_id' => $this->input->post('city_id'),
					'created_by' => $this->_user_id,
					));
				
				$this->Project_contact_model->insert(array(
					'project_id' => $project_id,
					'contact_id' => $this->input->post('contact_id'),
					'type_id' => $this->input->post('type_id'),
					'created_by' =>  $this->_user_id,
					'approved' => 2,
					'approved_by' =>  $this->_user_id
					));
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE){
				$this->flash_message->set('message','alert alert-error','An error occured!');
				redirect('project/create');
			} 
			$this->flash_message->set('message','alert alert-success','Project successfully created!');
			redirect('project/created');
		}
	}

	public function created($id = null,$group_id = null){	
		if (!$this->flexi_auth->is_privileged('CREATED PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}

		if(is_null($id)){
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['status'] = trim($this->input->get('s'));
			$this->data['projects'] = $this->Project_model->created_projects($this->data['filter'],$this->data['status'],$this->_user_id);
			$this->layout->view('project/created',$this->data);
		}else{
			if(!$this->Project_model->my_created_project($id,$this->_user_id)){
				redirect('project/access_denied');		
			}

			if(!is_null($group_id)){
				if(!$this->Grouptype_model->id_exist($group_id)){
					redirect('project/access_denied');		
				}
			}else{
				$group = $this->Grouptype_model->get_top_id();
				$group_id = $group['id'];
			}

			$this->session->set_userdata('back_link','project/created/'.$id.'/'.$group_id);

			$this->data['group_id'] = $group_id;
			$this->data['types'] = $this->Grouptype_model->order_by('grouptype_desc')->get_all();
			$this->data['project'] = $this->Project_model->details($id);
			$this->data['contacts'] = $this->Project_contact_model->project_contacts($id,$group_id,$this->_user_id);
			$this->layout->view('project/createddetails',$this->data);
		}
	}

	public function addcontact($project_id = null, $group_id = null){
		if (!$this->flexi_auth->is_privileged('CREATED PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}

		if(!$this->Project_model->allowed_to_update($project_id,$this->_user_id)){
			redirect('project/access_denied');		
		}


		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_id', 'Project Id', 'trim|required');
		$this->form_validation->set_rules('contact_id', 'contact_id', 'trim|required|callback_contact_check['.$this->input->post('project_id').','.$this->input->post('group_id').']');
		$this->form_validation->set_rules('group_id', 'group_id', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->data['project'] = $this->Project_model->details($project_id);
			$this->data['group'] = $this->Grouptype_model->get($group_id);
			$this->layout->view('project/addcontact',$this->data);
		}else{
			$p_id = $this->input->post('project_id');
			$c_id = $this->input->post('contact_id');
			$g_id = $this->input->post('group_id');
			$this->Project_contact_model->insert(array(
				'project_id' => $p_id,
				'contact_id' => $c_id,
				'type_id' => $g_id,
				'created_by' => $this->_user_id,
				'approved' => 1,
				'approved_by' => $this->_user_id
				));
			$this->flash_message->set('message','alert alert-success','Contact is successfully created!');
			redirect('project/created/'.$p_id.'/'.$g_id );		
		}
	}

	public function contact_check($contact_id,$other_data){
		$data = explode(',', $other_data);
		if($this->Project_contact_model->project_contact_exist_in_group($contact_id,$data[0],$data[1])){
			$this->form_validation->set_message('contact_check', 'Contact already exist in group!');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function contacts($project_id=null,$group_id=null){
		if (!$this->flexi_auth->is_privileged('CREATED PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}
		if($this->input->is_ajax_request()){
			echo $this->Project_contact_model->ajax_project_contacts($project_id,$group_id);
		}else{
			$data = array('status' => 'error');
			echo json_encode($data);
		}
	}
// ======================================================================

	public function forassigning($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT ASSIGNING MAINTENANCE')){
			redirect('project/access_denied');		
		}

		if(is_null($id)){
			if($this->input->is_ajax_request()){
				echo $this->Project_model->ajax_forassigning();
			}else{
				$this->data['filter'] = $this->input->post('q');
				$this->data['projects'] = $this->Project_model->forassigning($this->data['filter']);
				$this->layout->view('project/forassigning',$this->data);
			}
			
		}else{
			if(!$this->Project_model->is_forassigning($id)){
				redirect('project/access_denied');	
			}
			$this->load->library('form_validation');

			$this->form_validation->set_rules('project_id', 'Project ID', 'required|is_natural_no_zero');
			$this->form_validation->set_rules('assigned_to', 'Assigned To', 'required|is_natural_no_zero');

			$this->form_validation->set_message('required', 'This field is required.');
			$this->form_validation->set_message('is_unique', 'Value already exist.');
			$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

			if ($this->form_validation->run() == FALSE){
				$this->data['users'] = $this->User_model->get_all_active();
				$this->data['project'] = $this->Project_model->details($id);

				$this->data['details'] = $this->Project_detail_model->get_all_details($id,1);
				$this->data['classifications'] = $this->Project_detail_model->get_all_details($id,2);
				$this->data['categories'] = $this->Project_detail_model->get_all_details($id,3);
				$this->data['stages'] = $this->Project_detail_model->get_all_details($id,4);
				$this->data['status'] = $this->Project_detail_model->get_all_details($id,5);

				$this->data['specs'] = $this->Paintspecification_model->get_all_specs($id);
				$this->data['logs'] = $this->Project_detail_model->get_all_details($id,6);

				$this->layout->view('project/details',$this->data);
			}else{
				$project_id = $this->input->post('project_id');
				$assigned_to = $this->input->post('assigned_to');
				$this->Project_model->update($project_id,array('assigned_to' => $assigned_to, 'status_id' => 2, 'assigned_by' => $this->_user_id));
				$this->flash_message->set('message','alert alert-success','Project successfully assigned!');
				redirect('project/forassigning');
			}
		}
	}
// ======================================================================
	public function join($id = null){
		if(!$this->Project_model->is_public($id)){
			redirect('project/access_denied');	
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_id', 'Project ID', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('type_id', 'Group ID', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('contact_id', 'contact_id', 'trim|required|is_natural_no_zero|callback_contact_check['.$this->input->post('project_id').','.$this->input->post('type_id').']');
		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['cities'] = $this->City_model->get_all_cities();
			$this->data['types'] = $this->Grouptype_model->order_by('grouptype_desc')->get_all();
			$this->data['project'] = $this->Project_model->details($id);
			$this->layout->view('project/join_project',$this->data);
		}else{
			$this->Project_contact_model->insert(array(
					'project_id' => $this->input->post('project_id'),
					'contact_id' => $this->input->post('contact_id'),
					'type_id' => $this->input->post('type_id'),
					'created_by' =>  $this->_user_id
					));

			$this->flash_message->set('message','alert alert-success','Contact successfully added!');
			redirect('project');
		}

		
	}

// ======================================================================
	public function assigned(){
		if (!$this->flexi_auth->is_privileged('ASSIGNED PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}

		$this->session->set_userdata('back_link','project/assigned');
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['projects'] = $this->Project_model->assigned($this->data['filter'],$this->_user_id);
		$this->layout->view('project/assigned',$this->data);
	}

	private function project_validate($id){
		if (!$this->flexi_auth->is_privileged('ASSIGNED PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}
		if(!$this->Project_model->is_assigned($id,$this->_user_id)){
			redirect('project/access_denied');	
		}
		$project= $this->Project_model->details($id);
		if($project['assigned_viewed'] == 0){
			$this->Project_model->update($id,array('assigned_viewed' => 1));
		}

		$this->data['project'] = $project;
		$this->data['contact_count'] = $this->Project_contact_model->for_approval_project_contact_count($id);
		$this->data['details_count'] = $this->Notification_model->get_count($id,1,1);
		$this->data['class_count'] = $this->Notification_model->get_count($id,2,1);
		$this->data['cat_count'] = $this->Notification_model->get_count($id,3,1);
		$this->data['stage_count'] = $this->Notification_model->get_count($id,4,1);
		$this->data['status_count'] = $this->Notification_model->get_count($id,5,1);
		$this->data['specifications'] = $this->Notification_model->get_count($id,6,1);
	}


	public function contactlist($id = null){
		$this->project_validate($id);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', 'Project ID', 'required|is_natural_no_zero');
		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){

			$this->data['contacts'] = $this->Project_contact_model->for_approval_project_contacts($id);
			$this->data['contact_lists'] = $this->Project_contact_model->project_contact_list($id);
			$this->layout->view('project/contactlist',$this->data);
		}else{
			// debug($_POST);
			$project_id = $this->input->post('project_id');
			$project_contact_id = $this->input->post('_id');
			$approve = 3;
			if($this->input->post('submit') == 'Approve'){
				$approve = 2;
			}

			if($approve == 2){
				// add notification
				$this->Notification_model->insert(array(
					'type' => 2,
					'project_contact_id' => $project_contact_id,
					'group_id' => 6,
					'remarks' => "alert alert-success alert-dismissable",
					'created_by' => $this->_user_id));
			}else{
				// add notification
				$this->Notification_model->insert(array(
					'type' => 2,
					'project_contact_id' => $project_contact_id,
					'group_id' => 6,
					'remarks' => "alert alert-danger alert-dismissable",
					'created_by' => $this->_user_id));
			}

			
			$this->Project_contact_model->update($project_contact_id ,array('approved' => $approve, 'approved_by' => $this->_user_id));
			$this->flash_message->set('message','alert alert-success','Contact successfully updated!');
			redirect('project/contactlist/'.$project_id);
		}

		
	}
	
	public function details($id = null){
		$this->project_validate($id);
		$group_id = 1;
		$this->Notification_model->delete_notifications($id,$this->_user_id,$group_id);
		$this->data['details'] = $this->Project_detail_model->get_all_details($id,$group_id);
		$this->data['users'] = $this->Project_detail_model->get_all_details_user($id,$group_id);
		$this->layout->view('project/assigned_details',$this->data);
	}

	public function classifications($id = null){
		$this->project_validate($id);
		$group_id = 2;
		$this->Notification_model->delete_notifications($id,$this->_user_id,$group_id);
		$this->data['details'] = $this->Project_detail_model->get_all_details($id,$group_id);
		$this->data['users'] = $this->Project_detail_model->get_all_details_user($id,$group_id);
		$this->layout->view('project/classifications',$this->data);
	}

	public function categories($id = null){
		$this->project_validate($id);
		$group_id = 3;
		$this->Notification_model->delete_notifications($id,$this->_user_id,$group_id);
		$this->data['details'] = $this->Project_detail_model->get_all_details($id,$group_id);
		$this->data['users'] = $this->Project_detail_model->get_all_details_user($id,$group_id);
		$this->layout->view('project/categories',$this->data);
	}

	public function stages($id = null){
		$this->project_validate($id);
		$group_id = 4;
		$this->Notification_model->delete_notifications($id,$this->_user_id,$group_id);
		$this->data['details'] = $this->Project_detail_model->get_all_details($id,$group_id);
		$this->data['users'] = $this->Project_detail_model->get_all_details_user($id,$group_id);
		$this->layout->view('project/stages',$this->data);
	}

	public function statuses($id = null){
		$this->project_validate($id);
		$group_id = 5;
		$this->Notification_model->delete_notifications($id,$this->_user_id,$group_id);
		$this->data['details'] = $this->Project_detail_model->get_all_details($id,$group_id);
		$this->data['users'] = $this->Project_detail_model->get_all_details_user($id,$group_id);
		$this->layout->view('project/statuses',$this->data);
	}

	public function specifications($id = null){
		$this->project_validate($id);
		$group_id = 6;
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['specs'] = $this->Paintspecification_model->get_all_specs($id);
		$this->data['users'] = $this->Paintspecification_model->get_all_unique_contact($id);
		$this->data['logs'] = $this->Project_detail_model->get_all_details($id,$group_id);
		$this->data['users2'] = $this->Project_detail_model->get_all_details_user($id,$group_id);
		$this->layout->view('project/specifications',$this->data);
	}

	public function deletenotifications(){
		if($this->input->is_ajax_request()){
			$id = $this->input->post('project_id');
			$this->Notification_model->delete_notifications($id,$this->_user_id,6);
		}
	}

	// public function files($id = null){
	// 	$this->data['project'] = $this->Project_model->details($id);
	// 	$this->data['tasks'] = array();
	// 	$this->layout->view('project/files',$this->data);
	// }

	// public function tasks($id = null){
	// 	$this->data['project'] = $this->Project_model->details($id);
	// 	$this->data['tasks'] = array();
	// 	$this->layout->view('project/tasks',$this->data);
	// }

	// public function addtask($id = null){
	// 	$this->data['project'] = $this->Project_model->details($id);
	// 	$this->layout->view('project/addtask',$this->data);
	// }

	// public function advances($id = null){
	// 	$this->data['project'] = $this->Project_model->details($id);
	// 	$this->data['tasks'] = array();
	// 	$this->layout->view('project/advances',$this->data);
	// }

	// public function liquidations($id = null){
	// 	$this->data['project'] = $this->Project_model->details($id);
	// 	$this->data['tasks'] = array();
	// 	$this->layout->view('project/liquidations',$this->data);
	// }
// ======================================================================
	public function joined($id = null){

		if (!$this->flexi_auth->is_privileged('JOINED PROJECT MAINTENANCE')){
			redirect('project/access_denied');		
		}

		if(is_null($id)){
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['projects'] = $this->Project_contact_model->joined_projects($this->data['filter'],$this->_user_id);
			$this->layout->view('project/joined',$this->data);
		}else{
				if(!$this->Project_contact_model->my_joined_project_contact($id,$this->_user_id)){
					redirect('project/access_denied');
				}

				$this->session->set_userdata('back_link','project/joined/'.$id);
				
				$this->data['project'] = $this->Project_model->details($id);
				$this->data['contacts'] = $this->Project_contact_model->joined_project_contact($id,$this->_user_id);
				$this->layout->view('project/joinedcontactlist',$this->data);
		}
		
	}

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
}

/* End of file project.php */
/* Location: ./application/modules/project/controllers/project.php */