<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Group Types</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('class' => 'navbar-form', 'role' => 'search', 'method' => 'get')); ?>
			<a href="<?php echo base_url('grouptype/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Group Type</a>		
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
						<th>Group Type</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($grouptypes) < 1): ?>
					<tr>
						<td colspan="2">Record not found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($grouptypes as $grouptype):?>
					<tr>
						<td><?php echo $grouptype['grouptype_desc']; ?></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('grouptype/edit/'.$grouptype['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('grouptype/delete/'.$grouptype['id']); ?>" >Delete</a>
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
