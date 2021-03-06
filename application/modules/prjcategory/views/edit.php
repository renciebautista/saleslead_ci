<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit '<?php echo $prjcategory['prjcategory_desc']; ?>' Project Category</h1>	
		<?php echo $this->session->flashdata('message');?>					
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $prjcategory['id']); ?>
			<div class="form-group">
				<label for="prjcategory">Project Category</label>
				<?php echo form_error('prjcategory'); ?>
				<input id="prjcategory" class="form-control" type="text" value="<?php echo set_value('prjcategory',$prjcategory['prjcategory_desc'] ); ?>" name="prjcategory" placeholder="Project Category">
			</div>
			<input class="btn btn-success" type="submit" value="Update">
			<a class="btn btn-default" href="<?php echo base_url('prjcategory'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function(){
	$(".form-validate").validate({
		errorElement: 'span',
		rules:{
			prjcategory: "required"
		},
		errorPlacement: function(error,element){
			error.insertAfter(element.siblings("label"));
		}
	});
});
</script>
