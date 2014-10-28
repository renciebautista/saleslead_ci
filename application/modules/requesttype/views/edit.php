<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit '<?php echo $requesttype['requesttype']; ?>' Request Type</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $requesttype['id']); ?>
			<div class="form-group">
				<label for="requesttype">Request Type</label>
				<?php echo form_error('requesttype'); ?>
				<input id="requesttype" class="form-control" type="text" name="requesttype" placeholder="Request Type" value="<?php echo set_value('requesttype',$requesttype['requesttype'] ); ?>">
			</div>
			<input class="btn btn-success" type="submit" value="Update">
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

