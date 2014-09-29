<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Project Stage</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
			<div class="form-group">
				<label for="prjstage">Project Stage</label>
				<?php echo form_error('prjstage'); ?>
				<input id="prjstage" class="form-control" type="text" value="" name="prjstage" placeholder="Project Stage">
			</div>
			<div class="form-group">
				<label for="remarks">Remarks</label>
				<?php echo form_error('remarks'); ?>
				<textarea id="remarks" name="remarks" class="form-control" rows="5" placeholder="Remarks"></textarea>
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('prjstage'); ?>">Back</a>
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
			prjstage: "required",
			remarks: "required"
		},
		errorPlacement: function(error, element){
			error.insertAfter(element.siblings("label"));
		}
	});
});
</script>
