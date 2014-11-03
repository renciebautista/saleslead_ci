<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requestapproval extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('contact/Requests_model');
	}

	public function index($id = null)
	{
		if(is_null($id)){
			$this->data['filter'] = trim($this->input->get('q'));
			$this->data['requestapprovals'] = $this->Requests_model->get_all_for_approval_in_group();
			$this->layout->view('requestapproval/index',$this->data);
		}else{
			
		}
		
	}

}

/* End of file requestapproval.php */
/* Location: ./application/modules/requestapproval/controllers/requestapproval.php */