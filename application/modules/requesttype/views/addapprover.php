<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Available User List</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12 header-button">
    	<a class="btn btn-default" href="<?php echo base_url('requesttype/approver/'.$requesttype_id); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get','class' => 'form-validate')); ?>
			
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
						<th>Full Name</th>
						<th>Department</th>
						<th>Group</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($users) < 1): ?>
					<tr>
						<td colspan="2">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($users as $user):?>
					<tr>
						<td><?php echo strtoupper($user['last_name'].', '.$user['first_name'].' '.$user['middle_name']); ?></td>
						<td><?php echo $user['department'] ?></td>
						<td><?php echo $user['ugrp_name'] ?></td>
						<td style="width:100px;text-align: center;">
							<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
							<?php echo form_hidden('_id', $user['id']); ?>
							<?php echo form_hidden('requesttype_id', $requesttype_id); ?>
							<input class="submitLink" name="submit" type="submit" value="Add">
							<?php echo form_close(); ?>
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
