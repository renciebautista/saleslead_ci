<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DevOOPS</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo link_tag('assets/plugins/bootstrap/bootstrap.css'); ?>
		<?php echo link_tag('assets/plugins/jquery-ui/jquery-ui.min.css'); ?>
		<?php echo link_tag('assets/plugins/font-awesome-4.1.0/css/font-awesome.min.css'); ?>

		<!-- <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'> -->

		<?php echo link_tag('assets/plugins/fancybox/jquery.fancybox.css'); ?>
		<?php echo link_tag('assets/plugins/fullcalendar/fullcalendar.css'); ?>
		<?php echo link_tag('assets/plugins/xcharts/xcharts.min.css'); ?>
		<?php echo link_tag('assets/plugins/select2/select2.css'); ?>
		<?php echo link_tag('assets/css/style.css'); ?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="index.html">Sales Leads</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a href="index.html" class="modal-link">
									<i class="fa fa-bell"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a class="ajax-link" href="ajax/calendar.html">
									<i class="fa fa-calendar"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a href="ajax/page_messages.html" class="ajax-link">
									<i class="fa fa-envelope"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="assets/img/avatar.jpg" class="img-rounded" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span>Jane Devoops</span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span class="hidden-sm text">Profile</span>
										</a>
									</li>
									<li>
										<a href="ajax/page_messages.html" class="ajax-link">
											<i class="fa fa-envelope"></i>
											<span class="hidden-sm text">Messages</span>
										</a>
									</li>
									<li>
										<a href="ajax/gallery_simple.html" class="ajax-link">
											<i class="fa fa-picture-o"></i>
											<span class="hidden-sm text">Albums</span>
										</a>
									</li>
									<li>
										<a href="ajax/calendar.html" class="ajax-link">
											<i class="fa fa-tasks"></i>
											<span class="hidden-sm text">Tasks</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span class="hidden-sm text">Settings</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-power-off"></i>
											<span class="hidden-sm text">Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				
				<li>
					<a id="dashboard" href="<?php echo base_url('dashboard'); ?>">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">Dashboard</span>
					</a>
				</li>



				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-table"></i>
						 <span class="hidden-xs">User Maintenance</span>
					</a>
					<ul class="dropdown-menu">
						<li><a id="department" href="<?php echo base_url('department'); ?>">Department Maintenance</a></li>
						<li><a id="user" href="<?php echo base_url('user'); ?>">User Maintenance</a></li>
						<li><a id="role" href="<?php echo base_url('role'); ?>">Role Maintenance</a></li>
					</ul>
				</li>

				
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<!-- <div class="preloader">
				<img src="assets/img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div> -->
			<div id="ajax-content">
				<?php echo $content_for_layout ?>
			</div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?php echo base_url().'assets/plugins/jquery/jquery-2.1.0.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js'; ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url().'assets/plugins/bootstrap/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/justified-gallery/jquery.justifiedgallery.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/tinymce/tinymce.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/tinymce/jquery.tinymce.min.js'; ?>"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="<?php echo base_url().'assets/js/devoops.js'; ?>"></script>




</body>
</html>
