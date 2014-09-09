<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Task Details</h1>				
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
			  	<li><a href="<?php echo base_url('task/details/'.$project['id']); ?>" role="tab">Task History</a></li>
			   	<li class="active"><a href="<?php echo base_url('task/advances/'.$project['id']); ?>" s="tab">Material / Cash Advances</a></li>
			   	<li><a href="<?php echo base_url('task/liquidations/'.$project['id']); ?>" s="tab">Material / Cash Liquidations</a></li>
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
									<div class="pull-right">
										<a href="<?php echo base_url('task/addadvances/'.$project['id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Advances</a>		
									</div>
								</div>
							
							<div class="col-lg-12">

								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Date Created</th>
												<th>Type</th>
												<th>Details</th>
												<th>Amount<i>(Php)</i></th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php if(count($advances) < 1): ?>
											<!-- <tr>
												<td colspan="6">No record found.</td>
											</tr> -->
											<tr>
												<td>09/08/2014</td>
												<td>Materials</td>
												<td>Red Paint</td>
												<td>10,689.00</td>
												<td><a href="">Details</a>
												</td>
											</tr>
											<tr>
												<td>09/12/2014</td>
												<td>Cash</td>
												<td>Dinner Fee</td>
												<td>1,000.00</td>
												<td><a href="">Details</a>
												</td>
											</tr>
										<?php else: ?>
										<?php foreach ($advances as $task):?>
											<tr>
												<td>
													<?php echo $task['project_name']; ?><br>
													<i>	<?php echo ucwords(strtolower($task['lot'].' '.$task['street'].' '.$task['brgy'].' '.$task['city'].' '.$project['province'])); ?></i><br>
												</td>
												<td>
													<?php echo strtoupper($task['last_name'].', '.$task['first_name'].' '.$task['middle_name']); ?>
												</td>
												<td>
													<a href="<?php echo base_url('project/join/'.$task['id']) ?>">Join Project</a>
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

	</div>
</div>
<!-- /.row -->


