<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>	
		<?php echo $this->session->flashdata('message');?>				
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

<div class="row">
	<div class="col-lg-12">
		<div id="tab">
			<ul class="nav nav-tabs" role="tablist">

				<?php foreach ($types as $type):?>
				<li <?php echo (($group_id == $type['id']) ? 'class="active"':''); ?>>
					<a href="<?php echo base_url('project/created/'.$project['id'].'/'.$type['id']); ?>" role="tab"><?php echo ucwords(strtolower($type['grouptype_desc'])); ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="tab-content">
			<div id="tasks">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-users fa-fw"></i> Contacts
					</div>
					<div class="panel-body">
						<?php if($project['status_id'] == 1):  ?>
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="<?php echo base_url('project/addcontact/'.$project['id'].'/'.$group_id); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Contact</a>		
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="row">
							
							<div class="col-lg-12">

								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th style="width:30%">Contact Name</th>
												<th>Company</th>
												<th>Status</th>
												<th style="width:12%" class="action-center">Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php if(count($contacts) < 1): ?>
											<tr>
												<td colspan="3">No record found.</td>
											</tr>
										<?php else: ?>
										<?php foreach ($contacts as $contact):?>
											<tr>
												<td style="width:30%">
													<?php echo $contact['contact_name']; ?><br>
												</td>
												<td>
													<?php echo $contact['company']; ?><br>
													<i><?php echo ucwords(strtolower($contact['address'])); ?></i>
												</td>
												<td><?php echo $contact['pc_status']; ?></td>
												<td style="width:12%" class="action-center">
													<?php if($project['status_id'] < 3):  ?>
														<?php if($contact['approved'] == 2): ?>
															<a href="<?php echo base_url('contact/updateproject/'.$contact['id']) ?>">Update Project</a>
														<?php else: ?>
														N/A
														<?php endif; ?>
													<?php else: ?>
													N/A
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
										<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col-lg-12 -->						
						</div>
						<!-- /.row -->
					</div>
					

				</div>
			</div>
		</div>
	</div>

		
</div>
<!-- /.row -->