<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">User Profile</h1>	
		<?php echo $this->session->flashdata('message');?>					
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate','id' => 'change-password')); ?>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-key fa-fw"></i>
				Change Password
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="password">Old Password</label>
					<?php echo form_error('password'); ?>
					<input id="password" class="form-control" type="password"  name="password" placeholder="Old Password">
				</div>
				<div class="form-group">
					<label for="new_password">New Password</label>
					<?php echo form_error('new_password'); ?>
					<input id="new_password" class="form-control" type="password"  name="new_password" placeholder="New Password">
				</div>
				<div class="form-group">
					<label for="retype_password">Retype Password</label>
					<?php echo form_error('retype_password'); ?>
					<input id="retype_password" class="form-control" type="password"  name="retype_password" placeholder="Retype Password">
				</div>
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="Submit">
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
<!-- /.row -->

<div class="row">
	<?php echo form_open_multipart('user/updatepic',array('role' => 'form', 'id' => 'change-pic')); ?>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-user fa-fw"></i>
				Change Profile Picture
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>File input</label>
					<input type="file" name="userfile" size="20" />
				</div>
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="Submit">
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
<!-- /.row -->

<script type="text/delayscript">
$("#change-password").validate({
	errorElement: 'span',
	rules:{
		password: "required",
		new_password: "required",
		retype_password: {
			equalTo: "#new_password",
			required: true
		}
	},
	errorPlacement: function(error, element){
		error.insertAfter(element.siblings("label"));
	}
});

$("#change-pic").submit(function( event ) {
	$('#waiting').show(500);
	$('#page-content').hide(0);
});
</script>