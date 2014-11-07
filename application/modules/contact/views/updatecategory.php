<?php $this->load->view('shared/contact/_contact_update_header'); ?>

<div class="row">
	<div class="col-lg-12">
		
		<?php $this->load->view('shared/project/_update_project_details'); ?>

		<div class="tab-content">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Category Update 
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
									<label for="prjcat_id">Project Category</label>
									<?php echo form_error('prjcat_id'); ?>
									<select class="form-control" data-placeholder="SELECT CATEGORY" id="prjcat_id" name="prjcat_id" class="medium" >
										<option value="0">SELECT CATEGORY</option>
										<?php foreach($categories as $category):?>
											<option value="<?php echo $category['id'];?>" <?php echo set_select('prjcat_id',$category['id']); ?> ><?php echo strtoupper($category['prjcategory_desc']);?></option>
										<?php endforeach;?>
									</select>
								</div>
						  	</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="prjsubcat_id">Project Sub Category</label>
									<?php echo form_error('prjsubcat_id'); ?>
									<select class="form-control" data-placeholder="SELECT SUB CATEGORY" id="prjsubcat_id" name="prjsubcat_id" class="medium" >
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
			prjcat_id: {
				is_natural_no_zero: true,
				required: true
			},
			prjsubcat_id: {
				is_natural_no_zero: true,
				required: true
			}
		},
		errorPlacement: function(error, element) {  
			error.insertAfter(element.siblings("label"));
		}
	});

	$('select#prjcat_id').select_chain({
		child: "select#prjsubcat_id",
		child_value: "subcategory",
		default_value: "SELECT SUB CATEGORY",
		ajax_url : domain +"/prjcategory/subcategorylists"
	});
});
</script>

