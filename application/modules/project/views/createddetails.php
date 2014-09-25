<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 header-button">
		<a class="btn btn-default" href="<?php echo base_url('project/created'); ?>">
			<i class="fa fa-reply"></i> Back
		</a>
	</div>
	<!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->


<?php $this->load->view('shared/project/_project_name_address'); ?>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<?php echo form_open('project/addcontacts',array('id' => 'myForm')); ?>
			<?php echo form_hidden('group_id', ''); ?>
			<?php echo form_hidden('project_id', $project['id']); ?>
			<div class="modal-body">
				
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="contact_id">Contact Name</label>
							<?php echo form_error('contact_id'); ?>
							<input value="<?php echo set_value('contact_id'); ?>" id="contact_id" class="form-control" type="text" name="contact_id" placeholder="Contact Name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="company_name">Company Name</label>
							<?php echo form_error('company_name'); ?>
							<input value="<?php echo set_value('company_name'); ?>" id="company_name" class="form-control" type="text" name="company_name" placeholder="Company Name" readonly="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="address">Company Address</label>
							<?php echo form_error('address'); ?>
							<input value="<?php echo set_value('address'); ?>" id="address" class="form-control" type="text" name="address" placeholder="Company Address" readonly="">
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button id="modal-submit" type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div id="tab">
			<ul class="nav nav-tabs" role="tablist">
				<?php foreach ($types as $type):?>
				<li><a href="#tab-<?php echo $type['id'] ?>" role="tab" data-toggle="tab"><?php echo ucwords(strtolower($type['grouptype_desc'])); ?></a></li>
				<?php endforeach; ?>
				<!-- <li class="active"><a href="#details" role="tab" data-toggle="tab">Project Details</a></li>
				<li><a href="#classification" role="tab" data-toggle="tab">Project Classification</a></li>
				<li><a href="#category" role="tab" data-toggle="tab">Project Category</a></li>
				<li><a href="#stage" role="tab" data-toggle="tab">Project Stage</a></li>
				<li><a href="#status" role="tab" data-toggle="tab">Project Status</a></li>
				<li><a href="#specification" role="tab" data-toggle="tab">Paint Specification</a></li>
				<li><a href="#files" role="tab" data-toggle="tab">Files</a></li>
				<li><a href="#tasks" role="tab" data-toggle="tab">Task</a></li> -->
			</ul>
		</div>


		<div class="tab-content">
			<?php foreach ($types as $type):?>
				<div class="tab-pane" id="tab-<?php echo $type['id'] ?>">
					<div class="row">
						<div class="col-lg-12 header-button">
							<button id="<?php echo $type['id'] ?>" class="btn btn-success modal-button pull-right">
								<i class="fa fa-plus"></i> <?php echo ucwords(strtolower($type['grouptype_desc'])); ?>
							</button>
						</div>
						<!-- /.col-lg-12 -->                        
					</div>
					<!-- /.row -->

					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<table id="data-table-<?php echo $type['id'] ?>" class="table table-hover data-table">
									<thead>
										<tr>
											<th>Project Name</th>
											<th>Address</th>
										</tr>
									</thead>
									
									<tfoot>
										<tr>
											<th>Project Name</th>
											<th>Address</th>
										</tr>
									</tfoot>

								</table>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

		
</div>
<!-- /.row -->
<script type="text/delayscript">
$(document).ready(function() {
	 $('table.display').dataTable();

	$("#modal-submit").click(function(e){
		e.preventDefault();

		$.ajax({
			url:domain + '/project/addcontacts',
			type:"POST",
			data:$('#myForm').serialize(),
			dataType:"json",
			success: function(data){
				if(data.status == 'ok'){
					alert('Contact successfuly created!');
					$("#addModal").modal('hide');

				}else{
					alert('Cannot proccess this activity!');
				}
			}
		})
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		console.log( e.target);
		$('#data-table-').dataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url":domain + '/project/contacts',
			},
			"columns": [
				{ "data": "project_name" },
				{ "data": "address" }
			],
		});
	})

	

	$('.modal-button').on("click", function(){
		$("#addModal").modal('show');
		$("#addModal #myModalLabel").html('New' + $(this).text());
		$("#myForm").find('input:hidden[name=group_id]').val($(this).attr('id'));
	});

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
} );
</script>