<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div id="project-details" class="col-lg-12">
		<table class="table">
			<tbody>
				<tr>
					<td>Project Name</td>
					<td><?php echo $project['project_name']; ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'].' '.$project['province'])); ?></td>
				</tr>
				
				<tr>
					<td>Created By</td>
					<td><?php echo strtoupper($project['last_name'].', '.$project['first_name'].' '.$project['middle_name']); ?></td>
				</tr>
				<tr>
					<td>Date Created</td>
					<td><?php echo date_format(date_create($project['created_at']),'m/d/Y H:i:s'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
		<?php echo form_hidden('project_id', $project['id']); ?>
			<div class="form-group">
				<label for="assigned_to">Assign To</label>
				<?php echo form_error('role'); ?>
				<select class="form-control" data-placeholder="ASSIGN TO" id="assigned_to" name="assigned_to" class="medium" >
					<option value="0"></option>
					<?php foreach($users as $user){?>
						<option value="<?php echo $user['id'];?>" <?php echo set_select('assigned_to',$user['id']); ?> ><?php echo strtoupper($user['last_name'].', '.$user['first_name'].' '.$user['middle_name']);?></option>
					<?}?>
				</select>
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('project/forassigning'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function() {
	$("#assigned_to").chosen({allow_single_deselect: true});
});
</script>
