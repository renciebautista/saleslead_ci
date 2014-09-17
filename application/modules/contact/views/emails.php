<?php $this->load->view('shared/contact/_contact_detail_header'); ?>
<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<div class="col-lg-12">
        <?php $this->load->view('shared/contact/_contact_tabs'); ?>
		

		<div class="tab-content">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-envelope"></i> Emails
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <a href="<?php echo base_url('contact/addemail/'.$contact['id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Email</a>       
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Email Address</th>
                                                <th style="width:200px;text-align: center;">Last Updated</th>
                                                <th style="width:100px;text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(count($emails) < 1): ?>
                                            <tr>
                                                <td colspan="3">No record found.</td>
                                            </tr>
                                        <?php else: ?>
                                        <?php foreach ($emails as $email):?>
                                            <tr>
                                                <td>
                                                    <?php echo $email['email_address']; ?>
                                                </td>
                                                <td style="width:200px;text-align: center;">
                                                    <?php echo date_format(date_create($email['updated_at']),'m/d/Y H:i:s'); ?>
                                                </td>
                                                <td style="width:100px;text-align: center;">
                                                    <a href="<?php echo base_url('contact/editemail/'.$email['id']); ?>" >Edit</a>
                                                    <a href="<?php echo base_url('contact/deleteemail/'.$email['id']); ?>" >Delete</a>
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
                    </div>
                    

                </div>
            </div>
        </div>

	</div>
</div>
<!-- /.row -->


