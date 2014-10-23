<?php $this->load->view('shared/contact/_contact_update_header'); ?>

<div class="row">
	<div class="col-lg-12">
		
		<?php $this->load->view('shared/project/_update_project_details'); ?>

		<div class="tab-content">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Classification Update 
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
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="prlclass_id">Project Classification</label>
									<?php echo form_error('prlclass_id'); ?>
									<select class="form-control" data-placeholder="SELECT CLASSIFICATION" id="prlclass_id" name="prlclass_id" class="medium" >
										<option value="0">SELECT CLASSIFICATION</option>
										<?php foreach($classifications as $classification):?>
											<option value="<?php echo $classification['id'];?>" <?php echo set_select('prlclass_id',$classification['id']); ?> ><?php echo strtoupper($classification['prjclassification_desc']);?></option>
										<?php endforeach; ?>
									</select>
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
			prlclass_id: {
				is_natural_no_zero: true,
				required: true
			}
		},
		errorPlacement: function(error, element) {  
			error.insertAfter(element.siblings("label"));
		}
	});

});
</script>

