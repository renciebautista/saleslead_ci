<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $department['department']; ?>' Department</h1>	
		<?php echo $this->session->flashdata('message');?>						
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $department['id']); ?>
			<div class="form-group">
				<label for="department">Department</label>
				<?php echo form_error('department'); ?>
				<input id="department" class="form-control" type="text" value="<?php echo set_value('department',$department['department'] ); ?>" name="department" placeholder="Department" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('department'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


