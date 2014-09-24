<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">"<?php echo $category['prjcategory_desc']; ?>" Sub Categories</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('class' => 'navbar-form', 'role' => 'search', 'method' => 'get','class' => 'form-validate')); ?>
			<div class="pull-left" style="margin-right:10px;">
				<a href="<?php echo base_url('prjcategory'); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Back</a>
			</div>
			<div class="pull-right">
				<a href="<?php echo base_url('prjcategory/createsubcategory/'.$category['id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Sub Category</a>		
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
						<th>Sub Category</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($subcategories) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($subcategories as $subcategory):?>
					<tr>
						<td><?php echo $subcategory['prjsubcategory_desc']; ?></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('prjcategory/editsubcategory/'.$subcategory['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('prjcategory/deletesubcategory/'.$subcategory['id']); ?>" >Delete</a>
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
