<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Created Projects</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get' ,'class' => 'form-validate')); ?>
			<div class="option-fields">
				<label class="radio-inline">
					<input id="status" type="radio" value="0" name="s" <?php echo set_radio('s', '1', ($status == 0) ? TRUE:FALSE); ?>>For Assigning
				</label>
				<label class="radio-inline">
					<input id="status" type="radio" value="1" name="s" <?php echo set_radio('s', '1', ($status == 1) ? TRUE:FALSE); ?>>Assigned
				</label>
				<label class="radio-inline">
					<input id="status" type="radio" value="2" name="s" <?php echo set_radio('s', '2', ($status == 2) ? TRUE:FALSE); ?>>Closed
				</label>
				<label class="radio-inline">
					<input id="status" type="radio" value="3" name="s" <?php echo set_radio('s', '3', ($status == 3) ? TRUE:FALSE); ?>>All
				</label>
			</div>

			<div class="pull-right">
				<a href="<?php echo base_url('project/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Project</a>		
			</div>
			
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
						<th class="action-center" style="width:120px;">Date Created</th>
						<th>Project Name</th>
						<th class="action-center" style="width:150px;">Status</th>
						<th class="action-center" style="width:100px;">Actions</th>
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
						<td class="action-center" style="width:120px;">
							<?php echo date_format(date_create($project['created_at']),'m/d/Y'); ?>
						</td>
						<td>
							<strong><?php echo $project['project_name']; ?></strong><br>
							<i>	<?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'].' '.$project['province'])); ?></i><br>
						</td>
						<td class="action-center" style="width:150px;">
							<?php echo $project['status']; ?>
						</td>
						<td class="action-center" style="width:100px;">
							<a href="<?php echo base_url('project/created/'.$project['id']) ?>">View</a>
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
