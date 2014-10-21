<?php $this->load->view('shared/contact/_contact_update_header'); ?>

<div class="row">
	<div class="col-lg-12">
		
		<?php $this->load->view('shared/project/_update_project_details'); ?>

		<div class="tab-content">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Status Update 
					</div>
					<?php if(!empty($status_histories)): ?>
					<div class="panel-body">
						<?php foreach ($status_histories as $row):?>
						<div class="thread">
							<div >
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/Y H:i:s'); ?>
								</small>
								</p>
							</div>
							<div>
								<p>Updated to <?php echo($row['prjstatus_desc']); ?></p>
								<p><?php echo nl2br($row['remarks']); ?></p>
							</div>
							<?php if(!empty($row['files'])): ?>
							<div class="attached-files">
								<ul>
									<?php foreach ($row['files'] as $file):?>
									<li><a href="<?php echo base_url('contact/getfile/'.$file['hashname']); ?>"><?php echo $file['filename']; ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif; ?>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<div class="panel-footer">
						<?php echo form_open_multipart('',array('role' => 'form', 'class' => 'form-validate')); ?>
						<?php echo form_hidden('project_contact_id', $project['project_contact_id']); ?>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="prjstatus_id">Project Status</label>
									<?php echo form_error('prjstatus_id'); ?>
									<select class="form-control" data-placeholder="SELECT STATUS" id="prjstatus_id" name="prjstatus_id" class="medium" >
										<option value="0">SELECT STATUS</option>
										<?php foreach($status as $stage){?>
											<option value="<?php echo $stage['id'];?>" <?php echo set_select('prjstatus_id',$stage['id']); ?> ><?php echo strtoupper($stage['prjstatus_desc']);?></option>
										<?}?>
									</select>
								</div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="remarks">Remarks</label>
									<?php echo form_error('remarks'); ?>
									<textarea id="remarks" name="remarks" class="form-control" rows="5" placeholder="Remarks"></textarea>
								</div>
								<div class="form-group">
							    	<p class="help-block">Attach files</p>
							    	<input  type="file" id="files" name="files[]" size="20"  />
							  	</div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<input class="btn btn-success" type="submit" value="Submit">
								</div>
						  	</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

		
</div>
<!-- /.row -->



<script type="text/delayscript">
$(document).ready(function() {	
	$('#files').MultiFile({
		STRING: {
				remove: 'Delete', 
				removeClass: 'btn btn-danger btn-xs',
			},
		duplicate: false
	});

	$(".form-validate").validate({
		ignore: null,
		errorElement: 'span',
		rules: {
			prjstatus_id: {
				is_natural_no_zero: true,
				required: true
			},
			remarks: "required"
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});

	$("#prjstatus_id").on("change", function(){
		$.getJSON(domain + '/prjstatus/details?id='+$(this).val(), function(data) {
			$("#remarks").val(data.data.remarks);
		});
	});
});
</script>

