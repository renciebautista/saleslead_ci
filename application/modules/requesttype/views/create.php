<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Request Type</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
			<div class="form-group">
				<label for="requesttype">Request Type</label>
				<?php echo form_error('requesttype'); ?>
				<input id="requesttype" class="form-control" type="text" value="" name="requesttype" placeholder="Request Type">
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('requesttype'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function(){
	$(".form-validate").validate({
		errorElement: 'span',
		rules: {
			requesttype: "required",
		},
		errorPlacement: function(error, element){
			error.insertAfter(element.siblings("label"));
		}
	});
});
</script>

