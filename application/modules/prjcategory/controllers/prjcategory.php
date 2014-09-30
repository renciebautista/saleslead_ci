<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjcategory extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Prjcategory_model');
		$this->load->model('Prjsubcategory_model');
	}

	public function index(){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['prjcategorys'] = $this->Prjcategory_model->search($this->data['filter']);
		$this->layout->view('prjcategory/index',$this->data);
	}


	public function create(){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjcategory', 'prjcategory', 'required|is_unique[prjcategories.prjcategory_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->layout->view('prjcategory/create',$this->data);
		}else{
			$prjcategory = strtoupper(trim($this->input->post('prjcategory')));
			$this->Prjcategory_model->insert(array('prjcategory_desc' => $prjcategory));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$prjcategory.' project category!');
			redirect('prjcategory');
		}
	}

	public function edit($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		if(!$this->Prjcategory_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('prjcategory', 'prjcategory', 'required|is_unique[prjcategories.prjcategory_desc]');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjcategory'] = $this->Prjcategory_model->get($id);
			$this->layout->view('prjcategory/edit',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjcategory = strtoupper(trim($this->input->post('prjcategory')));
			$this->Prjcategory_model->update($_id,array('prjcategory_desc' => $prjcategory));
			$this->flash_message->set('message','alert alert-success','Successfully updated '.$prjcategory.' project category!');
			redirect('prjcategory');
		}
	}

	public function delete($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		if(!$this->Prjcategory_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['prjcategory'] = $this->Prjcategory_model->get($id);
			$this->layout->view('prjcategory/delete',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjcategory = $this->Prjcategory_model->get($_id);
			if($this->Prjcategory_model->related_to('project_category_histories','prjcat_id',$_id)){
				$this->flash_message->set('message','alert alert-danger','Cannot delete '.$prjcategory['prjcategory_desc'].' it is related to a project!');
				redirect('prjcategory/delete/'.$_id);
			}else{
				$this->Prjcategory_model->delete($_id);
				$this->flash_message->set('message','alert alert-success','Successfully deleted '.$prjcategory['prjcategory_desc'].' project category!');
				redirect('prjcategory');
			}	
		}
	}
//-----------------------------------------------------
	// Ajax request
	public function subcategorylists(){
		if($this->input->is_ajax_request()){
			$filter = $this->input->get('q');
			$sub_categories = $this->Prjsubcategory_model->get_many_by(array('prjcategory_id' => $filter));
			$sub = array();
			if(!empty($sub_categories)){
				foreach ($sub_categories as $subcategory){
					$sub[$subcategory['id']] = $subcategory['prjsubcategory_desc'];
				}
			}
			echo json_encode(array(
				'status' => 'success',
				'subcategory' => $sub
				));	
		}
	}

	public function subcategory($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		if(!$this->Prjcategory_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['category'] = $this->Prjcategory_model->get($id);
		$this->data['subcategories'] = $this->Prjsubcategory_model->search($id,$this->data['filter']);
		$this->layout->view('prjcategory/subcategory',$this->data);
	}

	public function subcategory_check($str,$str2){
		if ($this->Prjsubcategory_model->subcategory_exist($str2,$str)){
			$this->form_validation->set_message('subcategory_check', 'The %s already exist!');
			return FALSE;
		}else{
			return TRUE;
		}
	}


	public function createsubcategory($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		if(!$this->Prjcategory_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('prjcategory_id', 'Project Category', 'required');
		$this->form_validation->set_rules('subcategory', 'Sub Category', 'trim|required|callback_subcategory_check['.$this->input->post('prjcategory_id').']');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['category'] = $this->Prjcategory_model->get($id);
			$this->layout->view('prjcategory/createsubcategory',$this->data);
		}else{
			$prjcategory_id = $this->input->post('prjcategory_id');
			$prjsubcategory_desc = strtoupper(trim($this->input->post('subcategory')));
			$this->Prjsubcategory_model->insert(array('prjsubcategory_desc' => $prjsubcategory_desc,'prjcategory_id' => $prjcategory_id));
			$this->flash_message->set('message','alert alert-success','Successfully created '.$prjsubcategory_desc.' project sub category!');
			redirect('prjcategory/subcategory/'.$prjcategory_id);
		}
	}

	public function editsubcategory($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		if(!$this->Prjsubcategory_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('prjcategory_id', 'Project Category', 'required');
		$this->form_validation->set_rules('_id', 'Project Sub Category', 'required');
		$this->form_validation->set_rules('subcategory', 'Sub Category', 'trim|required|callback_subcategory_check['.$this->input->post('prjcategory_id').']');

		$this->form_validation->set_message('required', 'This field is required.');
		$this->form_validation->set_message('is_unique', 'Value already exist.');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['subcategory'] = $this->Prjsubcategory_model->details($id);
			$this->layout->view('prjcategory/editsubcategory',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjcategory_id = $this->input->post('prjcategory_id');
			$prjsubcategory_desc = strtoupper(trim($this->input->post('subcategory')));
			$this->Prjsubcategory_model->update($_id,array('prjsubcategory_desc' => $prjsubcategory_desc));
			$this->flash_message->set('message','alert alert-success','Successfully updated  project sub category!');
			redirect('prjcategory/subcategory/'.$prjcategory_id);
		}
	}

	public function deletesubcategory($id = null){
		if (!$this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')){
			redirect('prjcategory/access_denied');		
		}

		if(!$this->Prjsubcategory_model->id_exist($id) || (is_null($id))){
			$this->not_found();
			return;
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('_id', '', 'required');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->data['subcategory'] = $this->Prjsubcategory_model->details($id);
			$this->layout->view('prjcategory/deletesubcategory',$this->data);
		}else{
			$_id = $this->input->post('_id');
			$prjsubcategory = $this->Prjsubcategory_model->get($_id);
			$this->Prjsubcategory_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$prjsubcategory['prjsubcategory_desc'].' project sub category!');
			redirect('prjcategory/subcategory/'.$prjsubcategory['prjcategory_id']);
		}
	}

}

/* End of file prjcategory.php */
/* Location: ./application/modules/prjcategory/controllers/prjcategory.php */