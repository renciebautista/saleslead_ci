<?php 
	$enable = FALSE;
	$requestapproval = $this->Request_approver_model->my_for_approval($this->_user_id,1);
	if(!empty($requestapproval)){
		$enable = TRUE;
	}
?>
<?php if($enable): ?>
<li class="dropdown">
	<a href="#"><i class="fa fa-list-alt fa-fw"></i> Requests<span class="fa arrow"></span></a>
	<ul class="nav nav-second-level">
		<li>
			<a id="request" href="<?php echo base_url('request/approval'); ?>">Request Approval</a>
		</li>
	</ul>
	<!-- /.nav-second-level -->
</li>
<?php endif; ?>