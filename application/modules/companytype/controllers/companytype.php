<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companytype extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Companytype_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('COMPANY TYPE MAINTENANCE')){
			redirect('companytype/access_denied');		
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['companytypes'] = $this->Companytype_model->search($this->data['filter']);
		$this->layout->view('companytype/index',$this->data);
	}

	public function create(){
		if (!$this->flexi_auth->is_privileged('COMPANY TYPE MAINTENANCE')){
			redirect('companytype/access_denied');		
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('companytype', 'Company Typw', 'required|is_unique[companytypes.companytype]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('companytype/create',$this->data);
		}else{
			$companytype = strtoupper(trim($this->input->post('companytype')));
			$this->Companytype_model->insert(array('companytype' => $companytype));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$companytype.' company type!');
			redirect('companytype');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('COMPANY TYPE MAINTENANCE')){
			redirect('companytype/access_denied');		
		}

		if(!$this->Companytype_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('companytype', 'Company Typw', 'required|is_unique[companytypes.companytype]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['companytype'] = $this->Companytype_model->get($id);
			$this->layout->view('companytype/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$companytype = strtoupper(trim($this->input->post('companytype')));
			$this->Companytype_model->update($_id,array('companytype' => $companytype));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$companytype.' company type!');
			redirect('companytype');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('COMPANY TYPE MAINTENANCE')){
			redirect('companytype/access_denied');		
		}

		if(!$this->Companytype_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['companytype'] = $this->Companytype_model->get($id);
			$this->layout->view('companytype/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$companytype = $this->Companytype_model->get($_id);

			if($this->Companytype_model->related_to('company_typelist','companytype_id',$_id)){
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$companytype['companytype'].' it is related to a record!');
				redirect('companytype/delete/'.$_id);
			}else{
				$this->Companytype_model->delete($_id);
				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$companytype['companytype_desc'].' company type!');
				redirect('companytype');
			}	

			
		}
	}

}

/* End of file companytype.php */
/* Location: ./application/modules/companytype/controllers/companytype.php */