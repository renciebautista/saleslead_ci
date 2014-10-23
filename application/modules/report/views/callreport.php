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
			<?php echo form_open('',array('role' => 'search','class' => 'form-horizontal')); ?>
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
		   		<?php if(count($callreports)>0): ?>
		   			<input class="btn btn-success" type="submit" value="Print">
		   		<?php endif; ?>
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
						<th class="action-center" style="width:10px;">Day</th>
						<th class="action-center" style="width:100px;">Date</th>
						<th style="width:300px;">Company / Organization</th>
						<th style="width:300px;">Client / Designation</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($callreports) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($callreports as $row):?>
					<tr>
						<td class="action-center" style="width:10px;">
							<?php echo date('D',strtotime($row['created_at'])); ?>
						</td>
						<td class="action-center" style="width:100px;">
							<?php echo date_format(date_create($row['created_at']),'m/d/Y'); ?>
						</td>
						<td>
							<?php echo $row['project_name']; ?>
						</td>
						<td>
							<?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?><br>
							<em><?php echo $row['grouptype_desc']; ?></em>
						</td>
						<td>
							<?php if($row['group_id'] == 6): ?>
							<?php echo $row['remarks']; ?>
							<?php else: ?>
							<?php echo $row['details']; ?>
							<?php endif; ?>
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
