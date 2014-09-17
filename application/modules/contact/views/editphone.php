<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit Phone</h1>			
		<?php echo $this->session->flashdata('message');?>					
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('phone_id', $phone['id']); ?>
			<div class="form-group">
				<label for="group">Phone Number</label>
				<?php echo form_error('phone_number'); ?>
				<input id="phone_number" class="form-control" type="text" value="<?php echo set_value('phone_number',$phone['phone_number']); ?>" name="phone_number" placeholder="Phone Number">
			</div>

			<div class="form-group">
				<label for="remarks">Remarks</label>
				<?php echo form_error('remarks'); ?>
				<textarea id="remarks" class="form-control" placeholder="Remarks..." rows="3" name="remarks"><?php echo set_value('remarks',$phone['remarks']); ?></textarea>
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('contact/phones/'.$contact['id']); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function() {	
	$(".form-validate").validate({
		errorElement: 'span',
		rules: {
			phone_number: {
				required: true,
				digits: true
			},
			remarks: "required"
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});

	$("#phone_number").ForceNumericOnly();
});
</script>


