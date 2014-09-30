<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjstatus extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Prjstatus_model');
	}
	public function details(){
		$stage = array();
		if($this->input->is_ajax_request()){
			$status = 'ok';
			$stage = $this->Prjstatus_model->get($this->input->get('id'));
		}else{
			$status = 'error';
		}
		echo json_encode(array(
				'status' => $status,
				'data' => $stage
				));	
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['prjstatuses'] = $this->Prjstatus_model->search($this->data['filter']);
		$this->layout->view('prjstatus/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjstatus', 'Project Status', 'required|is_unique[prjstatuses.prjstatus_desc]');
		$this->form_validation->set_rules('remarks', 'Remarks', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('prjstatus/create',$this->data);
		}else{
			$prjstatus = strtoupper(trim($this->input->post('prjstatus')));
			$this->Prjstatus_model->insert(array('prjstatus_desc' => $prjstatus, 'remarks' => $this->input->post('remarks')));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$prjstatus.' project status!');
			redirect('prjstatus');
		}
	}

	public function is_unique_value($str,$str2){
		if ($this->Prjstatus_model->unique_except_me($str,$str2)){
			$this->form_validation->set_message('is_unique_value', 'The %s already exist!');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}

		if(!$this->Prjstatus_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjstatus', 'Project Status', 'required|callback_is_unique_value['.$this->input->post('_id').']');
		$this->form_validation->set_rules('remarks', 'Remarks', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjstatus'] = $this->Prjstatus_model->get($id);
			$this->layout->view('prjstatus/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjstatus = strtoupper(trim($this->input->post('prjstatus')));
			$this->Prjstatus_model->update($_id,array('prjstatus_desc' => $prjstatus, 'remarks' => $this->input->post('remarks')));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$prjstatus.' project status!');
			redirect('prjstatus');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')){
			redirect('prjstatus/access_denied');		
		}

		if(!$this->Prjstatus_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjstatus'] = $this->Prjstatus_model->get($id);
			$this->layout->view('prjstatus/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjstatus = $this->Prjstatus_model->get($_id);
			if($this->Prjstatus_model->related_to('project_status_histories','prjstatus_id',$_id)){
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$prjstatus['prjstatus'].' it is related to a project!');
				redirect('prjcategory/delete/'.$_id);
			}else{
				$this->Prjstatus_model->delete($_id);
				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$prjstatus['prjstatus'].' prjstatus!');
				redirect('prjstatus');
			}
			
		}
	}

}

/* End of file prjstatus.php */
/* Location: ./application/modules/prjstatus/controllers/prjstatus.php */