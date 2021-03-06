<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>		
		<?php echo $this->session->flashdata('message');?>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<?php $this->load->view('shared/project/_project_back'); ?>

<?php $this->load->view('shared/project/_project_name_address'); ?>

<div class="row">
	<div class="col-lg-12">
		
		<?php $this->load->view('shared/project/_assigned_tab_header'); ?>

		<?php if(!empty($contacts)): ?>
		<div class="tab-content">
			<div id="contacts">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-users"></i> Contact For Approval
						
					</div>
					<?php if(!empty($contacts)): ?>

					
					<div class="panel-body">
						<div class="row">
							
							<div class="col-lg-12">

								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>User Name</th>
												<th>Contact Name</th>
												<th>Contact Group</th>
												<th>Company Name</th>
												<th style="width:130px;text-align: center;">Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($contacts as $contact):?>
											<tr>
												<td><?php echo strtoupper($contact['created_by_name']); ?></td>
												<td><?php echo $contact['contact_name']; ?></td>
												<td><?php echo $contact['grouptype_desc']; ?></td>
												<td>
													<?php echo $contact['company']; ?><br>
													<i>	<?php echo ucwords(strtolower($contact['address'])); ?></i><br>
												</td>
												<td style="width:130px;text-align: center;">
													<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
													<?php echo form_hidden('_id', $contact['id']); ?>
													<?php echo form_hidden('project_id', $project['id']); ?>
													<input class="submitLink" name="submit" type="submit" value="Approve">
													<input class="submitLink" name="submit" type="submit" value="Deny">
													<?php echo form_close(); ?>
													
												</td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col-lg-12 -->						
						</div>
						<!-- /.row -->
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="tab-content">
			<div id="contacts">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-users"></i> Contact Lists
						<div class="pull-right">
							<div class="btn-group">
								Filter By :
								<a id="filter-menu" class="dropdown-toggle" data-toggle="dropdown" href=""> All Status
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu" style="left: auto;">
									<li><a href="#">All Status</a></li>
									<li><a href="#">APPROVED</a></li>
									<li><a href="#">DENIED</a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php if(!empty($contact_lists)): ?>

					
					<div class="panel-body">
						<div class="row">
							
							<div class="col-lg-12">

								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>User Name</th>
												<th>Contact Name</th>
												<th>Contact Group</th>
												<th>Company Name</th>
												<th style="width:130px;text-align: center;">Status</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($contact_lists as $contact):?>
											<tr>
												<td><?php echo strtoupper($contact['created_by_name']); ?></td>
												<td><?php echo $contact['contact_name']; ?></td>
												<td><?php echo $contact['grouptype_desc']; ?></td>
												<td>
													<?php echo $contact['company']; ?><br>
													<i>	<?php echo ucwords(strtolower($contact['address'])); ?></i><br>
												</td>
												<td  style="width:130px;text-align: center;">
													<p class="join-status"><?php echo $contact['pc_status']; ?></p>
												</td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col-lg-12 -->						
						</div>
						<!-- /.row -->
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->

<script type="text/delayscript">

$(".dropdown-menu li a").click(function(){
	var filter_text = $(this).text();
	$("#filter-menu:first-child").html(filter_text+' <span class="caret"></span>');

	$(".table tbody tr").each(function () {
		if(filter_text != "All Status"){
			// console.log($(this).find('.join-status').text());

			if ($(this).find('.join-status').text() == filter_text) {
				$(this).removeClass("hidden");
			} else {
				$(this).addClass("hidden"); 
			}
		}else{
			$(this).removeClass("hidden");
		}
		
	});
});
</script>



