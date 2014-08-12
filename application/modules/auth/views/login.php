<?php echo form_open('auth/login',array('class' => 'form-signin','role' => 'form')); ?>
	<h2 class="form-signin-heading">Please sign in</h2>
	<input class="form-control" autofocus="" required="" placeholder="Email address / Username" name="email_or_username" type="text">
	<input class="form-control" autofocus="" required="" placeholder="Password" name="password" type="password" value="">	
	<div class="checkbox">
		<label>
			<input name="remember" type="checkbox" value="1"> Remember me
		</label>
	</div>
	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
<?php echo 	form_close(); ?>