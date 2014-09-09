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
			  	<li class="active"><a href="#details" role="tab">Project Details</a></li>
			  	<li><a href="#classification" role="tab">Project Classification</a></li>
			  	<li><a href="#category" role="tab">Project Category</a></li>
			  	<li><a href="#stage" role="tab">Project Stage</a></li>
			   	<li><a href="#status" s="tab">Project Status</a></li>
			   	<li><a href="#specification" s="tab">Paint Specification</a></li>
			   	<li><a href="#files" s="tab">Files</a></li>
			   	<li><a href="#tasks" s="tab">Task</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="details">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Details
					</div>
					<?php if(!empty($details)): ?>
					<div class="panel-body">
						<?php foreach ($details as $detail):?>
						<div>
							<div>
								<strong class="primary-font">
									<?php echo strtoupper($detail['last_name'].', '.$detail['first_name'].' '.$detail['middle_name']); ?> 

								</strong>
								<p>
								
								<small class="text-muted">

									<i class="fa fa-clock-o"></i> <?php echo distance_of_time_in_words(strtotime($detail['created_at']),strtotime(date('Y-m-d H:i:s'))); ?> ago
								</small>
								</p>
							</div>
							<div>
								<p><?php echo nl2br($detail['details']) ?></p>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="tab-pane" id="classification">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Classification
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="category">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Catgegory
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="stage">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Stage
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="status">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Status
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="specification">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Paint Specification
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="files">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Files
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tasks">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Tasks
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
												<th>Date Created</th>
												<th>Target Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php if(count($tasks) < 1): ?>
											<tr>
												<td colspan="3">No record found.</td>
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


