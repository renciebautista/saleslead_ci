
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Joined Contacts Notifications</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12 header-button">
        <a class="btn btn-default" href="<?php echo base_url('dashboard'); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 header-button">
        <div class="panel panel-default">
            <div class="panel-heading">
            	<i class="fa fa-share-alt"></i>
                Notifications
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	<?php if(!empty($notifications)): ?>
                <?php foreach ($notifications as $notification):?>

                <div class=" <?php echo $notification['remarks'];  ?>">
                    <a class="close" data-dismiss="alert" aria-hidden="true" href="<?php echo base_url('dashboard/joinedcontacts/'.$notification['id']); ?>">&times;</a>
                    Your contact, <strong><?php echo strtoupper($notification['last_name'].', '.$notification['first_name'].' '.$notification['middle_name']); ?></strong> joined the <strong><?php echo strtoupper($notification['project_name']); ?></strong> project as <strong><?php echo $notification['grouptype_desc']; ?></strong> is approved.
                </div>
                <?php endforeach; ?>
            	<?php else: ?>
            	No notification found.
            	<?php endif ?>
            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->

