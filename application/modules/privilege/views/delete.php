<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $privilege['upriv_name']; ?>' privilege</h1>	
		<?php echo $this->session->flashdata('message');?>						
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
		<?php echo form_hidden('_id', $privilege['upriv_id']); ?>
			<div class="form-group">
				<label for="privilege">Privilege Name</label>
				<?php echo form_error('privilege'); ?>
				<input id="privilege" class="form-control" type="text" value="<?php echo set_value('privilege',$privilege['upriv_name'] ); ?>" name="privilege" placeholder="privilege" readonly="">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<?php echo form_error('description'); ?>
				<textarea id="description" class="form-control" placeholder="Description" rows="3" name="description" readonly=""><?php echo set_value('description',$privilege['upriv_desc'] ); ?></textarea>
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('privilege'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


