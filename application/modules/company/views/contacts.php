<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Contact List</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<address>
		  	<strong><?php echo $company['company']; ?></strong><br>
		  	<?php echo ucwords(strtolower($company['lot'].' '.$company['street'].' '.$company['brgy'])); ?><br>
		  	<?php echo ucwords(strtolower($company['city'].' '.$company['province'])); ?><br>
		</address>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('class' => 'navbar-form', 'role' => 'search', 'method' => 'get')); ?>
			<a href="<?php echo base_url('company/createcontact/'.$company['id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Contact</a>		
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
						<th>Title / Position</th>
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
				<?php foreach ($contacts as $company):?>
					<tr>
						<td><?php echo $company['company']; ?></td>
						<td><?php echo ucwords(strtolower($company['lot'].' '.$company['street'].' '.$company['brgy'].', '.$company['city'].' '.$company['province'])); ?></td>
						<td><a href="<?php echo base_url('company/contacts/'.$company['id']); ?>" >Manage Contacts</a></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('company/edit/'.$company['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('company/delete/'.$company['id']); ?>" >Delete</a>
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
		
