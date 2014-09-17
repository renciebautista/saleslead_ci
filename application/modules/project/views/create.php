<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Project</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">

	<?php echo form_open('',array('role' => 'form')); ?>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="project_name">Project Name</label>
			<?php echo form_error('project_name'); ?>
			<input id="project_name" class="form-control" type="text" value="<?php echo set_value('project_name'); ?>" name="project_name" placeholder="Project Name">
		</div>

		<div class="form-group">
			<label for="project_address">Project Address</label>
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
							<?php foreach($cities as $city){?>
								<option value="<?php echo $city['id'];?>" <?php echo set_select('city_id',$city['id']); ?> ><?php echo strtoupper($city['city'].' - '.$city['province']);?></option>
							<?}?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="type_id">Contact Type</label>
						<?php echo form_error('type_id'); ?>
						<select class="form-control" data-placeholder="SELECT CONTACT TYPE" id="type_id" name="type_id" class="medium" >
							<option value="0"></option>
							<?php foreach($types as $type){?>
								<option value="<?php echo $type['id'];?>" <?php echo set_select('type_id',$type['id']); ?> ><?php echo strtoupper($type['grouptype_desc']);?></option>
							<?}?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="contact_id">Contact Name</label>
						<?php echo form_error('contact_id'); ?>
						<input value="<?php echo set_value('contact_id'); ?>" id="contact_id" class="form-control" type="text" value="" name="contact_id" placeholder="Contact Name">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="company_name">Company Name</label>
						<?php echo form_error('company_name'); ?>
						<input value="<?php echo set_value('company_name'); ?>" id="company_name" class="form-control" type="text" value="" name="company_name" placeholder="Company Name" readonly="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="address">Company Address</label>
						<?php echo form_error('address'); ?>
						<input value="<?php echo set_value('address'); ?>" id="address" class="form-control" type="text" value="" name="address" placeholder="Company Address" readonly="">
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="col-lg-12">
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('project'); ?>">Back</a>
		</div>
	</div>
	
	<?php echo form_close(); ?>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


<script type="text/delayscript">
$(document).ready(function() {
	$("#city_id,#type_id").chosen({allow_single_deselect: true});

	$('#company_name').val('');
	$('#address').val('');

	$('#contact_id').select2({
		initSelection: function(element, callback) {
		    var id;
		    id = $(element).val();
		    if (id !== "") {
		      	return $.ajax({
		        	url: domain + '/contact/info', 
		        	dataType: "json",
		        	data: {
		          		id: id
		        	}
		      	}).done(function(data) {
		        callback(data.contacts);
		        $('#company_name').val(data.contacts.company);
		        $('#address').val(data.contacts.address);
		      	});
		    }
		},
		placeholder: "Contact Name",
		allowClear: true,
		minimumInputLength: 3,
		ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
			url: domain + '/contact/lists', 
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term, // search term
					page_limit: 10,
				};
			},
			results: function (data, page) { // parse the results into the format expected by Select2.
				//console.log(data);
				// since we are using custom formatting functions we do not need to alter remote JSON data
				return {results: data.contacts};
			}
		},
		formatResult: contactformatSelection,
		escapeMarkup: function(m) { return m; }
	}).on("select2-selecting", function(e) {
		$('#company_name').val(e.object.company);
		$('#address').val(e.object.address);
    }).on("select2-removed", function(e) {
    	$('#company_name').val('');
    	$('#address').val('');
    });

});
</script>