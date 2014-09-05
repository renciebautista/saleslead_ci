<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Sub Category</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form')); ?>
		<?php echo form_hidden('prjcategory_id', $category['id']); ?>
			<div class="form-group">
				<label for="category">Project Category</label>
				<input value="<?php echo $category['prjcategory_desc']; ?>" id="category" class="form-control" type="text" value="" name="category" readonly="">
			</div>
			<div class="form-group">
				<label for="subcategory">Sub Category</label>
				<?php echo form_error('subcategory'); ?>
				<input id="subcategory" class="form-control" type="text" value="" name="subcategory" placeholder="Sub Category">
			</div>
			<input class="btn btn-success" type="submit" value="Submit">
			<a class="btn btn-default" href="<?php echo base_url('prjcategory/subcategory/'.$category['id']); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


