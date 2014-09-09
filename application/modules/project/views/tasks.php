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
			   	<li  class="active"><a href="<?php echo base_url('project/tasks/'.$project['id']); ?>" s="tab">Task</a></li>
			</ul>
		</div>

		<div class="tab-content">
			<div id="tasks">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-tasks"></i> Project Tasks
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="<?php echo base_url('project/addtask/'.$project['id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Task</a>		
								</div>
							</div>
						</div>
						<div class="row">
							
							<div class="col-lg-12">

								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Task Name</th>
												<th>Assigned To</th>
												<th>Status</th>
												<th>Date Created</th>
												<th>Target Date</th>
												<th>Last Update</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php if(count($tasks) < 1): ?>
											<!-- <tr>
												<td colspan="6">No record found.</td>
											</tr> -->
											<tr>
												<td>Call Client</td>
												<td>ALDEA, DONATO JAVID</td>
												<td>PENDING</td>
												<td>09/09/2014</td>
												<td>09/12/2014</td>
												<td>09/09/2014</td>
												<td><a href="">Details</a>
												</td>
											</tr>
										<?php else: ?>
										<?php foreach ($tasks as $task):?>
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


