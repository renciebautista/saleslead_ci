<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Projects with Contacts for Approval</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12 header-button">
        <a class="btn btn-default" href="<?php echo base_url('dashboard'); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
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
							<strong><?php echo $project['project_name']; ?></strong>
							<br>
							<i>	<?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'].' '.$project['province'])); ?></i><br>
						</td>
						<td>
							<?php echo strtoupper($project['last_name'].', '.$project['first_name'].' '.$project['middle_name']); ?>
						</td>
						<td class="action-center" style="width:120px;">
							<a href="<?php echo base_url('project/contactlist/'.$project['id']); ?>">View</a><br>
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
