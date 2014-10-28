<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Request Types</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get' , 'class' => 'form-validate')); ?>
			<div class="pull-right">
				<a href="<?php echo base_url('requesttype/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Request Type</a>		
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
						<th>Request Types</th>
						<th>Approver</th>
						<th>Releaser</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($requesttypes) < 1): ?>
					<tr>
						<td colspan="2">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($requesttypes as $row):?>
					<tr>
						<td><?php echo $row['requesttype']; ?></td>
						<td><a href="<?php echo base_url('requesttype/approver/'.$row['id']); ?>">Manage Approver</a></td>
						<td><a href="<?php echo base_url('requesttype/releaser/'.$row['id']); ?>">Manage Releaser</a></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('requesttype/edit/'.$row['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('requesttype/delete/'.$row['id']); ?>" >Delete</a>
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
