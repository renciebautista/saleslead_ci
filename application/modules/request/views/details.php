<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">'<?php echo $requesttype['requesttype'];?>' Request</h1>	
		<?php echo $this->session->flashdata('message');?>					
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<?php $this->load->view('shared/project/_project_name_address'); ?>

<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
	<?php echo form_hidden('_id', $request['id']); ?>
	<div class="col-lg-6">
		

			<div class="form-group">
				<label for="request_by">Requested By</label>
				<input id="request_by" class="form-control" type="text" name="request_by" placeholder="Requested By" value="<?php echo strtoupper($request['last_name'].', '.$request['first_name'].' '.$request['middle_name']); ?>" readonly="">
			</div>
			
			<div class="form-group">
				<label for="request_type">Request Type</label>
				<input id="request_type" class="form-control" type="text" name="request_type" placeholder="Request Type" value="<?php echo $request['requesttype']; ?>" readonly="">
			</div>

			<div class="form-group">
				<label for="date_needed">Date Needed</label>
				<input id="date_needed" class="form-control" type="text" name="date_needed" placeholder="Request Type" value="<?php echo date_format(date_create($request['date_needed']),'m/d/Y'); ?>" readonly="">
			</div>
			
			<div class="form-group">
				<label for="particular">Particulars / Description</label>
				<textarea id="particular" name="particular" class="form-control" rows="5" placeholder="Particulars / Description" readonly=""><?php echo set_value('particular',$request['particular'] ); ?></textarea>
			</div>
			<div class="form-group">
				<label for="remarks">Remarks / Instruction</label>
				<textarea id="remarks" name="remarks" class="form-control" rows="5" placeholder="Remarks / Instruction" readonly=""><?php echo set_value('remarks',$request['remarks'] ); ?></textarea>
			</div>
			<div class="form-group">
				<label for="amount">Amount</label>
				<input value="<?php echo set_value('amount', number_format($request['amount'],2)); ?>" id="amount" class="form-control" type="text" value="" name="amount" placeholder="Amount" readonly="">
			</div>

			<div class="form-group">
				<label for="approved_amount">Approved Amount</label>
				<?php echo form_error('approved_amount'); ?>
				<input id="approved_amount" class="form-control" type="text" value="" name="approved_amount" placeholder="Approved Amount">
			</div>
			<div class="form-group">
				<label for="approval_remarks">Remarks</label>
				<?php echo form_error('approval_remarks'); ?>
				<textarea id="approval_remarks" name="approval_remarks" class="form-control" rows="5" placeholder="Remarks"></textarea>
			</div>
	</div>
	<!-- /.col-lg-6 -->	
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-list-alt"></i> Project Request Summary
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Request Type</th>
								<th style="width:30%;text-align: right;">Amount</th>
							</tr>
						</thead>
						<tbody>
						<?php $total = 0; ?>
						<?php if(count($costs) < 1): ?>
							<tr>
								<td colspan="2">No record found.</td>
							</tr>
						<?php else: ?>
						<?php foreach ($costs as $row):?>
						<?php $total += $row['total_approved']; ?>
							<tr>
								<td><a href=""><?php echo $row['requesttype']; ?></a></td>
								<td style="width:30%;text-align: right;"><?php echo number_format($row['total_approved'],2); ?></td>
							</tr>
						<?php endforeach; ?>
						<?php endif; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>Total Amount</th>
								<th style="width:30%;text-align: right;"><?php echo number_format($total,2); ?></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-lg-6 -->		

	<div class="col-lg-12">		
		<input class="btn btn-success" type="submit" name="submit" value="Approve">
		<input class="btn btn-danger" type="submit" name="submit" value="Deny">
		<a class="btn btn-default" href="<?php echo base_url('request/approval/'.$request['requesttype_id']); ?>">Back</a>
	</div>	
	<?php echo form_close(); ?>	
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function(){
	$('#approved_amount').maskMoney();

	$('.btn-danger').click(function (e) {
	    $('.form-validate').find('#approved_amount').rules('remove', 'required');
	    $('.form-validate').removeClass("error");

	});

	$('.btn-success').click(function (e) {
	    $('.form-validate').find('#approved_amount').rules('add', 'required');
	});

	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			approval_remarks: "required"
		},
		errorPlacement: function(error,element){
			error.insertAfter(element.siblings("label"));
		}
	});
});
</script>
