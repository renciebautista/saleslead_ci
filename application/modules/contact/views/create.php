<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Contact</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<?php echo form_open('',array('role' => 'form')); ?>
	<div class="col-lg-6">
			<div class="form-group">
				<label for="project_name">Company Name</label>
				<?php echo form_error('project_name'); ?>
				<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
			</div>

			<div class="form-group">
				<label for="project_name">Company Address</label>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="project_name">Lot / Blk / House No. / Unit No.</label>
							<?php echo form_error('project_name'); ?>
							<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="project_name">Street</label>
							<?php echo form_error('project_name'); ?>
							<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="project_name">Brgy. / Subdivision</label>
							<?php echo form_error('project_name'); ?>
							<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="project_name">Town / City</label>
							<?php echo form_error('project_name'); ?>
							<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="project_name">Province</label>
							<?php echo form_error('project_name'); ?>
							<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="project_name">State</label>
							<?php echo form_error('project_name'); ?>
							<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Service Offered</label>
				<?php if(count($grouptypes) > 0): ?>
				<?php foreach ($grouptypes as $grouptype):?>
					<div class="checkbox">
						<label>
							<input name="grouptype[]" value="<?php echo $grouptype['id']; ?>" type="checkbox" value=""><?php echo $grouptype['grouptype_desc']; ?>
						</label>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
				</div>

				

			</div>
			
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="first_name">First Name</label>
			<?php echo form_error('first_name'); ?>
			<input value="<?php echo set_value('first_name'); ?>" id="first_name" class="form-control" type="text" value="" name="first_name" placeholder="First Name">
		</div>
		<div class="form-group">
			<label for="middle_name">Middle Name</label>
			<?php echo form_error('middle_name'); ?>
			<input value="<?php echo set_value('middle_name'); ?>" id="middle_name" class="form-control" type="text" value="" name="middle_name" placeholder="Midlle Name">
		</div>
		<div class="form-group">
			<label for="last_name">Last Name</label>
			<?php echo form_error('last_name'); ?>
			<input value="<?php echo set_value('last_name'); ?>" id="last_name" class="form-control" type="text" value="" name="last_name" placeholder="Last Name">
		</div>

		<div class="form-group">
			<label for="middle_name">Title</label>
			<?php echo form_error('middle_name'); ?>
			<input value="<?php echo set_value('middle_name'); ?>" id="middle_name" class="form-control" type="text" value="" name="middle_name" placeholder="Midlle Name">
		</div>
		<div class="form-group">
			<label for="last_name">Position</label>
			<?php echo form_error('last_name'); ?>
			<input value="<?php echo set_value('last_name'); ?>" id="last_name" class="form-control" type="text" value="" name="last_name" placeholder="Last Name">
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
				<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('project'); ?>">Back</a>
		</div>
	</div>
	
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


<script type="text/delayscript">
$(document).ready(function() {
	$("#prjclassification_id,#prjcategory_id,#prjstage_id,#prjstatus_id").chosen({allow_single_deselect: true});
});
</script>