<?php $this->load->view('shared/contact/_contact_detail_header'); ?>
<?php $this->load->view('shared/contact/_contact_details'); ?>

<div class="row">
	<div class="col-lg-12">
		<?php $this->load->view('shared/contact/_contact_tabs'); ?>

		<div class="tab-content">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-phone"></i> Phones
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <a href="<?php echo base_url('contact/addphone/'.$contact['id']); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Phone</a>       
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Phone Number</th>
                                                <th>Remarks</th>
                                                <th style="width:200px;text-align: center;">Last Updated</th>
                                                <th style="width:100px;text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(count($phones) < 1): ?>
                                            <tr>
                                                <td colspan="4">No record found.</td>
                                            </tr>
                                        <?php else: ?>
                                        <?php foreach ($phones as $phone):?>
                                            <tr>
                                                <td>
                                                    <?php echo $phone['phone_number']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $phone['remarks']; ?>
                                                </td>
                                                <td style="width:200px;text-align: center;">
                                                    <?php echo date_format(date_create($phone['updated_at']),'m/d/Y H:i:s'); ?>
                                                </td>
                                                <td style="width:100px;text-align: center;">
                                                    <a href="<?php echo base_url('contact/editphone/'.$phone['id']); ?>" >Edit</a>
                                                    <a href="<?php echo base_url('contact/deletephone/'.$phone['id']); ?>" >Delete</a>
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


