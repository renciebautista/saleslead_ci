<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit '<?php echo $prjstage['prjstage_desc']; ?>' Project Stage</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $prjstage['id']); ?>
			<div class="form-group">
				<label for="prjstage">Project Stage</label>
				<?php echo form_error('prjstage'); ?>
				<input id="prjstage" class="form-control" type="text" value="<?php echo set_value('prjstage',$prjstage['prjstage_desc'] ); ?>" name="prjstage" placeholder="Project Stage">
			</div>
			<input class="btn btn-success" type="submit" value="Update">
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
			prjstage: "required"
		},
		errorPlacement: function(error, element){
			error.insertAfter(element.siblings("label"));
		}
	});
});
</script>
