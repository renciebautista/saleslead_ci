<?php $this->load->view('shared/contact/_contact_detail_header'); ?>
<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<div class="col-lg-12">
		<?php $this->load->view('shared/contact/_contact_tabs'); ?>

		<div class="tab-content">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-file-text-o fa-fw"></i> Projects
                    </div>
                    <div class="panel-body">
                        <div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Project Name</th>
												<th style="width:150px;text-align: center;">Action</th>
											</tr>
										</thead>
										<tbody>
										<?php if(count($projects) < 1): ?>
											<tr>
												<td colspan="3">No record found.</td>
											</tr>
										<?php else: ?>
										<?php foreach ($projects as $project):?>
											<tr>
												<td>
													<?php echo $project['project_name']; ?><br>
													<i>	<?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].' '.$project['city'].' '.$project['province'])); ?></i><br>
												</td>
												<td style="width:150px;text-align: center;">
													<a href="<?php //echo base_url('contact/updateproject/'.$project['project_contact_id']); ?>">Update Project</a>
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


