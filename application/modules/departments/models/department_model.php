<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department_model extends MY_Model {

	public $validate = array(
        array( 'field' => 'department', 
               'label' => 'department',
               'rules' => 'required|is_unique[departments.department]' )
    );

}

/* End of file department_model.php */
/* Location: ./application/modules/department/models/department_model.php */