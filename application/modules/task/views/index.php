<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">My Tasks</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get')); ?>
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
			<div class="option-fields">
				<label class="radio-inline">
					<input id="status" type="radio" value="0" name="s" <?php echo set_radio('s', '0', ($status == 0) ? TRUE:FALSE); ?>>Pending
				</label>
				<label class="radio-inline">
					<input id="status" type="radio" value="1" name="s" <?php echo set_radio('s', '1', ($status == 1) ? TRUE:FALSE); ?>>Closed
				</label>
			</div>
			<!-- /input-group -->
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get')); ?>
			
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
						<th>Task Name</th>
						<th>Target Date</th>
						<th>Last Update</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($tasks) < 1): ?>
					<!-- <tr>
						<td colspan="3">No record found.</td>
					</tr> -->
					<tr>
						<td>Call Client</td>
						<td>09/12/2014</td>
						<td>09/09/2014</td>
						<td><a href="<?php echo base_url('task/details') ?>">Details</a>
						</td>
					</tr>
				<?php else: ?>
				<?php foreach ($tasks as $task):?>
					<tr>
						<td>
							<?php echo $task['project_name']; ?><br>
							<i>	<?php echo ucwords(strtolower($task['lot'].' '.$task['street'].' '.$task['brgy'].' '.$task['city'].' '.$task['province'])); ?></i><br>
						</td>
						<td>
							<?php echo strtoupper($task['last_name'].', '.$task['first_name'].' '.$task['middle_name']); ?>
						</td>
						<td>
							<a href="<?php echo base_url('project/join/'.$task['id']) ?>">Join Project</a>
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
