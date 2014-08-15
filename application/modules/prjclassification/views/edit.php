<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit '<?php echo $prjclassification['prjclassification_desc']; ?>' Project Classification</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
		<?php echo form_hidden('_id', $prjclassification['id']); ?>
			<div class="form-group">
				<label for="prjclassification">Project Classification</label>
				<?php echo form_error('prjclassification'); ?>
				<input id="prjclassification" class="form-control" type="text" value="<?php echo set_value('prjclassification',$prjclassification['prjclassification_desc'] ); ?>" name="prjclassification" placeholder="Project Classification">
			</div>
			<input class="btn btn-success" type="submit" value="Update">
			<a class="btn btn-default" href="<?php echo base_url('prjclassification'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


