<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit Paint Specifications</h1>		
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $specs['id']); ?>
			<div class="form-group">
				<label for="type">Type</label>
				<?php echo form_error('type'); ?>
				<select class="form-control" data-placeholder="SELECT TYPE" id="type" name="type" class="medium" >
					<option value="0"></option>
					<?php foreach($types as $type):?>
						<option value="<?php echo $type['id'];?>" <?php echo set_select('type',$type['id'],($type['id'] == $specs['painttype_id']) ? TRUE:FALSE); ?> ><?php echo $type['painttype'];?></option>
					<?php endforeach;?>
				</select>
			</div>

			<div class="form-group">
				<label for="area">Area (SqM)</label>
				<?php echo form_error('area'); ?>
				<input id="area" class="form-control" type="text" value="<?php echo set_value('area',number_format($specs['area'],2)); ?>" name="area" placeholder="Area (SqM)">
			</div>

			<div class="form-group">
				<label for="paint">Paint Requirement (Ltrs)</label>
				<?php echo form_error('paint'); ?>
				<input id="paint" class="form-control" type="text" value="<?php echo set_value('paint',number_format($specs['paint'],2)); ?>" name="paint" placeholder="Paint Requirement (Ltrs)">
			</div>

			<div class="form-group">
				<label for="cost">Painting Cost (Php)</label>
				<?php echo form_error('cost'); ?>
				<input id="cost" class="form-control" type="text" value="<?php echo set_value('cost',number_format($specs['cost'],2)); ?>" name="cost" placeholder="Painting Cost (Php)">
			</div>
			<div class="form-group">
				<label for="details">Details</label>
				<?php echo form_error('details'); ?>
				<textarea id="details" class="form-control" placeholder="Details" rows="3" name="details"><?php echo set_value('details',$specs['details']); ?></textarea>
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('contact/updatespecification/'.$specs['project_contact_id']); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


<script type="text/delayscript">
$(document).ready(function() {
	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			type: {
				required: true,
				is_natural_no_zero: true
			},
			area: "required",
			paint: "required",
			cost: "required",
			details: "required",
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});

	$("#type").chosen({allow_single_deselect: true});

	 $("#area,#paint,#cost").maskMoney();
});
</script>

