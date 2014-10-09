<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete Paint Specifications</h1>		
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
				<input id="type" class="form-control" type="text" value="<?php echo set_value('type',$specs['painttype']); ?>" name="type" placeholder="Type" readonly="">
			</div>

			<div class="form-group">
				<label for="area">Area (SqM)</label>
				<?php echo form_error('area'); ?>
				<input id="area" class="form-control" type="text" value="<?php echo set_value('area',number_format($specs['area'],2)); ?>" name="area" placeholder="Area (SqM)" readonly="">
			</div>

			<div class="form-group">
				<label for="paint">Paint Requirement (Ltrs)</label>
				<?php echo form_error('paint'); ?>
				<input id="paint" class="form-control" type="text" value="<?php echo set_value('paint',number_format($specs['paint'],2)); ?>" name="paint" placeholder="Paint Requirement (Ltrs)" readonly="">
			</div>

			<div class="form-group">
				<label for="cost">Painting Cost (Php)</label>
				<?php echo form_error('cost'); ?>
				<input id="cost" class="form-control" type="text" value="<?php echo set_value('cost',number_format($specs['cost'],2)); ?>" name="cost" placeholder="Painting Cost (Php)" readonly="">
			</div>
			<div class="form-group">
				<label for="details">Details</label>
				<?php echo form_error('details'); ?>
				<textarea id="details" class="form-control" placeholder="Details" rows="3" name="details" readonly=""><?php echo set_value('details',$specs['details']); ?></textarea>
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('contact/updatespecification/'.$specs['project_contact_id']); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


