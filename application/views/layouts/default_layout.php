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

	<!-- DataTables-1.10.2 CSS -->
	<?php echo link_tag('assets/plugins/DataTables-1.10.2/css/dataTables.bootstrap.css'); ?>
	
	<!-- Custom CSS -->
	<?php echo link_tag('assets/css/sb-admin-2.css'); ?>
	<?php echo link_tag('assets/css/sl.css'); ?>
	<?php echo link_tag('assets/css/loading.css'); ?>
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
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="<?php echo base_url('user/profile'); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
							<a href="<?php echo base_url('user/profile'); ?>">
							<div class="text-center">
								<?php if(!empty($avatar)): ?>
								<img class="img-circle " alt="140x140" data-src="holder.js/140x140" style="width: 140px; height: 140px;" src="<?php echo base_url('uploads/avatar/'.$avatar) ?>">
								<?php else: ?>
								<img class="img-circle " alt="140x140" data-src="holder.js/140x140" style="width: 140px; height: 140px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+">
								<?php endif; ?>
							</div>
							<span><?php echo $user_full_name; ?></span>
							</a>
						</li>
						
						<li>
							<a id="dashboard" href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>

						<?php //$this->load->view('menu/tasks'); ?>

						<?php $this->load->view('menu/projects'); ?>

						<?php $this->load->view('menu/contacts'); ?>

						<?php //$this->load->view('menu/reports'); ?>

						<?php $this->load->view('menu/user_maintenance'); ?>

						<?php $this->load->view('menu/file_maintenance'); ?>

						
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<!-- Page Content -->
		<div id="page-wrapper">
			<div id="waiting">
				<div class="row">
					<div class="col-lg-12 waiting-message">
						<span>Please wait while processing....</span>
						<div id="loadingProgressG">

							<div id="loadingProgressG_1" class="loadingProgressG"></div>
						</div>
					</div>
					<!-- /.col-lg-12 -->						
				</div>
				<!-- /.row -->
			</div>

			<div id="page-content">
				<?php echo $content_for_layout ?>	
			</div>
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
	<!-- Jquery Validate Plugin JavaScript -->
	<script src="<?php echo base_url('assets/plugins/jquery-validation-1.13.0/js/jquery.validate.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-validation-1.13.0/js/additional-methods.js'); ?>"></script>
	<!-- Jquery Numeric_only Plugin JavaScript -->
	<script src="<?php echo base_url('assets/plugins/numeric_only/js/jquery.numericonly.js'); ?>"></script>

	<!-- DataTables-1.10.2 Plugin JavaScript -->
	<script src="<?php echo base_url('assets/plugins/DataTables-1.10.2/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/DataTables-1.10.2/js/dataTables.bootstrap.js'); ?>"></script>

	<!-- jquery-maskmoney-3.0.2 Plugin JavaScript -->
	<script src="<?php echo base_url('assets/plugins/jquery-maskmoney-3.0.2/jquery.maskMoney.min.js'); ?>"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?php echo base_url('assets/js/sl.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin-2.js'); ?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('button[type="submit"]').click(function() {
		        if($(this).closest("form").attr("class") == "form-validate"){
	                $('#waiting').show(500);
	                $('#page-content').hide(0);
	                return true;
	            }
		    });

		    $('input[type="submit"]').click(function() {
		        var class_name = $(this).closest("form").attr("class");
		        if(class_name == "form-validate"){
		            if ($.validator) {
		                var valid = $(".form-validate").valid();
		                if(valid){
		                	if(class_name == "form-validate"){
		                        $('#waiting').show(500);
		                        $('#page-content').hide(0);
		                        return true;
		                    }
		                }
		            } 
		        }else{
		            if(class_name == "form-validate"){
		                $('#waiting').show(500);
		                $('#page-content').hide(0);
		                return true;
		            }
		        }
		           
		    });


		});
	</script>
</body>

</html>

