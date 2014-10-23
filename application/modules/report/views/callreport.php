<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Call Report</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
			<?php echo form_open('',array('role' => 'search', 'method' => 'get','class' => 'form-horizontal')); ?>
			<div class="col-lg-4">
		  		<div class="form-group">
		   			<label for="start_date" class="col-sm-4 control-label">Start Date</label>
		    		<div class="col-sm-8">
		      			<input type="text" class="form-control" id="start_date" name="start_date" placeholder="mm/dd/yyyy" value="<?php echo $start_date; ?>">
		    		</div>
		 		</div>
		   </div>
		   <div class="col-lg-4">
		  		<div class="form-group">
		   			<label for="end_date" class="col-sm-4 control-label">End Date</label>
		    		<div class="col-sm-8">
		      			<input type="text" class="form-control" id="end_date" name="end_date" placeholder="mm/dd/yyyy" value="<?php echo $end_date; ?>">
		    		</div>
		 		</div>
		   </div>
		   <div class="col-lg-4">
		  		<div class="form-group">
		   			<input class="btn btn-success" type="submit" value="Process">
		 		</div>
		   </div>
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
						<th class="action-center" style="width:120px;">Day</th>
						<th class="action-center" style="width:120px;">Date</th>
						<th>Company / Organization</th>
						<th>Client / Designation</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($callreports) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($callreports as $project):?>
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

<script type="text/delayscript">
$(document).ready(function() {
	$("#start_date,#end_date").mask("99/99/9999");
});
</script>
