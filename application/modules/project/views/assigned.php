<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Assigned Projects</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('class' => 'navbar-form', 'role' => 'search', 'method' => 'get')); ?>
			<div class="input-group custom-search-form">
				<input type="text" name="q" class="form-control" placeholder="Search..." value="<?php echo $filter; ?>">
					<span class="input-group-btn">
					<button class="btn btn-default" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
			<!-- /input-group -->
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Project Name</th>
						<th>Created By</th>
						<th class="action-center" style="width:120px;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($projects) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($projects as $project):?>
					<tr>
						<td>
							<?php if(!$project['assigned_viewed']): ?>
							<strong><?php echo $project['project_name']; ?></strong>
							<?php else: ?>
							<?php echo $project['project_name']; ?>
							<?php endif; ?>
							<br>
							<i>	<?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'].' '.$project['province'])); ?></i><br>
						</td>
						<td>
							<?php echo strtoupper($project['last_name'].', '.$project['first_name'].' '.$project['middle_name']); ?>
						</td>
						<td class="action-center" style="width:120px;">
							<a href="<?php echo base_url('project/details/'.$project['id']); ?>">View</a><br>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
