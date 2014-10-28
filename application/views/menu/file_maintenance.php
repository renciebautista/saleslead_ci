<?php 
	$enable = FALSE;
	$modules = array(
		'PROJECT CLASSIFICATION MAINTENANCE',
		'PROJECT CATEGORY MAINTENANCE',
		'PROJECT STAGE MAINTENANCE',
		'PROJECT STATUS MAINTENANCE',
		'CONTACT TYPE STATUS MAINTENANCE',
		'COMPANY TYPE MAINTENANCE',
		'REQUEST TYPE MAINTENANCE'
		);

	foreach($modules as $module){
		if(in_array($module,$this->session->userdata['flexi_auth']['privileges'])){
			$enable = TRUE;
		}
	}
?>
<?php if($enable): ?>
<li class="dropdown">
	<a href="#"><i class="fa fa-gear fa-fw"></i> File Maintenance<span class="fa arrow"></span></a>
	<ul class="nav nav-second-level">
		<?php if ($this->flexi_auth->is_privileged('PROJECT CLASSIFICATION MAINTENANCE')):?>
		<li>
			<a id="prjclassification" href="<?php echo base_url('prjclassification'); ?>">Project Classifications</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('PROJECT CATEGORY MAINTENANCE')):?>
		<li>
			<a id="prjcategory" href="<?php echo base_url('prjcategory'); ?>">Project Categories</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('PROJECT STAGE MAINTENANCE')):?>
		<li>
			<a id="prjstage" href="<?php echo base_url('prjstage'); ?>">Project Stages</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('PROJECT STATUS MAINTENANCE')):?>
		<li>
			<a id="prjstatus" href="<?php echo base_url('prjstatus'); ?>">Project Statuses</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('CONTACT TYPE STATUS MAINTENANCE')):?>
		<li>
			<a id="grouptype" href="<?php echo base_url('grouptype'); ?>">Contact Types</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('COMPANY TYPE MAINTENANCE')):?>
		<li>
			<a id="companytype" href="<?php echo base_url('companytype'); ?>">Company Types</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('REQUEST TYPE MAINTENANCE')):?>
		<li>
			<a id="requesttype" href="<?php echo base_url('requesttype'); ?>">Request Types</a>
		</li>
		<?php endif; ?>
	</ul>
	<!-- /.nav-second-level -->
</li>
<?php endif; ?>