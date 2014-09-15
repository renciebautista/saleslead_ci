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

	}

	public function index(){	
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['status'] = trim($this->input->get('s'));
		$this->data['projects'] = $this->Project_model->public_projects($this->data['status'],$this->data['filter'], $this->_user_id);
		$this->layout->view('project/index',$this->data);
	}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('project_name' , 'Project Name', 'trim|required');
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
					'type_id' => $this->input->post('type_id')
					));
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE){
			    $this->flash_message->set('message','alert alert-error','An error occured!');
			    redirect('project/create');
			} 
			$this->flash_message->set('message','alert alert-success','Project successfully created!');
			redirect('project');
		}
	}
// ======================================================================

	public function forassigning($id = null){
		if(is_null($id)){
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['projects'] = $this->Project_model->forassigning($this->data['filter']);
			$this->layout->view('project/forassigning',$this->data);
		}else{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('project_id', 'Project ID', 'required|is_natural_no_zero');
			$this->form_validation->set_rules('assigned_to', 'Assigned To', 'required|is_natural_no_zero');

			$this->form_validation->set_message('required', 'This field is required.');
			$this->form_validation->set_message('is_unique', 'Value already exist.');
			$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

			if ($this->form_validation->run() == FALSE){
				$this->data['users'] = $this->User_model->get_all_active();
				$this->data['project'] = $this->Project_model->details($id);
				$this->layout->view('project/details',$this->data);
			}else{
				$project_id = $this->input->post('project_id');
				$assigned_to = $this->input->post('assigned_to');
				$this->Project_model->update($project_id,array('assigned_to' => $assigned_to, 'assigned_by' => $this->_user_id));
				$this->flash_message->set('message','alert alert-success','Project successfully assigned!');
				redirect('project/forassigning');
			}
		}
	}
// ======================================================================
	public function join($id = null){
		$this->data['cities'] = $this->City_model->get_all_cities();
		$this->data['types'] = $this->Grouptype_model->order_by('grouptype_desc')->get_all();
		$this->data['project'] = $this->Project_model->details($id);
		$this->layout->view('project/join_project',$this->data);
	}

// ======================================================================
	public function assigned(){
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['projects'] = $this->Project_model->assigned($this->data['filter'],$this->_user_id);
		$this->layout->view('project/assigned',$this->data);
	}

	public function details($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['details'] = $this->Project_detail_model->get_all_details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/assigned_details',$this->data);
	}

	public function classifications($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/classifications',$this->data);
	}

	public function categories($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/categories',$this->data);
	}

	public function stages($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/stages',$this->data);
	}

	public function statuses($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/statuses',$this->data);
	}

	public function specifications($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/specifications',$this->data);
	}

	public function files($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/files',$this->data);
	}

	public function tasks($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/tasks',$this->data);
	}

	public function addtask($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->layout->view('project/addtask',$this->data);
	}

	public function advances($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/advances',$this->data);
	}

	public function liquidations($id = null){
		$this->data['project'] = $this->Project_model->details($id);
		$this->data['tasks'] = array();
		$this->layout->view('project/liquidations',$this->data);
	}
}

/* End of file project.php */
/* Location: ./application/modules/project/controllers/project.php */