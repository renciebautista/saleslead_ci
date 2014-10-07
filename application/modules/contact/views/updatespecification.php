<?php $this->load->view('shared/contact/_contact_update_header'); ?>

<div class="row">
	<div class="col-lg-12">
		
		<?php $this->load->view('shared/project/_update_project_details'); ?>

		<div class="tab-content">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#specs" role="tab" data-toggle="tab">Paint Specification</a></li>
			  <li><a href="#history" role="tab" data-toggle="tab">History</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active" id="specs">
					<div style =" margin-top:15px;">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-paint-brush"></i> Painting Specifications
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="pull-right">
										<a href="<?php echo base_url('contact/addspecification/'.$project['project_contact_id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Specifications</a>		
									</div>
								</div>
							</div>
						
							<div class="row">
								
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
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php if(count($specs) < 1): ?>
												<tr>
													<td colspan="6">No record found.</td>
												</tr>
							
											<?php else: ?>
											<?php foreach ($specs as $spec):?>
												<tr>
													<td>
														<?php echo $spec['painttype']; ?><br>
													</td>
													<td>
														<?php echo nl2br($spec['details']); ?><br>
													</td>
													<td>
														<?php echo number_format($spec['area'],2); ?><br>
													</td>
													<td>
														<?php echo number_format($spec['paint'],2); ?><br>
													</td>
													<td>
														<?php echo number_format($spec['cost'],2); ?><br>
													</td>
													<td>
														<a href="<?php echo base_url('project/join/'.$spec['id']) ?>">Edit</a>
														<a href="<?php echo base_url('project/join/'.$spec['id']) ?>">Delete</a>
													</td>
												</tr>
											<?php endforeach; ?>
											<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
								<!-- /.col-lg-12 -->						
							</div>
							<!-- /.row -->
						</div>
						

					</div>
				</div>
			  </div>
			  <div class="tab-pane" id="history">...</div>
			</div>
		</div>
	</div>

		
</div>
<!-- /.row -->
