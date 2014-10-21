<?php $this->load->view('shared/contact/_contact_update_header'); ?>

<div class="row">
	<div class="col-lg-12">
		
		<?php $this->load->view('shared/project/_update_project_details'); ?>

		<div class="tab-content">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Details Update
					</div>
					<?php if(!empty($details)): ?>
					<div class="panel-body">
						<?php foreach ($details as $detail):?>
						<div class="thread">
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> <?php echo date_format(date_create($detail['created_at']),'m/d/Y H:i:s'); ?>
								</small>
								</p>
							</div>
							<div>
								<p><?php echo nl2br($detail['details']) ?></p>
							</div>
							<?php if(!empty($detail['files'])): ?>
							<div class="attached-files">
								<ul>
									<?php foreach ($detail['files'] as $file):?>
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
							<div class="form-group">
						    	<textarea name="details" id="details" class="form-control" rows="3" placeholder="Details"></textarea>
						  	</div>
						  	<div class="form-group">
						    	<p class="help-block">Attach files</p>
						    	<input  type="file" id="files" name="files[]" size="20"  />
						  	</div>
						  	<input class="btn btn-success" type="submit" value="Submit">
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
		errorElement: 'span',
		rules: {
			details: "required"
		},
		errorPlacement: function(error, element) {        
			error.insertAfter(element.siblings("label"));
		}
	});

	
});
</script>

