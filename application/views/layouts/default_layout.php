<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Project Reference System</title>

	<!-- Bootstrap Core CSS -->
	<?php echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>
	<!-- MetisMenu CSS -->
	<?php echo link_tag('assets/plugins/metisMenu/css/metisMenu.min.css'); ?>
	<!-- Chosen CSS -->
	<?php echo link_tag('assets/plugins/chosen-1.1.0/css/chosen.css'); ?>
	<!-- Custom Fonts -->
	<?php echo link_tag('assets/plugins/font-awesome-4.1.0/css/font-awesome.min.css'); ?>
	<!-- Timeline CSS -->
	<?php echo link_tag('assets/plugins/timeline/css/timeline.css'); ?>
	<!-- Select2 CSS -->
	<?php echo link_tag('assets/plugins/select2-3.5.1/css/select2.css'); ?>
	<?php echo link_tag('assets/plugins/select2-3.5.1/css/select2-bootstrap.css'); ?>
	
	<!-- Custom CSS -->
	<?php echo link_tag('assets/css/sb-admin-2.css'); ?>
	<?php echo link_tag('assets/css/sl.css'); ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var domain ="http://"+document.domain;
	</script>

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top	 navbar-inverse" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Project Reference System</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-messages">
						<li>
							<a href="#">
								<div>
									<strong>John Smith</strong>
									<span class="pull-right text-muted">
										<em>Yesterday</em>
									</span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<strong>John Smith</strong>
									<span class="pull-right text-muted">
										<em>Yesterday</em>
									</span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<strong>John Smith</strong>
									<span class="pull-right text-muted">
										<em>Yesterday</em>
									</span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a class="text-center" href="#">
								<strong>Read All Messages</strong>
								<i class="fa fa-angle-right"></i>
							</a>
						</li>
					</ul>
					<!-- /.dropdown-messages -->
				</li>
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-tasks">
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 1</strong>
										<span class="pull-right text-muted">40% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
											<span class="sr-only">40% Complete (success)</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 2</strong>
										<span class="pull-right text-muted">20% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
											<span class="sr-only">20% Complete</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 3</strong>
										<span class="pull-right text-muted">60% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
											<span class="sr-only">60% Complete (warning)</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 4</strong>
										<span class="pull-right text-muted">80% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											<span class="sr-only">80% Complete (danger)</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a class="text-center" href="#">
								<strong>See All Tasks</strong>
								<i class="fa fa-angle-right"></i>
							</a>
						</li>
					</ul>
					<!-- /.dropdown-tasks -->
				</li>
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-alerts">
						<li>
							<a href="#">
								<div>
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-twitter fa-fw"></i> 3 New Followers
									<span class="pull-right text-muted small">12 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-envelope fa-fw"></i> Message Sent
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-tasks fa-fw"></i> New Task
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-upload fa-fw"></i> Server Rebooted
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a class="text-center" href="#">
								<strong>See All Alerts</strong>
								<i class="fa fa-angle-right"></i>
							</a>
						</li>
					</ul>
					<!-- /.dropdown-alerts -->
				</li>
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-profile">
							<div class="text-center">
								<img class="img-circle " alt="140x140" data-src="holder.js/140x140" style="width: 140px; height: 140px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+">
							</div>
							<span><?php echo $user_full_name; ?></span>
						</li>
						
						<li>
							<a id="dashboard" href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>

						<li class="dropdown">
							<a href="#"><i class="fa fa-tasks fa-fw"></i> Tasks<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a id="task" href="<?php echo base_url('task'); ?>">My Tasks</a>
								</li>
								
							</ul>
							<!-- /.nav-second-level -->
						</li>


						<li class="dropdown">
							<a href="#"><i class="fa fa-file-text-o fa-fw"></i> Projects<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a id="project" href="<?php echo base_url('project'); ?>">Projects</a>
								</li>
								<li>
									<a id="project" href="<?php echo base_url('project/forassigning'); ?>">New Projects</a>
								</li>
								<li>
									<a id="project" href="<?php echo base_url('project/assigned'); ?>">Assigned Projects</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>



						<li class="dropdown">
							<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a id="report" href="<?php echo base_url('report/area'); ?>">Area Report</a>
								</li>
								<li>
									<a id="report" href="<?php echo base_url('report/salesman'); ?>">Salesman Report</a>
								</li>
								<li>
									<a id="report" href="<?php echo base_url('report/salesmanweekly'); ?>">Salesman Weekly Report</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>

						<li class="dropdown">
							<a href="#"><i class="fa fa-users fa-fw"></i> Contacts<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a id="contact" href="<?php echo base_url('contact'); ?>">Contacts</a>
								</li>
								<li>
									<a id="company" href="<?php echo base_url('company'); ?>">Companies</a>
								</li>
								
								
							</ul>
							<!-- /.nav-second-level -->
						</li>

						<li class="dropdown">
							<a href="#"><i class="fa fa-user fa-fw"></i> User Maintenance<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li >
									<a id="department"  href="<?php echo base_url('department'); ?>">Departments</a>
								</li>
								<li>
									<a id="role" href="<?php echo base_url('group'); ?>">Groups</a>
								</li>
								<li>
									<a id="user" href="<?php echo base_url('user'); ?>">Users</a>
								</li>
								<li>
									<a id="privilege" href="<?php echo base_url('privilege'); ?>">Privileges</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>

						<li class="dropdown">
							<a href="#"><i class="fa fa-gear fa-fw"></i> File Maintenance<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a id="prjclassification" href="<?php echo base_url('prjclassification'); ?>">Project Classifications</a>
								</li>
								<li>
									<a id="prjcategory" href="<?php echo base_url('prjcategory'); ?>">Project Categories</a>
								</li>
								<li>
									<a id="prjstage" href="<?php echo base_url('prjstage'); ?>">Project Stages</a>
								</li>
								<li>
									<a id="prjstatus" href="<?php echo base_url('prjstatus'); ?>">Project Statuses</a>
								</li>
								<li>
									<a id="grouptype" href="<?php echo base_url('grouptype'); ?>">Contact Types</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>

						
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<!-- Page Content -->
		<div id="page-wrapper">
			<?php echo $content_for_layout ?>	
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery Version 1.11.0 -->
	<script src="<?php echo base_url('assets/js/jquery-1.11.0.js'); ?>"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<script src="<?php echo base_url('assets/plugins/metisMenu/js/metisMenu.min.js'); ?>"></script>
	<!-- Chosen Plugin JavaScript -->
	<script src="<?php echo base_url('assets/plugins/chosen-1.1.0/js/chosen.jquery.js'); ?>"></script>
	<!-- Select2 Plugin JavaScript -->
	<script src="<?php echo base_url('assets/plugins/select2-3.5.1/js/select2.min.js'); ?>"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?php echo base_url('assets/js/sl.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin-2.js'); ?>"></script>

</body>

</html>

