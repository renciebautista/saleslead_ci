<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">'<?php echo $requesttype['requesttype']; ?>' Approver List</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>

<div class="row">
    <div class="col-lg-12 header-button">
    	<a class="btn btn-default" href="<?php echo base_url('requesttype'); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get' , 'class' => 'form-validate')); ?>
			<div class="pull-right">
				<a href="<?php echo base_url('requesttype/addapprover/'.$requesttype['id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Approver</a>		
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
						<th>Full Name</th>
						<th>Department</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($approvers) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($approvers as $row):?>
					<tr>
						<td><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?></td>
						<td><?php echo $row['department'] ?></td>
						<td style="width:100px;text-align: center;">
							<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
							<?php echo form_hidden('_id', $row['user_id']); ?>
							<?php echo form_hidden('requesttype_id', $requesttype['id']); ?>
							<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="submitLink" name="submit" type="submit" value="Delete">
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
