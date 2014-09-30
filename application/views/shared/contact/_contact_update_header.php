<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Update Project Details</h1>	
		<?php echo $this->session->flashdata('message');?>							
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12 header-button">
        <a class="btn btn-default" href="<?php echo (($this->session->userdata('back_link') == '') ? base_url('contact'): base_url($this->session->userdata('back_link')) ); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->


<?php $this->load->view('shared/project/_project_name_address'); ?>

<?php $this->load->view('shared/contact/_contact_details'); ?>