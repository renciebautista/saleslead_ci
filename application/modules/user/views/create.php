<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New User</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<?php echo form_open('',array('role' => 'form')); ?>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="first_name">First Name</label>
			<?php echo form_error('first_name'); ?>
			<input value="<?php echo set_value('first_name'); ?>" id="first_name" class="form-control" type="text" value="" name="first_name" placeholder="First Name">
		</div>
		<div class="form-group">
			<label for="middle_name">Middle Name</label>
			<?php echo form_error('middle_name'); ?>
			<input value="<?php echo set_value('middle_name'); ?>" id="middle_name" class="form-control" type="text" value="" name="middle_name" placeholder="Midlle Name">
		</div>
		<div class="form-group">
			<label for="last_name">Last Name</label>
			<?php echo form_error('last_name'); ?>
			<input value="<?php echo set_value('last_name'); ?>" id="last_name" class="form-control" type="text" value="" name="last_name" placeholder="Last Name">
		</div>

		<div class="form-group">
			<label for="emp_id">Employee Id</label>
			<?php echo form_error('emp_id'); ?>
			<input value="<?php echo set_value('emp_id'); ?>" id="emp_id" class="form-control" type="text" value="" name="emp_id" placeholder="Employee Id">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<?php echo form_error('email'); ?>
			<input value="<?php echo set_value('email'); ?>" id="email" class="form-control" type="text" value="" name="email" placeholder="Email">
		</div>

		<div class="form-group">
			<label for="email">Bank Account</label>
			<?php echo form_error('email'); ?>
			<input value="<?php echo set_value('email'); ?>" id="email" class="form-control" type="text" value="" name="email" placeholder="Bank Account">
		</div>

			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('user'); ?>">Back</a>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="department_id">Department</label>
			<?php echo form_error('department_id'); ?>
			<select class="form-control" data-placeholder="SELECT DEPARTMENT" id="department_id" name="department_id" class="medium" >
				<option value="0"></option>
				<?php foreach($departments as $department){?>
					<option value="<?php echo $department['id'];?>" <?php echo set_select('department_id',$department['id']); ?> ><?php echo $department['department'];?></option>
				<?}?>
			</select>
		</div>
		<div class="form-group">
			<label for="role_id">Role</label>
			<?php echo form_error('role_id'); ?>
			<select class="form-control" data-placeholder="SELECT ROLE" id="role_id" name="role_id" class="medium" >
				<option value="0"></option>
				<?php foreach($roles as $role){?>
					<option value="<?php echo $role['ugrp_id'];?>" <?php echo set_select('role_id',$role['ugrp_id']); ?> ><?php echo $role['ugrp_name'];?></option>
				<?}?>
			</select>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<?php echo form_error('username'); ?>
			<input value="<?php echo set_value('username'); ?>" id="username" class="form-control" type="text" value="" name="username" placeholder="Username">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<?php echo form_error('password'); ?>
			<input id="password" class="form-control" type="password" value="" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="confirm_password"> Confirm Password</label>
			<?php echo form_error('confirm_password'); ?>
			<input id="confirm_password" class="form-control" type="password" value="" name="confirm_password" placeholder="Confirm Password">
		</div>
	</div>
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


<script type="text/delayscript">
$(document).ready(function() {
	$("#department_id,#role_id").chosen({allow_single_deselect: true});
});
</script>