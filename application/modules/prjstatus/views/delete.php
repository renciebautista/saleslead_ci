<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $prjstatus['prjstatus_desc']; ?>' Project Status</h1>	
		<?php echo $this->session->flashdata('message');?>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $prjstatus['id']); ?>
			<div class="form-group">
				<label for="prjstatus">Project Status</label>
				<?php echo form_error('prjstatus'); ?>
				<input id="prjstatus" class="form-control" type="text" value="<?php echo set_value('prjstatus',$prjstatus['prjstatus_desc'] ); ?>" name="prjstatus" placeholder="Project Status" readonly="">
			</div>
			<div class="form-group">
				<label for="remarks">Remarks</label>
				<?php echo form_error('remarks'); ?>
				<textarea id="remarks" name="remarks" class="form-control" rows="5" placeholder="Remarks" readonly=""><?php echo set_value('remarks',$prjstatus['remarks'] ); ?></textarea>
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('prjstatus'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


