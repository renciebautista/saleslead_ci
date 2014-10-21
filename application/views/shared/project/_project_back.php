<div class="row">
    <div class="col-lg-12 header-button">
    	<a class="btn btn-default" href="<?php echo (($this->session->userdata('back_link') == '') ? base_url('project/assigned'): base_url($this->session->userdata('back_link')) ); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->