<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $subcategory['prjsubcategory_desc']; ?>' Sub Category</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('prjcategory_id', $subcategory['prjcategory_id']); ?>
		<?php echo form_hidden('_id', $subcategory['id']); ?>
			<div class="form-group">
				<label for="category">Project Category</label>
				<input value="<?php echo $subcategory['prjcategory_desc']; ?>" id="category" class="form-control" type="text" value="" name="category" readonly="">
			</div>
			<div class="form-group">
				<label for="subcategory">Sub Category</label>
				<?php echo form_error('subcategory'); ?>
				<input id="subcategory" class="form-control" type="text" value="<?php echo $subcategory['prjsubcategory_desc']; ?>" name="subcategory" placeholder="Sub Category" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('prjcategory/subcategory/'.$subcategory['prjcategory_id']); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->
