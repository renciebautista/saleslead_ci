<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Contact</h1>		
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<?php //debug($this->_ci_cached_vars);?>
<?php echo validation_errors(); ?>
<div class="row">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('company_id', $company['id']); ?>
	<div class="col-lg-6">
			
			<div class="form-group">
				<label for="comapny_name">Company Name</label>
				<?php echo form_error('comapny_name'); ?>
				<input value="<?php echo $company['company']; ?>" id="comapny_name" class="form-control" type="text" name="comapny_name" readonly="">
			</div>

			<div class="form-group">
				<label for="address">Company Address</label>
				<?php echo form_error('address'); ?>
				<input value="<?php echo ucwords(strtolower($company['lot'].' '.$company['street'].' '.$company['brgy'].', '.$company['city'].' '.$company['province'])); ?>" id="address" class="form-control" type="text" name="address" readonly="">
			</div>

			<div class="form-group">
				<label for="first_name">First Name</label>
				<?php echo form_error('first_name'); ?>
				<input value="<?php echo set_value('first_name'); ?>" id="first_name" class="form-control" type="text" name="first_name" placeholder="First Name">
			</div>
			<div class="form-group">
				<label for="middle_name">Middle Name</label>
				<?php echo form_error('middle_name'); ?>
				<input value="<?php echo set_value('middle_name'); ?>" id="middle_name" class="form-control" type="text" name="middle_name" placeholder="Midlle Name">
			</div>
			<div class="form-group">
				<label for="last_name">Last Name</label>
				<?php echo form_error('last_name'); ?>
				<input value="<?php echo set_value('last_name'); ?>" id="last_name" class="form-control" type="text" name="last_name" placeholder="Last Name">
			</div>

			<div class="form-group">
				<label for="title">Title / Position</label>
				<?php echo form_error('title'); ?>
				<input value="<?php echo set_value('title'); ?>" id="title" class="form-control" type="text" name="title" placeholder="Title / Position">
			</div>
			
	</div>
	<div class="col-lg-12">
		<div class="form-group">
				<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('company/contacts/'.$company['id']); ?>">Back</a>
		</div>
	</div>
	
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function() {	
	$(".form-validate").validate({
		errorElement: 'span',
		rules: {
			first_name: "required",
			middle_name: "required",
			last_name: "required",
			title: "required"
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});

});
</script>
