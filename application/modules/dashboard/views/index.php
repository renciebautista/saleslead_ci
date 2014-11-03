
<!-- <div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li><a href="#">Dashboard</a></li>
		</ol>
	</div>
</div> -->
<!--End Breadcrumb-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">DashBoard</h1>		
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bell fa-fw"></i>
				Notifications Panel
			</div>
			
			<div class="panel-body">
				<div class="list-group">
					<?php $not = false; ?>
					<?php if(count($new_contacts) > 0): ?>
						<?php $not = true; ?>
					<a class="list-group-item" href="<?php echo base_url('dashboard/contacts_approval'); ?>">
						<i class="fa fa-users fa-fw"></i>
						<?php echo count($new_contacts); ?> Contacts Approval
						<span class="pull-right text-muted small">
							<em><?php echo distance_of_time_in_words(strtotime($new_contacts[0]['created_at']),strtotime(date('Y-m-d H:i:s'))); ?> ago</em>
						</span>
					</a>
					<?php endif; ?>

					<?php if(count($project_comments) > 0): ?>
						<?php $not = true; ?>
					<a class="list-group-item" href="<?php echo base_url('dashboard/projectcomments'); ?>">
						<i class="fa fa-comments fa-fw"></i>
						<?php echo count($project_comments); ?> Project Comments
						<span class="pull-right text-muted small">
							<em><?php echo distance_of_time_in_words(strtotime($project_comments[0]['created_at']),strtotime(date('Y-m-d H:i:s'))); ?> ago</em>
						</span>
					</a>
					<?php endif; ?>

					<?php if(count($joined_projects) > 0): ?>
						<?php $not = true; ?>
					<a class="list-group-item" href="<?php echo base_url('dashboard/joinedcontacts'); ?>">
						<i class="fa fa-share-alt"></i>
						<?php echo count($joined_projects); ?> Joined Contacts
						<span class="pull-right text-muted small">
							<em><?php echo distance_of_time_in_words(strtotime($joined_projects[0]['created_at']),strtotime(date('Y-m-d H:i:s'))); ?> ago</em>
						</span>
					</a>
					<?php endif; ?>

					<?php if(count($new_projects) > 0): ?>
						<?php $not = true; ?>
					<a class="list-group-item" href="<?php echo base_url('project/assigned'); ?>">
						<i class="fa fa-file-text-o fa-fw"></i>
						<?php echo count($new_projects); ?> Projects Assigned
						<span class="pull-right text-muted small">
							<em><?php echo distance_of_time_in_words(strtotime($new_projects[0]['updated_at']),strtotime(date('Y-m-d H:i:s'))); ?> ago</em>
						</span>
					</a>
					<?php endif; ?>

					<?php if((count($for_assigning) > 0) && ($this->flexi_auth->is_privileged('PROJECT ASSIGNING MAINTENANCE'))): ?>
						<?php $not = true; ?>
					<a class="list-group-item" href="<?php echo base_url('project/forassigning'); ?>">
						<i class="fa fa-file-text fa-fw"></i>
						<?php echo count($for_assigning); ?> New Project
						<span class="pull-right text-muted small">
							<em><?php echo distance_of_time_in_words(strtotime($for_assigning[0]['updated_at']),strtotime(date('Y-m-d H:i:s'))); ?> ago</em>
						</span>
					</a>
					<?php endif; ?>

					<?php if(!$not): ?>
					No Notification found!.
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-newspaper-o fa-fw"></i>
				News Panel
			</div>
			<div class="panel-body">
				<ul class="chat">
					<li class="left clearfix">
						<div>
							<div class="header">
								<strong class="primary-font">Jack Sparrow</strong>
								<small class="pull-right text-muted">
								<i class="fa fa-clock-o fa-fw"></i>
								12 mins ago
								</small>
							</div>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales. </p>
						</div>
					</li>
					<li class="left clearfix">
						<div>
							<div class="header">
								<strong class="primary-font">Jack Sparrow</strong>
								<small class="pull-right text-muted">
								<i class="fa fa-clock-o fa-fw"></i>
								12 mins ago
								</small>
							</div>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales. </p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- /.row 