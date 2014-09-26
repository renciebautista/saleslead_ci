<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Update Project Details</h1>	
		<?php echo $this->session->flashdata('message');?>							
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12 header-button">
        <a class="btn btn-default" href="<?php echo (($this->session->userdata('back_link') == '') ? base_url('contact'): base_url($this->session->userdata('back_link')) ); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->


<?php $this->load->view('shared/project/_project_name_address'); ?>

<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<div class="col-lg-12">
		<div id="tab">
			<ul class="nav nav-tabs" role="tablist">
			  	<li class="active"><a href="#details" role="tab" data-toggle="tab">Project Details</a></li>
			  	<li><a href="#classification" role="tab" data-toggle="tab">Project Classification</a></li>
			  	<li><a href="#category" role="tab" data-toggle="tab">Project Category</a></li>
			  	<li><a href="#stage" role="tab" data-toggle="tab">Project Stage</a></li>
			   	<li><a href="#status" s="tab" data-toggle="tab">Project Status</a></li>
			   	<li><a href="#specification" s="tab" data-toggle="tab">Paint Specification</a></li>
			   	<li><a href="#files" s="tab" data-toggle="tab">Files</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="details">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Details
					</div>
					<?php if(!empty($details)): ?>
					<div class="panel-body">
						<?php foreach ($details as $detail):?>
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> <?php echo distance_of_time_in_words(strtotime($detail['created_at']),strtotime(date('Y-m-d H:i:s'))); ?> ago
								</small>
								</p>
							</div>
							<div>
								<p><?php echo nl2br($detail['details']) ?></p>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<div class="panel-footer">
						<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
						<?php echo form_hidden('project_contact_id', $project['project_contact_id']); ?>
						  	<div class="form-group">
						    	<textarea name="details" id="details" class="form-control" rows="3" placeholder="Details"></textarea>
						  	</div>
						 	<button type="submit" class="btn btn-success">Submit</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="classification">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Classification
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="category">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Catgegory
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="stage">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Stage
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="status">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Status
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="specification">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Paint Specification
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="files">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Files
					</div>
					<div class="panel-body">
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
						
						<div>
							<div>
								<p>
								<small class="text-muted">
									<i class="fa fa-clock-o"></i> 11 hours ago via Twitter
								</small>
								</p>
							</div>
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" class="form-control input-sm" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button id="btn-chat" class="btn btn-warning btn-sm"> Update </button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		
</div>
<!-- /.row -->


<script type="text/delayscript">
$(document).ready(function() {
	$(".form-validate").validate({
		errorElement: 'span',
		rules:{
			details: "required",
		},
		errorPlacement: function(error, element){
			error.insertAfter(element.siblings("label"));
		}
	});

});
</script>

