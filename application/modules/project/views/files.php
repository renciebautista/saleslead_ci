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
			   	<li class="active"><a href="<?php echo base_url('project/files/'.$project['id']); ?>" s="tab">Files</a></li>
			   	<li><a href="<?php echo base_url('project/tasks/'.$project['id']); ?>" s="tab">Task</a></li>
			</ul>
		</div>

		<div class="tab-content">
			<div id="details">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-files-o"></i> Files
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

				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-photo"></i> Photos
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
		</div>

	</div>
</div>
<!-- /.row -->


