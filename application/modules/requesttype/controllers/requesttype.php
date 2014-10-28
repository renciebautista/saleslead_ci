<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requesttype extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Requesttype_model');
		$this->load->model('Request_approver_model');
		$this->load->model('user/User_model');
	} 

	public function index()
	{
		if (!$this->flexi_auth->is_privileged('REQUEST TYPE MAINTENANCE')){
			redirect('requesttype/access_denied');		
		}
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['requesttypes'] = $this->Requesttype_model->search($this->data['filter']);
		$this->layout->view('requesttype/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('REQUEST TYPE MAINTENANCE')){
			redirect('requesttype/access_denied');		
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('requesttype', 'Request Type', 'required|is_unique[requesttypes.requesttype]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('requesttype/create',$this->data);
		}else{
			$requesttype = strtoupper(trim($this->input->post('requesttype')));
			$this->Requesttype_model->insert(array('requesttype' => $requesttype));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$requesttype.' request type!');
			redirect('requesttype');
		}
	}

	public function is_unique_value($str,$str2){
		if ($this->Requesttype_model->unique_except_me($str,$str2)){
			$this->form_validation->set_message('is_unique_value', 'The %s already exist!');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function edit($id = null){
		$this->_validate($id);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('_id', 'Id', 'trim|required');
		$this->form_validation->set_rules('requesttype', 'Request Type', 'required|callback_is_unique_value['.$this->input->post('_id').']');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['requesttype'] = $this->Requesttype_model->get($id);
			$this->layout->view('requesttype/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$requesttype = strtoupper(trim($this->input->post('requesttype')));
			$this->Requesttype_model->update($_id,array('requesttype' => $requesttype));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$requesttype.' request type!');
			redirect('requesttype');
		}
	}

	public function delete($id = null){
		$this->_validate($id);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['requesttype'] = $this->Requesttype_model->get($id);
			$this->layout->view('requesttype/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$requesttype = $this->Requesttype_model->get($_id);
			if($this->Requesttype_model->related_to('requests','requesttype_id',$_id)){
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$requesttype['requesttype'].' it is related to a request!');
				redirect('requesttype/delete/'.$_id);
			}else{
				$this->Requesttype_model->delete($_id);

				$this->Request_approver_model->delete_by(array('request_type_id' => $_id));

				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$requesttype['requesttype'].' requst type!');
				redirect('requesttype');
			}
		}
	}

// =================================================
	private function _validate($id){
		if (!$this->flexi_auth->is_privileged('REQUEST TYPE MAINTENANCE')){
			redirect('requesttype/access_denied');		
		}

		if(!$this->Requesttype_model->id_exist($id) || (is_null($id))){
			redirect('requesttype/access_denied');	
			return;
		}
	}
	public function approver($id){
		$this-> _validate($id);

		$type = 1;
		if(!$_POST){
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['approvers'] = $this->Request_approver_model->get_request_approver($this->data['filter'],$id,$type);
			$this->data['requesttype'] = $this->Requesttype_model->get($id);
			$this->layout->view('requesttype/approver',$this->data);
		}else{
			$requesttype_id = $this->input->post('requesttype_id');
			$user_id = $this->input->post('_id');
			
			$this->Request_approver_model->delete_by(array('request_type_id' => $requesttype_id, 'user_id' => $user_id, 'type' => $type));
			$this->flash_message->set('message','alert alert-success','User succesfuly deleted.');
			redirect('requesttype/approver/'.$requesttype_id);
		}
	}

	public function addapprover($id){
		$this-> _validate($id);

		$type = 1;
		if(!$_POST){
			$this->data['requesttype_id'] = $id;
			$this->data['filter'] = trim($this->input->get('q'));
			$selected = $this->Request_approver_model->get_selected_users($id,$type);
			$this->data['users'] = $this->User_model->available_user($this->data['filter'],$selected);
			$this->layout->view('requesttype/addapprover',$this->data);
		}else{
			$requesttype_id = $this->input->post('requesttype_id');
			$user_id = $this->input->post('_id');
			if($this->Request_approver_model->user_already_exist($requesttype_id, $user_id,$type)){
				$this->flash_message->set('message','alert alert-danger','User already exist in request type.');
				redirect('requesttype/addapprover/'.$requesttype_id);
			}else{
				$this->Request_approver_model->insert(array(
					'request_type_id' => $requesttype_id,
					'user_id' => $user_id,
					'type' => $type
					));
				$this->flash_message->set('message','alert alert-success','User succesfuly added.');
				redirect('requesttype/approver/'.$requesttype_id);
			}
		}
	}

// =================================================
	public function releaser($id){
		$this-> _validate($id);

		$type = 2;
		if(!$_POST){
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['approvers'] = $this->Request_approver_model->get_request_approver($this->data['filter'],$id,$type);
			$this->data['requesttype'] = $this->Requesttype_model->get($id);
			$this->layout->view('requesttype/releaser',$this->data);
		}else{
			$requesttype_id = $this->input->post('requesttype_id');
			$user_id = $this->input->post('_id');
			
			$this->Request_approver_model->delete_by(array('request_type_id' => $requesttype_id, 'user_id' => $user_id, 'type' => $type));
			$this->flash_message->set('message','alert alert-success','User succesfuly deleted.');
			redirect('requesttype/releaser/'.$requesttype_id);
		}
	}

	public function addreleaser($id){
		$this-> _validate($id);

		$type = 2;
		if(!$_POST){
			$this->data['requesttype_id'] = $id;
			$this->data['filter'] = trim($this->input->get('q'));
			$selected = $this->Request_approver_model->get_selected_users($id,$type);
			$this->data['users'] = $this->User_model->available_user($this->data['filter'],$selected);
			$this->layout->view('requesttype/addreleaser',$this->data);
		}else{
			$requesttype_id = $this->input->post('requesttype_id');
			$user_id = $this->input->post('_id');
			if($this->Request_approver_model->user_already_exist($requesttype_id, $user_id,$type)){
				$this->flash_message->set('message','alert alert-danger','User already exist in request type.');
				redirect('requesttype/addreleaser/'.$requesttype_id);
			}else{
				$this->Request_approver_model->insert(array(
					'request_type_id' => $requesttype_id,
					'user_id' => $user_id,
					'type' => $type
					));
				$this->flash_message->set('message','alert alert-success','User succesfuly added.');
				redirect('requesttype/releaser/'.$requesttype_id);
			}
		}
	}
// =================================================
}

/* End of file requesttype.php */
/* Location: ./application/modules/requesttype/controllers/requesttype.php */