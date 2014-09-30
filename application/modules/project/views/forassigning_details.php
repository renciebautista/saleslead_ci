<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Assign Project Details</h1>	
		<?php echo $this->session->flashdata('message');?>							
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12 header-button">
        <a class="btn btn-default" href="<?php echo base_url('project/forassigning'); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->

<?php $this->load->view('shared/project/_project_name_address'); ?>

<div class="row">
	<div id="contact-details" class="col-lg-12">
		<address>
		  	<span><strong><?php echo strtoupper($project['last_name'].', '.$project['first_name'].' '.$project['middle_name']); ?></strong></span><br>
		  	<span><?php echo date_format(date_create($project['created_at']),'m/d/Y H:i:s'); ?></span><br>	
		</address>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->