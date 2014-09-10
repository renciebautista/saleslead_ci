<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div id="contact-details" class="col-lg-12">
		<address>
		  	<span><strong><?php echo strtoupper($project['project_name']); ?></strong></span><br>
		  	<span><?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'])); ?></span><br>
		  	<span><?php echo ucwords(strtolower($project['province'])); ?></span><br>
		</address>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div id="tab">
			<ul class="nav nav-tabs" role="tablist">
			  	<li><a href="<?php echo base_url('project/details/'.$project['id']); ?>" role="tab">Project Details</a></li>
			  	<li><a href="<?php echo base_url('project/classifications/'.$project['id']); ?>" role="tab">Project Classification</a></li>
			  	<li><a href="<?php echo base_url('project/categories/'.$project['id']); ?>" role="tab">Project Category</a></li>
			  	<li><a href="<?php echo base_url('project/stages/'.$project['id']); ?>" role="tab">Project Stage</a></li>
			   	<li><a href="<?php echo base_url('project/statuses/'.$project['id']); ?>" s="tab">Project Status</a></li>
			   	<li><a href="<?php echo base_url('project/specifications/'.$project['id']); ?>" s="tab">Paint Specification</a></li>
			   	<li><a href="<?php echo base_url('project/files/'.$project['id']); ?>" s="tab">Files</a></li>
			   	<li><a href="<?php echo base_url('project/tasks/'.$project['id']); ?>" s="tab">Task</a></li>

			   	<li class="active"><a href="<?php echo base_url('project/advances/'.$project['id']); ?>" s="tab">Advances</a></li>
                <li><a href="<?php echo base_url('project/liquidations/'.$project['id']); ?>" s="tab">Liquidations</a></li>
			</ul>
		</div>

		<div class="tab-content">
			<div id="specifications">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-money"></i> Material / Cash Advances
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Date Created</th>
												<th>Type</th>
												<th>Details</th>
												<th>Amount<i>(Php)</i></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>09/08/2014</td>
												<td>Materials</td>
												<td>Red Paint</td>
												<td>10,689.00</td>
												</td>
											</tr>
											<tr>
												<td>09/12/2014</td>
												<td>Cash</td>
												<td>Dinner Fee</td>
												<td>1,000.00</td>
												</td>
											</tr>
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

	</div>
</div>
<!-- /.row -->


