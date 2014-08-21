<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $state['state_desc']; ?>' State</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
		<?php echo form_hidden('_id', $state['id']); ?>
			<div class="form-group">
				<label for="state">State</label>
				<?php echo form_error('state'); ?>
				<input id="state" class="form-control" type="text" value="<?php echo set_value('state',$state['state_desc'] ); ?>" name="state" placeholder="State" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('state'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


