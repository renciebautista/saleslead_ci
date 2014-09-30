<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">For Assigning Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div id="project-details" class="col-lg-12">
		<table class="table">
			<tbody>
				<tr>
					<td>Project Number</td>
					<td><?php echo $project['id']; ?></td>
				</tr>
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
	<div class="col-lg-12">
		
		<div id="tab">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#details" role="tab" data-toggle="tab" >Project Details</a></li>
				<li><a href="#classifications" role="tab" data-toggle="tab" >Project Classification</a></li>
				<li><a href="#category" role="tab" data-toggle="tab" >Project Category</a></li>
				<li><a href="#stage" role="tab" data-toggle="tab" >Project Stage</a></li>
				<li><a href="#status" role="tab" data-toggle="tab" >Project Status</a></li>
				<li><a href="#specification" role="tab" data-toggle="tab" >Paint Specification</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="details">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Details
					</div>
					<?php if(!empty($details)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($details as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p><?php echo nl2br($row['details']); ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="classifications">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Classifications
					</div>
					<?php if(!empty($classifications)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($classifications as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p>Updated to <?php echo $row['prjclassification_desc']; ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="category">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Category
					</div>
					<?php if(!empty($categories)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($categories as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p>Updated to <?php echo($row['prjcategory_desc']); ?> <?php echo (!empty($row['prjsubcategory_desc']) ? ' - '.$row['prjsubcategory_desc'] :''); ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="stage">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Stage
					</div>
					<?php if(!empty($stages)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($stages as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p>Updated to <?php echo($row['prjstage_desc']); ?></p>
										<p><?php echo nl2br($row['remarks']); ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="status">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Status
					</div>
					<?php if(!empty($status)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($status as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p>Updated to <?php echo($row['prjstatus_desc']); ?></p>
										<p><?php echo nl2br($row['remarks']); ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="specification">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Details
					</div>
					<?php if(!empty($details)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($details as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p><?php echo nl2br($row['details']); ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

		
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-user"></i> Assign Project To
			</div>
			
			<div class="panel-body">
				<div class="col-lg-6">
					<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
					<?php echo form_hidden('project_id', $project['id']); ?>
						<div class="form-group">
							<label for="assigned_to">Assign To</label>
							<?php echo form_error('assigned_to'); ?>
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
		</div>	
	</div>							
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function() {
	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			assigned_to: {
				is_natural_no_zero: true,
				required: true
			}
		},
		errorPlacement: function(error, element){
			error.insertAfter(element.siblings("label"));
		}
	});
	$("#assigned_to").chosen({allow_single_deselect: true});
});
</script>
