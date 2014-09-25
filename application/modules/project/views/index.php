<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Public Projects</h1>	
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
						<th>Address</th>
					</tr>
				</thead>
				
				<tfoot>
					<tr>
						<th>Project Name</th>
						<th>Address</th>
					</tr>
				</tfoot>

			</table>
		</div>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function() {
    $('.data-table').dataTable({
    	"processing": true,
        "serverSide": true,
        "ajax": {
        	"url":"project",
        },
        "columns": [
            { "data": "project_name" },
            { "data": "address" }
        ],
    });
} );
</script>