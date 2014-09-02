<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Contact</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<?php //debug($this->_ci_cached_vars);?>
<div class="row">
	<?php echo form_open('',array('role' => 'form')); ?>
	<div class="col-lg-6">
			
			<div class="form-group">
				<label for="company_id">Company Name</label>
				<?php echo form_error('company_id'); ?>
				<input value="<?php echo set_value('company_id'); ?>" id="company_id" class="form-control" type="text" value="" name="company_id" readonly="">
			</div>

			<div class="form-group">
				<label for="address">Company Address</label>
				<?php echo form_error('address'); ?>
				<input value="<?php echo set_value('address'); ?>" id="address" class="form-control" type="text" value="" name="address" readonly="">
			</div>

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
				<label for="middle_name">Title / Position</label>
				<?php echo form_error('middle_name'); ?>
				<input value="<?php echo set_value('middle_name'); ?>" id="middle_name" class="form-control" type="text" value="" name="middle_name" placeholder="Midlle Name">
			</div>
			
	</div>
	<div class="col-lg-12">
		<div class="form-group">
				<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('contact'); ?>">Back</a>
		</div>
	</div>
	
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


