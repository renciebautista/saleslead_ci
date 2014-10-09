<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete Company</h1>		
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<?php //debug($this->_ci_cached_vars);?>
<div class="row">

	<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
	<?php echo form_hidden('_id', $company['id']); ?>
	<div class="col-lg-6">
			<div class="form-group">
				<label for="company_name">Company Name</label>
				<?php echo form_error('company_name'); ?>
				<input id="company_name" class="form-control" type="text" value="<?php echo set_value('company_name',$company['company']); ?>" name="company_name" placeholder="Company Name" readonly="">
			</div>

			<div class="form-group">
				<label for="address">Company Address</label>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="lot">Lot / Blk / House No. / Unit No.</label>
							<?php echo form_error('lot'); ?>
							<input value="<?php echo set_value('lot',$company['lot']); ?>" id="lot" class="form-control" type="text" name="lot" placeholder="Lot / Blk / House No. / Unit No." readonly="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="street">Street</label>
							<?php echo form_error('street'); ?>
							<input value="<?php echo set_value('street',$company['street']); ?>" id="street" class="form-control" type="text" name="street" placeholder="Street" readonly="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="brgy">Brgy. / Subdivision</label>
							<?php echo form_error('brgy'); ?>
							<input value="<?php echo set_value('brgy',$company['brgy']); ?>" id="brgy" class="form-control" type="text" name="brgy" placeholder="Brgy. / Subdivision" readonly="">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="city">Town / City</label>
							<?php echo form_error('city'); ?>
							<input value="<?php echo set_value('city',$company['city'].' - '.$company['province']); ?>" id="city" class="form-control" type="text" name="city" placeholder="Town / City" readonly="">
						</div>
					</div>
				</div>
		
				<?php if(count($companytypes) > 0): ?>
				<div class="form-group">
					<label>Company Type</label>
					<ul class="list-unstyled">
				<?php foreach ($companytypes as $companytype):?>
					<li><?php echo $companytype['companytype']; ?></li>

				<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>

				

			</div>
			
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('company'); ?>">Back</a>
		</div>
	</div>
	
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->

