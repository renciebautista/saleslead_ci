<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Task</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div id="contact-details" class="col-lg-12">
		<address>
		  	<span><strong><?php echo strtoupper($project['project_name']); ?></strong></span><br>
		  	<span><?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'])); ?></span><br>
		  	<span><?php echo ucwords(strtolower($project['province'])); ?></span><br>
		</address>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">

	<?php echo form_open('',array('role' => 'form')); ?>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="task_name">Task Name</label>
			<?php echo form_error('task_name'); ?>
			<input id="task_name" class="form-control" type="text" value="<?php echo set_value('task_name'); ?>" name="task_name" placeholder="Task Name">
		</div>

		<div class="form-group">
			<label for="details">Task Details</label>
			<?php echo form_error('details'); ?>
			<textarea name="details" id="details" class="form-control" rows="6" placeholder="Details"></textarea>
		</div>

		<div class="form-group">
			<label for="type_id">Assign To</label>
			<?php echo form_error('type_id'); ?>
			<select class="form-control" data-placeholder="ASSIGN TO" id="type_id" name="type_id" class="medium" >
				<option value="0"></option>
				<?php foreach($types as $type):?>
					<option value="<?php echo $type['id'];?>" <?php echo set_select('type_id',$type['id']); ?> ><?php echo strtoupper($type['grouptype_desc']);?></option>
				<?php endforeach;?>
			</select>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="lot">Start Date</label>
						<?php echo form_error('lot'); ?>
						<input value="<?php echo set_value('lot'); ?>" id="lot" class="form-control" type="text" value="" name="lot" placeholder="Start Date">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="street">End Date</label>
						<?php echo form_error('street'); ?>
						<input value="<?php echo set_value('street'); ?>" id="street" class="form-control" type="text" value="" name="street" placeholder="End Date">
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="lot">Start Time</label>
						<?php echo form_error('lot'); ?>
						<input value="<?php echo set_value('lot'); ?>" id="lot" class="form-control" type="text" value="" name="lot" placeholder="Start Time">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="street">End Time</label>
						<?php echo form_error('street'); ?>
						<input value="<?php echo set_value('street'); ?>" id="street" class="form-control" type="text" value="" name="street" placeholder="End Time">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('project/tasks/'.$project['id']); ?>">Back</a>
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