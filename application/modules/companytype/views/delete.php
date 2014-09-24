<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Delete '<?php echo $companytype['companytype']; ?>' Company Type</h1>	
		<?php echo $this->session->flashdata('message');?>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form','class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $companytype['id']); ?>
			<div class="form-group">
				<label for="companytype">Company Type</label>
				<?php echo form_error('companytype'); ?>
				<input id="companytype" class="form-control" type="text" value="<?php echo set_value('companytype',$companytype['companytype'] ); ?>" name="companytype" placeholder="Company Type" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('companytype'); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->


