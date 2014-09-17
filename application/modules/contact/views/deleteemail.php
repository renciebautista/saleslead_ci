<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit Email</h1>		
		<?php echo $this->session->flashdata('message');?>						
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<div class="col-lg-6">
		<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
		<?php echo form_hidden('_id', $email['id']); ?>
			<div class="form-group">
				<label for="email">Email Address</label>
				<?php echo form_error('email'); ?>
				<input id="email" class="form-control" type="text" value="<?php echo set_value('email',$email['email_address']); ?>" name="email" placeholder="Email Address" readonly="">
			</div>
			<input onclick="if(!confirm('Are you sure to delete this record?')){return false;};" class="btn btn-danger" type="submit" value="Delete">
			<a class="btn btn-default" href="<?php echo base_url('contact/emails/'.$contact['id']); ?>">Back</a>
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-6 -->						
</div>
<!-- /.row -->



