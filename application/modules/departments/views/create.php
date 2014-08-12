
<h1 class="page-header">New Department</h1>

<div class="col-sm-6">
<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
	<div class="form-group">
		<label for="department">Department</label>
		<?php echo form_error('department'); ?>
		<input id="department" class="form-control" type="text" value="" name="department" placeholder="Department">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Submit">
		<a class="btn btn-default" href="<?php echo base_url('departments'); ?>">Back</a>
	</div>

<?php echo form_close(); ?>
</div>
