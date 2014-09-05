<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prjcategory extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Prjcategory_model');
		$this->load->model('Prjsubcategory_model');
	}

	public function index()
	{
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['prjcategorys'] = $this->Prjcategory_model->search($this->data['filter']);
		$this->layout->view('prjcategory/index',$this->data);
	}


	public function create(){
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
		if((count($this->Prjcategory_model->get($id))< 1) || (is_null($id))){
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
		if((count($this->Prjcategory_model->get($id))< 1) || (is_null($id))){
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
			$this->Prjcategory_model->delete($_id);
			$this->flash_message->set('message','alert alert-success','Successfully deleted '.$prjcategory['prjcategory_desc'].' project category!');
			redirect('prjcategory');
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
		$this->data['filter'] = trim($this->input->get('q'));
		$this->data['category'] = $this->Prjcategory_model->get($id);
		$this->data['subcategories'] = $this->Prjsubcategory_model->search($id,$this->data['filter']);
		$this->layout->view('prjcategory/subcategory',$this->data);
	}

	public function createsubcategory($id = null){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('prjcategory_id', 'Project Category', 'required');
		$this->form_validation->set_rules('subcategory', 'Sub Category', 'required');

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

}

/* End of file prjcategory.php */
/* Location: ./application/modules/prjcategory/controllers/prjcategory.php */