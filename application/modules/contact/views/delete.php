<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete Contact</h1>	
		<?php echo $this->session->flashdata('message');?>							
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<?php //debug($this->_ci_cached_vars);?>
<div class="row">
	<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
	<?php echo form_hidden('_id', $contact['id']); ?>
	<div class="col-lg-6">
			<div class="form-group">
				<label for="company_id">Company Name</label>
				<?php echo form_error('company_id'); ?>
				<input value="<?php echo set_value('company_id',$contact['company']); ?>" id="company_id" class="form-control" type="text" name="company_id" placeholder="Company Name" readonly="">
			</div>

			<div class="form-group">
				<label for="address">Company Address</label>
				<?php echo form_error('address'); ?>
				<input value="<?php echo set_value('address',ucwords(strtolower($contact['lot'].' '.$contact['street'].' '.$contact['brgy'].', '.$contact['city'].' '.$contact['province']))); ?>" id="address" class="form-control" type="text" name="address" placeholder="Company Address" readonly="">
			</div>

			<div class="form-group">
				<label for="first_name">First Name</label>
				<?php echo form_error('first_name'); ?>
				<input value="<?php echo set_value('first_name',$contact['first_name']); ?>" id="first_name" class="form-control" type="text" name="first_name" placeholder="First Name" readonly="">
			</div>
			<div class="form-group">
				<label for="middle_name">Middle Name</label>
				<?php echo form_error('middle_name'); ?>
				<input value="<?php echo set_value('middle_name',$contact['middle_name']); ?>" id="middle_name" class="form-control" type="text" name="middle_name" placeholder="Midlle Name" readonly="">
			</div>
			<div class="form-group">
				<label for="last_name">Last Name</label>
				<?php echo form_error('last_name'); ?>
				<input value="<?php echo set_value('last_name',$contact['last_name']); ?>" id="last_name" class="form-control" type="text" name="last_name" placeholder="Last Name" readonly="">
			</div>

			<div class="form-group">
				<label for="title">Title / Position</label>
				<?php echo form_error('title'); ?>
				<input value="<?php echo set_value('title',$contact['title']); ?>" id="title" class="form-control" type="text" name="title" placeholder="Title / Position" readonly="">
			</div>
			
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('contact'); ?>">Back</a>
		</div>
	</div>
	
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

