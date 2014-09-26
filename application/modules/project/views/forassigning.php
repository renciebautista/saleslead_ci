<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">For Assigning Projects</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover data-table">
				<thead>
					<tr>
						<th>Project Name</th>
						<th>Created By</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<script type="text/delayscript">
$(document).ready(function(){
	$('.data-table').dataTable({
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url":domain + "/project/forassigning",
		},
		"language": {
		     "processing": "<img src='"+domain+"/assets/plugins/DataTables-1.10.2/images/processing.gif'><br><br>Processing please wait.."
		},
		"columns": [
			{ "data": "project_name","width": "35%" },
			{ "data": "created_by" },
		],
	});
});
</script>