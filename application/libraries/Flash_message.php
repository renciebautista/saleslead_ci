<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flash_message
{
  	protected 	$ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->library('session');
	}

	public function set($name='message',$class,$message){
		$this->ci->session->set_flashdata($name, '<div class="'.$class.'">'.$message.'</div>');
	}

}

/* End of file flash_message.php */
/* Location: ./application/libraries/flash_message.php */
