<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit '<?php echo $grouptype['grouptype_desc']; ?>' Group Type</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
		<?php echo form_hidden('_id', $grouptype['id']); ?>
			<div class="form-group">
				<label for="grouptype">Group Type</label>
				<?php echo form_error('grouptype'); ?>
				<input id="grouptype" class="form-control" type="text" value="<?php echo set_value('grouptype',$grouptype['grouptype_desc'] ); ?>" name="grouptype" placeholder="grouptype">
			</div>
			<input class="btn btn-success" type="submit" value="Update">
			<a class="btn btn-default" href="<?php echo base_url('grouptype'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


