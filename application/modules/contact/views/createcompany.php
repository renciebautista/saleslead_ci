<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Company</h1>	
		<?php echo $this->session->flashdata('message');?>							
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">

	<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
	<div class="col-lg-6">
			<div class="form-group">
				<label for="company_name">Company Name</label>
				<?php echo form_error('company_name'); ?>
				<input id="company_name" class="form-control" type="text" value="<?php echo set_value('company_name'); ?>" name="company_name" placeholder="Company Name">
			</div>

			<div class="form-group">
				<label for="address">Company Address</label>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="lot">Lot / Blk / House No. / Unit No.</label>
							<?php echo form_error('lot'); ?>
							<input value="<?php echo set_value('lot'); ?>" id="lot" class="form-control" type="text" value="" name="lot" placeholder="Lot / Blk / House No. / Unit No.">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="street">Street</label>
							<?php echo form_error('street'); ?>
							<input value="<?php echo set_value('street'); ?>" id="street" class="form-control" type="text" value="" name="street" placeholder="Street">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="brgy">Brgy. / Subdivision</label>
							<?php echo form_error('brgy'); ?>
							<input value="<?php echo set_value('brgy'); ?>" id="brgy" class="form-control" type="text" value="" name="brgy" placeholder="Brgy. / Subdivision">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="city_id">Town / City</label>
							<?php echo form_error('city_id'); ?>
							<select class="form-control" data-placeholder="SELECT TOWN / CITY" id="city_id" name="city_id" class="medium" >
								<option value="0"></option>
								<?php foreach($cities as $city):?>
									<option value="<?php echo $city['id'];?>" <?php echo set_select('city_id',$city['id']); ?> ><?php echo strtoupper($city['city'].' - '.$city['province']);?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
				</div>
		

				<div class="form-group">
					<label>Company Type</label>
					<?php echo form_error('companytype[]'); ?>
				<?php if(count($companytypes) > 0): ?>
				<?php foreach ($companytypes as $companytype):?>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="companytype[]" name="companytype[]" value="<?php echo $companytype['id']; ?>" <?php echo set_checkbox('companytype[]', $companytype['id']); ?> /><?php echo $companytype['companytype']; ?>
						</label>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
				</div>

				

			</div>
			
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('contact/create'); ?>">Back</a>
		</div>
	</div>
	
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


<script type="text/delayscript">
$(document).ready(function() {
	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			company_name: "required",
			brgy: "required",
			city_id: {
				required: true,
				is_natural_no_zero: true
			},
			grouptype: "required",
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});

	$("#city_id").chosen({allow_single_deselect: true});
});
</script>