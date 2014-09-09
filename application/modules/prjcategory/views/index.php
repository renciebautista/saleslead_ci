<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Categories</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get')); ?>
			<div class="pull-right">
				<a href="<?php echo base_url('prjcategory/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Project Category</a>		
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
						<th>Project Category</th>
						<th>Sub Category</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($prjcategorys) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($prjcategorys as $prjcategory):?>
					<tr>
						<td><?php echo $prjcategory['prjcategory_desc']; ?></td>
						<td><a href="<?php echo base_url('prjcategory/subcategory/'.$prjcategory['id']); ?>">Manage Sub Category</a></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('prjcategory/edit/'.$prjcategory['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('prjcategory/delete/'.$prjcategory['id']); ?>" >Delete</a>
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
