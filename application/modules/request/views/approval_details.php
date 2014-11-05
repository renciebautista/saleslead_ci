<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">'<?php echo $request['requesttype'];?>' Requests</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12 header-button">
		<a class="btn btn-default" href="<?php echo base_url('request/approval'); ?>">
			<i class="fa fa-reply"></i> Back
		</a>
	</div>
	<!-- /.col-lg-12 -->                        
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Requested By</th>
						<th>Project Name</th>
						<th>Particulars / Description</th>
						<th>Amount<i>(Php)</i></th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($requests) < 1): ?>
					<tr>
						<td colspan="5">No record found.</td>
					</tr>

				<?php else: ?>
				<?php foreach ($requests as $row):?>
					<tr>
						
						<td>
							<?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?>
						</td>
						<td>
							<strong><?php echo $row['project_name']; ?></strong><br>
							<i>	<?php echo ucwords(strtolower($row['lot'].' '.$row['street'].' '.$row['brgy'].' '.$row['city'].' '.$row['province'])); ?></i><br>
						</td>
						<td>
							<?php echo nl2br($row['particular']); ?><br>
						</td>
						<td style="text-align:right;">
							<?php echo number_format($row['amount'],2); ?><br>
						</td>
						<td>
							<a href="<?php echo base_url('request/details/'.$row['id']) ?>">Details</a>
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
