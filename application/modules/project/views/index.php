<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Public Projects</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get' ,'class' => 'form-validate')); ?>
			
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
						<th>Assigned To</th>
						<th>Created By</th>
						<th>Actions</th>
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
							<strong><?php echo $project['project_name']; ?></strong><br>
							<i>	<?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].' '.$project['city'].' '.$project['province'])); ?></i><br>
						</td>
						<td><?php echo strtoupper($project['assigned_to_name']); ?></td>
						<td>
							<?php echo strtoupper($project['last_name'].', '.$project['first_name'].' '.$project['middle_name']); ?>
						</td>

						<td>
							<a href="<?php echo base_url('project/join/'.$project['id']) ?>">Join Project</a>
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
