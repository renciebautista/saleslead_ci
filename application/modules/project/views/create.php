<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Project</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<?php echo form_open('',array('role' => 'form')); ?>
	<div class="col-lg-6">
			<div class="form-group">
				<label for="project_name">Project Name</label>
				<?php echo form_error('project_name'); ?>
				<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
			</div>

			<div class="form-group">
				<label for="project_name">Location / Address</label>
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

			</div>

			<div class="form-group">
				<label for="project_name">Project Details</label>
				<?php echo form_error('project_name'); ?>
				<textarea class="form-control" rows="5"></textarea>
			</div>
			
	</div>
	<div class="col-lg-6">
			<div class="form-group">
				<label for="project_name">Project Owner</label>
				<?php echo form_error('project_name'); ?>
				<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
			</div>

			<div class="form-group">
				<label for="prjclassification_id">Project Classification</label>
				<?php echo form_error('prjclassification_id'); ?>
				<select class="form-control" data-placeholder="SELECT PROJECT CLASSIFICATION" id="prjclassification_id" name="prjclassification_id" class="medium" >
					<option value="0"></option>
					<?php foreach($prjclassifications as $prjclassification){?>
						<option value="<?php echo $prjclassification['id'];?>" <?php echo set_select('prjclassification_id',$prjclassification['id']); ?> ><?php echo $prjclassification['prjclassification_desc'];?></option>
					<?}?>
				</select>
			</div>

			<div class="form-group">
				<label for="prjcategory_id">Project Category</label>
				<?php echo form_error('prjcategory_id'); ?>
				<select class="form-control" data-placeholder="SELECT PROJECT CATEGORY" id="prjcategory_id" name="prjcategory_id" class="medium" >
					<option value="0"></option>
					<?php foreach($prjcategories as $prjcategory){?>
						<option value="<?php echo $prjcategory['id'];?>" <?php echo set_select('prjcategory_id',$prjcategory['id']); ?> ><?php echo $prjcategory['prjcategory_desc'];?></option>
					<?}?>
				</select>
			</div>

			<div class="form-group">
				<label for="project_name">Project Sub Category</label>
				<?php echo form_error('project_name'); ?>
				<select class="form-control" data-placeholder="SELECT prjstatus" id="prjstatus_id" name="prjstatus_id" class="medium" >
					<option value="0"></option>
					<?php foreach($prjstatuss as $prjstatus){?>
						<option value="<?php echo $prjstatus['id'];?>" <?php echo set_select('prjstatus_id',$prjstatus['id']); ?> ><?php echo $prjstatus['prjstatus'];?></option>
					<?}?>
				</select>
			</div>

			<div class="form-group">
				<label for="prjstage_id">Project Stage</label>
				<?php echo form_error('prjstage_id'); ?>
				<select class="form-control" data-placeholder="SELECT PROJECT STAGE" id="prjstage_id" name="prjstage_id" class="medium" >
					<option value="0"></option>
					<?php foreach($prjstages as $prjstage){?>
						<option value="<?php echo $prjstage['id'];?>" <?php echo set_select('prjstage_id',$prjstage['id']); ?> ><?php echo $prjstage['prjstage_desc'];?></option>
					<?}?>
				</select>
			</div>

			<div class="form-group">
				<label for="prjstatus_id">Project Status</label>
				<?php echo form_error('project_name'); ?>
				<select class="form-control" data-placeholder="SELECT PROJECT STATUS" id="prjstatus_id" name="prjstatus_id" class="medium" >
					<option value="0"></option>
					<?php foreach($prjstatuses as $prjstatus){?>
						<option value="<?php echo $prjstatus['id'];?>" <?php echo set_select('prjstatus_id',$prjstatus['id']); ?> ><?php echo $prjstatus['prjstatus_desc'];?></option>
					<?}?>
				</select>
			</div>

			<div class="form-group">
				<label for="project_name">Project Estimated Amount</label>
				<?php echo form_error('project_name'); ?>
				<input id="project_name" class="form-control" type="text" value="" name="project_name" placeholder="Project Name">
			</div>
	</div>
	<div class="col-lg-6">
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