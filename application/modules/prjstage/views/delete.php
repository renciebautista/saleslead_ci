<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $prjstage['prjstage_desc']; ?>' Project Stage</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form','class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $prjstage['id']); ?>
			<div class="form-group">
				<label for="prjstage">Project Stage</label>
				<?php echo form_error('prjstage'); ?>
				<input id="prjstage" class="form-control" type="text" value="<?php echo set_value('prjstage',$prjstage['prjstage_desc'] ); ?>" name="prjstage" placeholder="Project Stage" readonly="">
			</div>
			<div class="form-group">
				<label for="remarks">Remarks</label>
				<?php echo form_error('remarks'); ?>
				<textarea id="remarks" name="remarks" class="form-control" rows="5" placeholder="Remarks" readonly=""><?php echo set_value('remarks',$prjstage['remarks'] ); ?></textarea>
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('prjstage'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


