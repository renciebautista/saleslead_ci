<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $group['ugrp_name']; ?>' Group</h1>	
		<?php echo $this->session->flashdata('message');?>						
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form','class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $group['ugrp_id']); ?>
			<div class="form-group">
				<label for="group">Group</label>
				<?php echo form_error('group'); ?>
				<input id="group" class="form-control" type="text" value="<?php echo set_value('group',$group['ugrp_name'] ); ?>" name="group" placeholder="Group" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('group'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


