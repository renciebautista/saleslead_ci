<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paintspecification_log extends MY_Model {

	protected $return_type = 'array';

	public $before_create = array('created_at');

	public function logs($project_contact_id)
	{
		$this->db->where('project_contact_id',$project_contact_id);
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_history($project_id){
		$this->db->select('paintspecification_logs.*,
			contacts.first_name,contacts.middle_name,contacts.last_name,
			grouptypes.grouptype_desc,
			user_details.avatar, 
			user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name
			');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->join('project_contacts','project_contacts.id = paintspecification_logs.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('grouptypes','grouptypes.id = project_contacts.type_id');
		$this->db->join('user_details','user_details.uacc_id_fk = contacts.created_by');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_all_history_user($project_id){
		$this->db->select('user_details.last_name as ulast_name, user_details.first_name as ufirst_name, user_details.middle_name as umiddle_name');
		$this->db->where('project_contacts.project_id',$project_id);
		$this->db->join('project_contacts','project_contacts.id = paintspecification_logs.project_contact_id');
		$this->db->join('contacts','contacts.id = project_contacts.contact_id');
		$this->db->join('user_details','user_details.uacc_id_fk = contacts.created_by');
		$this->db->group_by('contacts.created_by');
		return $this->db->get($this->_table)->result_array();
	}


	public function generate_logs($type,$details,$area,$paint,$cost){
		return sprintf('<div class="row">
									<div class="col-lg-12">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Type</th>
														<th>Details</th>
														<th>Area<i>(SqM)</i></th>
														<th>Paint Requirement<i>(Ltrs.)</i></th>
														<th>Painting Cost<i>(Php)</i></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>%s<br></td>
														<td>%s<br></td>
														<td>%s<br></td>
														<td>%s<br></td>
														<td>%s<br></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /.col-lg-12 -->			
								</div>
							<!-- /.row -->',$type,$details,$area,$paint,$cost);
	}
}

/* End of file paintspecification_log.php */
/* Location: ./application/modules/contact/models/paintspecification_log.php */