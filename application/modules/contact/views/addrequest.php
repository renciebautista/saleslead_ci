<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Request</h1>	
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
		<?php echo form_hidden('project_contact_id', $project['project_contact_id']); ?>
			<div class="form-group">
				<label for="requesttype_id">Request Type</label>
				<?php echo form_error('requesttype_id'); ?>
				<select class="form-control" data-placeholder="SELECT REQUEST TYPE" id="requesttype_id" name="requesttype_id" class="medium" >
					<option value="0"></option>
					<?php foreach($requesttypes as $row){?>
						<option value="<?php echo $row['id'];?>" <?php echo set_select('requesttype_id',$row['id']); ?> ><?php echo $row['requesttype'];?></option>
					<?}?>
				</select>
			</div>
			<!-- <div class="form-group">
				<label for="others">Others</label>
				<?php //echo form_error('others'); ?>
				<input id="others" class="form-control" type="text" value="" name="others" placeholder="Others">
			</div> -->
			<div class="form-group">
				<label for="date_needed">Date Needed</label>
				<div class='input-group date' id='datetimepicker5'>
					<span class="input-group-addon">
						<span class="fa fa-calendar"></span>
					</span>
					<input type='text' class="form-control" name="date_needed" id="date_needed" placeholder="MM/DD/YYYY" data-date-format="MM/DD/YYYY"/>
					
				</div>
			</div>
			<div class="form-group">
				<label for="particular">Particulars / Description</label>
				<?php echo form_error('particular'); ?>
				<textarea id="particular" name="particular" class="form-control" rows="5" placeholder="Particulars / Description"></textarea>
			</div>
			<div class="form-group">
				<label for="remarks">Remarks / Instruction</label>
				<?php echo form_error('remarks'); ?>
				<textarea id="remarks" name="remarks" class="form-control" rows="5" placeholder="Remarks / Instruction"></textarea>
			</div>
			<div class="form-group">
				<label for="amount">Amount</label>
				<?php echo form_error('others'); ?>
				<input id="amount" class="form-control" type="text" value="" name="amount" placeholder="Amount">
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
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
			// others: "required",
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
