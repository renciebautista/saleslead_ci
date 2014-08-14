<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sales Lead</title>

	<!-- Bootstrap Core CSS -->
	<?php echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css') ?>

	<!-- Custom Fonts -->
	 <?php echo link_tag('assets/plugins/font-awesome-4.1.0/css/font-awesome.min.css') ?>

	<!-- Custom CSS -->
	<?php echo link_tag('assets/css/sb-admin-2.css') ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<div class="container">
		<div class="row">
			<?php //display_var($this->_ci_cached_vars);?>
			<div class="col-md-4 col-md-offset-4">


				<?php if (!empty($message)): ?>	
				<div id="login-alert" class="alert alert-danger">
					<?php echo $message; ?>
				</div>
				<?php endif; ?>
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please Sign In</h3>
					</div>

					<div class="panel-body">
						<?php echo form_open('', array('role' => 'form')); ?>
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail / Username" name="identity" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me">Remember Me
									</label>
								</div>
								<input name="login_user" class="btn btn-lg btn-success btn-block" type="submit" value="Login">
							</fieldset>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
