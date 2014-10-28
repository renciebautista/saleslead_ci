<?php $this->load->view('shared/contact/_contact_update_header'); ?>

<div class="row">
	<div class="col-lg-12">
		
		<?php $this->load->view('shared/project/_update_project_details'); ?>

		<div class="tab-content">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-list-alt"></i> Request 
					</div>
					
					<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="pull-right">
										<a href="<?php echo base_url('contact/addrequest/'.$project['project_contact_id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Request</a>		
									</div>
								</div>
							</div>
						
							<div class="row">
								
								<div class="col-lg-12">

									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Date Created</th>
													<th>Request Type</th>
													<th>Particulars / Description</th>
													<th>Amount<i>(Php)</i></th>
													<th>Approved Amount<i>(Php)</i></th>
													<th>Status</th>
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
														<?php echo date_format(date_create($row['created_at']),'m/d/Y'); ?><br>
													</td>
													<td>
														<?php echo $row['requesttype']; ?><br>
													</td>
													<td>
														<?php echo nl2br($row['particular']); ?><br>
													</td>
													<td style="text-align:right;">
														<?php echo number_format($row['amount'],2); ?><br>
													</td>
													<td style="text-align:right;">
														<?php echo number_format($row['approved_amount'],2); ?><br>
													</td>
													<td>
														<?php echo $row['status']; ?><br>
													</td>
													<td>
														<?php if($row['status_id'] == 1): ?>
														<a href="<?php echo base_url('contact/editrequest/'.$row['id']) ?>">Edit</a>
														<a href="<?php echo base_url('contact/deleterequest/'.$row['id']) ?>">Delete</a>
														<?php else: ?>
														N/A
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
						</div>
					
				</div>
			</div>
		</div>
	</div>

		
</div>
<!-- /.row -->



<script type="text/delayscript">
$(document).ready(function() {	

	$('#files').MultiFile({
		STRING: {
				remove: 'Delete', 
				removeClass: 'btn btn-danger btn-xs',
			},
		duplicate: false
	});

	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			prjcat_id: {
				is_natural_no_zero: true,
				required: true
			},
			prjsubcat_id: {
				is_natural_no_zero: true,
				required: true
			}
		},
		errorPlacement: function(error, element) {  
			error.insertAfter(element.siblings("label"));
		}
	});

	$('select#prjcat_id').select_chain({
		child: "select#prjsubcat_id",
		child_value: "subcategory",
		default_value: "SELECT SUB CATEGORY",
		ajax_url : domain +"/prjcategory/subcategorylists"
	});
});
</script>

