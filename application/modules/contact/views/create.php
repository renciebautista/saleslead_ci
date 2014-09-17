<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Contact</h1>
		<?php echo $this->session->flashdata('message');?>								
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<?php //debug($this->_ci_cached_vars);?>
<div class="row">
	<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
	<div class="col-lg-6">
			<div class="form-group">
				<a href="<?php echo base_url('contact/createcompany'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Company</a>
			</div>
			<div class="form-group">
				<label for="company_id">Company Name</label>
				<?php echo form_error('company_id'); ?>
				<input value="<?php echo set_value('company_id'); ?>" id="company_id" class="form-control" type="text" value="" name="company_id" placeholder="Company Name">
			</div>

			<div class="form-group">
				<label for="address">Company Address</label>
				<?php echo form_error('address'); ?>
				<input value="<?php echo set_value('address'); ?>" id="address" class="form-control" type="text" value="" name="address" placeholder="Company Address" readonly="">
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
				<label for="title">Title / Position</label>
				<?php echo form_error('title'); ?>
				<input value="<?php echo set_value('title'); ?>" id="title" class="form-control" type="text" value="" name="title" placeholder="Title / Position">
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


<script type="text/delayscript">
$(document).ready(function() {	
	$(".form-validate").validate({
		errorElement: 'span',
		rules: {
			company_id: "required",
			first_name: "required",
			middle_name: "required",
			last_name: "required",
			title: "required"
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});

	$('#address').val('');
	$('#company_id').select2({
			placeholder: "Company Name",
			allowClear: true,
			minimumInputLength: 3,
			ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
				url: domain + '/company/lists', 
				dataType: 'json',
				data: function (term, page) {
					return {
						q: term, // search term
						page_limit: 10,
					};
				},
				results: function (data, page) { // parse the results into the format expected by Select2.
					//console.log(data);
					// since we are using custom formatting functions we do not need to alter remote JSON data
					return {results: data.contacts};
				}
			},
			formatResult: companyformatSelection,
			escapeMarkup: function(m) { return m; }
		}).on("select2-selecting", function(e) {
			$('#address').val(e.object.address);
        }).on("select2-removed", function(e) {
        	$('#address').val('');
        });
});
</script>