<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Create Privilege</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
			<div class="form-group">
				<label for="group">Privilege Name</label>
				<?php echo form_error('privilege'); ?>
				<input id="privilege" class="form-control" type="text" value="<?php echo set_value('privilege'); ?>" name="privilege" placeholder="Privilege Name">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<?php echo form_error('description'); ?>
				<textarea id="description" class="form-control" placeholder="Description" rows="3" name="description"><?php echo set_value('description'); ?></textarea>
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('privilege'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


