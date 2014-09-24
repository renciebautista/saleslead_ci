<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $grouptype['grouptype_desc']; ?>' Contact Type</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $grouptype['id']); ?>
			<div class="form-group">
				<label for="grouptype">Contact Type</label>
				<?php echo form_error('grouptype'); ?>
				<input id="grouptype" class="form-control" type="text" value="<?php echo set_value('grouptype',$grouptype['grouptype_desc'] ); ?>" name="grouptype" placeholder="Contact Type" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('grouptype'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


