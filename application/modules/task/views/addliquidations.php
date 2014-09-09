<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Liquidations</h1>				
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
			<label for="lot">Date Used</label>
			<?php echo form_error('lot'); ?>
			<input value="<?php echo set_value('lot'); ?>" id="lot" class="form-control" type="text" value="" name="lot" placeholder="Date Used">
		</div>

		<div class="form-group">
			<label for="details">Advance Details</label>
			<?php echo form_error('details'); ?>
			<textarea name="details" id="details" class="form-control" rows="6" placeholder="Details"></textarea>
		</div>

		<div class="form-group">
			<label for="type_id">Type</label>
			<?php echo form_error('type_id'); ?>
			<select class="form-control" data-placeholder="ADVANCE TYPE" id="type_id" name="type_id" class="medium" >
				<option value="0"></option>
				<?php foreach($types as $type){?>
					<option value="<?php echo $type['id'];?>" <?php echo set_select('type_id',$type['id']); ?> ><?php echo strtoupper($type['grouptype_desc']);?></option>
				<?}?>
			</select>
		</div>

		<div class="form-group">
			<label for="lot">Amount</label>
			<?php echo form_error('lot'); ?>
			<input value="<?php echo set_value('lot'); ?>" id="lot" class="form-control" type="text" value="" name="lot" placeholder="Amount">
		</div>
	</div>

	<div class="col-lg-12">
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('task/liquidations/'.$project['id']); ?>">Back</a>
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