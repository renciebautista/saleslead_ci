<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Requests_model');
		$this->load->model('requesttype/Requesttype_model');
		$this->load->model('requesttype/Request_approver_model');
		$this->load->model('project/Project_contact_model');
		$this->load->model('contact/Contact_model');
	}

	private function _for_approval($id){
		if(!$this->Requests_model->for_approval($id)){
			redirect('request/access_denied');
		}

		$request = $this->Requests_model->get_details($id);
		if(!$this->Request_approver_model->valid_approver($this->_user_id,$request['requesttype_id'],1)){
			redirect('request/access_denied');
		}
	}

	private function _valid_approval(){
		$requestapproval = $this->Request_approver_model->my_for_approval($this->_user_id,1);
		if(empty($requestapproval)){
			redirect('request/access_denied');
		}
		
	}

	public function approval($id = null){
		$this->_valid_approval();
		if(is_null($id)){
			$requesttypes = $this->Request_approver_model->my_for_approval($this->_user_id,1);
			$this->data['requests'] = $this->Requests_model->get_all_for_approval_in_group($requesttypes);
			$this->layout->view('request/approval',$this->data);
		}else{
			if(!$this->Request_approver_model->valid_approver($this->_user_id,$id,1)){
				redirect('request/access_denied');
			}
			$this->data['request'] = $this->Requesttype_model->get($id);
			$this->data['requests'] = $this->Requests_model->get_for_approval($id);
			$this->layout->view('request/approval_details',$this->data);
		}
	}

	public function details($id = null){
		$this->_valid_approval();
		$this->_for_approval($id);


		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', 'Request Id', 'trim|required');
		$this->form_validation->set_rules('approval_remarks', 'Approval Remarks', 'trim|required');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$request = $this->Requests_model->get_details($id);
			$this->data['requesttype'] = $this->Requesttype_model->get($request['requesttype_id']);
			$this->data['request'] = $request;
			$project_contact = $this->Project_contact_model->get($request['project_contact_id']);
			$this->data['contact'] = $this->Contact_model->details($project_contact['contact_id']);
			$this->data['project'] = $this->Project_contact_model->details($request['project_contact_id']);
			$this->data['costs'] = $this->Requests_model->project_cost_summary($request['project_id']);
			$this->layout->view('request/details',$this->data);
		}else{
			$id = $this->input->post('_id');
			$submit = $this->input->post('submit');
			$status = 3;
			if($submit == 'Approve'){
				$status = 2;
			}
			$request = $this->Requests_model->get_details($id);
			$this->Requests_model->update($id,array(
				'approved_amount' => str_replace(",", "", $this->input->post('approved_amount')),
				'approval_remarks' => $this->input->post('approval_remarks'),
				'updated_by' => $this->_user_id,
				'status_id' => $status));

			$this->flash_message->set('message','alert alert-success','Request successfully updated!');
			redirect('request/approval/'.$request['requesttype_id']);
		}
	}

}

/* End of file request.php */
/* Location: ./application/modules/request/controllers/request.php */