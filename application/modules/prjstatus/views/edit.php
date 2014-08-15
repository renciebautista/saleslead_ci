<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit '<?php echo $prjstatus['prjstatus_desc']; ?>' Project Status</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
		<?php echo form_hidden('_id', $prjstatus['id']); ?>
			<div class="form-group">
				<label for="prjstatus">Project Status</label>
				<?php echo form_error('prjstatus'); ?>
				<input id="prjstatus" class="form-control" type="text" value="<?php echo set_value('prjstatus',$prjstatus['prjstatus_desc'] ); ?>" name="prjstatus" placeholder="Project Status">
			</div>
			<input class="btn btn-success" type="submit" value="Update">
			<a class="btn btn-default" href="<?php echo base_url('prjstatus'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


