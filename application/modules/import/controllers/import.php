<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('filereader');
	}

	public function index()
	{
		$this->_update_province();
	}

	private function _update_province(){
		$this->load->model('province/Province_model');
		$filePath = realpath('uploads/luzon.txt');
		$data = $this->filereader->parse_file($filePath,"\n","\n",false);
		foreach ($data as $key => $value) {
			$this->Province_model->update_by(array('province' => trim($value[0])), array('state_id' => 1));
		}

		$filePath = realpath('uploads/visayas.txt');
		$data = $this->filereader->parse_file($filePath,"\n","\n",false);
		foreach ($data as $key => $value) {
			$this->Province_model->update_by(array('province' => trim($value[0])), array('state_id' => 2));
		}

		$filePath = realpath('uploads/mindanao.txt');
		$data = $this->filereader->parse_file($filePath,"\n","\n",false);
		foreach ($data as $key => $value) {
			$this->Province_model->update_by(array('province' => trim($value[0])), array('state_id' => 3));
		}
		
	}

}

/* End of file import.php */
/* Location: ./application/modules/import/controllers/import.php */