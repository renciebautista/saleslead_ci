<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div id="project-details" class="col-lg-12">
		<table class="table">
			<tbody>
				<tr>
					<td>Project Name</td>
					<td><?php echo $project['project_name']; ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'].' '.$project['province'])); ?></td>
				</tr>
				
				<tr>
					<td>Created By</td>
					<td><?php echo strtoupper($project['last_name'].', '.$project['first_name'].' '.$project['middle_name']); ?></td>
				</tr>
				<tr>
					<td>Date Created</td>
					<td><?php echo date_format(date_create($project['created_at']),'m/d/Y H:i:s'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('project_id', $project['id']); ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="type_id">Contact Type</label>
						<?php echo form_error('type_id'); ?>
						<select class="form-control" data-placeholder="SELECT CONTACT TYPE" id="type_id" name="type_id" class="medium" >
							<option value="0"></option>
							<?php foreach($types as $type):?>
								<option value="<?php echo $type['id'];?>" <?php echo set_select('type_id',$type['id']); ?> ><?php echo strtoupper($type['grouptype_desc']);?></option>
							<?php endforeach; ?>
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

			<div class="col-lg-12">
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="Submit">
					<a class="btn btn-default" href="<?php echo base_url('project'); ?>">Back</a>
				</div>
			</div>
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
		rules:{
			project_id:{
				is_natural_no_zero: true
			},
			type_id:{
				is_natural_no_zero: true
			},
			contact_id: "required"
		},
		messages:{
			contact_id: "This field is required."
		},
		errorPlacement: function(error, element){
			error.insertAfter(element.siblings("label"));
		}
	});

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
