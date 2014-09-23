<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete User</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<?php echo form_open('',array('group' => 'form', 'class' => 'form-validate')); ?>
	<?php echo form_hidden('_id', $user['id']); ?>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="first_name">First Name</label>
			<?php echo form_error('first_name'); ?>
			<input value="<?php echo set_value('first_name',$user['first_name']); ?>" id="first_name" class="form-control" type="text" name="first_name" placeholder="First Name" readonly="">
		</div>
		<div class="form-group">
			<label for="middle_name">Middle Name</label>
			<?php echo form_error('middle_name'); ?>
			<input value="<?php echo set_value('middle_name',$user['middle_name']); ?>" id="middle_name" class="form-control" type="text" name="middle_name" placeholder="Midlle Name" readonly="">
		</div>
		<div class="form-group">
			<label for="last_name">Last Name</label>
			<?php echo form_error('last_name'); ?>
			<input value="<?php echo set_value('last_name',$user['last_name']); ?>" id="last_name" class="form-control" type="text" name="last_name" placeholder="Last Name" readonly="">
		</div>

		<div class="form-group">
			<label for="emp_id">Employee Id</label>
			<?php echo form_error('emp_id'); ?>
			<input value="<?php echo set_value('emp_id',$user['emp_id']); ?>" id="emp_id" class="form-control" type="text" name="emp_id" placeholder="Employee Id" readonly="">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<?php echo form_error('email'); ?>
			<input value="<?php echo set_value('email',$user['uacc_email']); ?>" id="email" class="form-control" type="text" placeholder="Email" readonly="">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="department">Department</label>
			<?php echo form_error('department'); ?>
			<input value="<?php echo set_value('department',$user['department']); ?>" id="department" class="form-control" type="text" placeholder="Department" readonly="">
		</div>

		<div class="form-group">
			<label for="group">Group</label>
			<?php echo form_error('group'); ?>
			<input value="<?php echo set_value('group',$user['ugrp_name']); ?>" id="group" class="form-control" type="text" placeholder="Group" readonly="">
		</div>


		<div class="form-group">
			<label for="bank_account">Bank Account</label>
			<?php echo form_error('bank_account'); ?>
			<input value="<?php echo set_value('bank_account',$user['bank_account']); ?>" id="bank_account" class="form-control" type="text" name="bank_account" placeholder="Bank Account" readonly="">
		</div>

		<div class="form-group">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="active" name="active" value="1"  <?php echo set_checkbox('active', '1', ($user['uacc_active']) ? TRUE:FALSE); ?>/>Active
				</label>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
		<a class="btn btn-default" href="<?php echo base_url('user'); ?>">Back</a>
	</div>
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


<script type="text/delayscript">
$(document).ready(function() {
	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			first_name: "required",
			middle_name: "required",
			last_name: "required",
			emp_id: "required",
			department_id: { is_natural_no_zero: true },
			group_id: { is_natural_no_zero: true },
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});
	$("#department_id,#group_id").chosen({allow_single_deselect: true});
});
</script>