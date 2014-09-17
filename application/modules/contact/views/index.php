<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Contacts</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array( 'role' => 'search', 'method' => 'get')); ?>
			<div class="pull-right">
				<a href="<?php echo base_url('contact/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Contact</a>			
			</div>
			
			<div class="input-group custom-search-form">
				<input type="text" name="q" class="form-control" placeholder="Search..." value="<?php echo $filter; ?>">
					<span class="input-group-btn">
					<button class="btn btn-default" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
			<!-- /input-group -->
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Company</th>
						<th>Phones</th>
						<th>Emails</th>
						<th>Projects</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($contacts) < 1): ?>
					<tr>
						<td colspan="2">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($contacts as $contact):?>
					<tr>
						<td><?php echo $contact['last_name'].', '.$contact['first_name'].' '.$contact['middle_name']; ?></td>
						<td>
							<?php echo $contact['company']; ?><br>
							<i>	<?php echo ucwords(strtolower($contact['lot'].' '.$contact['street'].' '.$contact['brgy'].' '.$contact['city'].' '.$contact['province'])); ?></i><br>
						</td>
						<td><a href="<?php echo base_url('contact/phones/'.$contact['id']); ?>">Manage Phones</a></td>
						<td><a href="<?php echo base_url('contact/emails/'.$contact['id']); ?>">Manage Emails</a></td>
						<td><a href="<?php echo base_url('contact/project/'.$contact['id']); ?>">View Projects</a></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('contact/edit/'.$contact['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('contact/delete/'.$contact['id']); ?>" >Delete</a>
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
