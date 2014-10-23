<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paintspecification_log extends MY_Model {

	protected $return_type = 'array';

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