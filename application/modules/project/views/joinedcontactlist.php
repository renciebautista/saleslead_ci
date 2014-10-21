<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12 header-button">
        <a class="btn btn-default" href="<?php echo base_url('project/joined'); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->

<?php $this->load->view('shared/project/_project_name_address'); ?>

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
							<a href="<?php echo base_url('contact/updateproject/'.$contact['id']); ?>">View Details</a>
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