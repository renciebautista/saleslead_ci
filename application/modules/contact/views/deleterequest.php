<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete Request</h1>	
		<?php echo $this->session->flashdata('message');?>					
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<?php $this->load->view('shared/project/_project_name_address'); ?>

<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $request['id']); ?>
			
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
				<?php echo form_error('particular'); ?>
				<textarea id="particular" name="particular" class="form-control" rows="5" placeholder="Particulars / Description" readonly=""><?php echo set_value('particular',$request['particular'] ); ?></textarea>
			</div>
			<div class="form-group">
				<label for="remarks">Remarks / Instruction</label>
				<?php echo form_error('remarks'); ?>
				<textarea id="remarks" name="remarks" class="form-control" rows="5" placeholder="Remarks / Instruction" readonly=""><?php echo set_value('remarks',$request['remarks'] ); ?></textarea>
			</div>
			<div class="form-group">
				<label for="amount">Amount</label>
				<?php echo form_error('amount'); ?>
				<input value="<?php echo set_value('amount', number_format($request['amount'],2)); ?>" id="amount" class="form-control" type="text" value="" name="amount" placeholder="Amount" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('contact/request/'.$project['project_contact_id']); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function(){
	$("#requesttype_id").chosen({allow_single_deselect: true});
	$("#date_needed").mask("99/99/9999");
	$('#amount').maskMoney();

	$('#datetimepicker5').datetimepicker({
		pickTime: false
	});

	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			requesttype_id:{
				is_natural_no_zero: true
			},
			// request_type: "required",
			date_needed: "required",
			particular: "required",
			remarks: "required",
			amount: "required"
		},
		errorPlacement: function(error,element){
			error.insertAfter(element.siblings("label"));
		}
	});
});
</script>
