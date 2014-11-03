<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Requests Approval</h1>	
		<?php echo $this->session->flashdata('message');?>			
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
						<th>Request Type</th>
						<th class="action-center">Total Request</th>
						<th class="action-center" style="width:120px;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($requestapprovals) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($requestapprovals as $row):?>
					<tr>
						<td>
							<?php echo $row['requesttype']; ?>
						</td>
						<td class="action-center">
							<?php echo $row['total_request']; ?>
						</td>
						<td class="action-center" style="width:120px;">
							<a href="<?php echo base_url('requestapproval/'.$row['requesttype_id']); ?>">View</a><br>
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
