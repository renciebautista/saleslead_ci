<?php 
	$enable = FALSE;
	$modules = array(
		'DEPARTMENTS MAINTENANCE',
		'GROUPS MAINTENANCE',
		'USERS MAINTENANCE',
		'PRIVILEGES MAINTENANCE');

	foreach($modules as $module){
		if(in_array($module,$this->session->userdata['flexi_auth']['privileges'])){
			$enable = TRUE;
		}
	}
?>
<?php if($enable): ?>
<li class="dropdown">
	<a href="#"><i class="fa fa-user fa-fw"></i> User Maintenance<span class="fa arrow"></span></a>
	<ul class="nav nav-second-level">
		<?php if ($this->flexi_auth->is_privileged('DEPARTMENTS MAINTENANCE')):?>
		<li >
			<a id="department"  href="<?php echo base_url('department'); ?>">Departments</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('GROUPS MAINTENANCE')):?>
		<li>
			<a id="group" href="<?php echo base_url('group'); ?>">Groups</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('USERS MAINTENANCE')):?>
		<li>
			<a id="user" href="<?php echo base_url('user'); ?>">Users</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('PRIVILEGES MAINTENANCE')):?>
		<li>
			<a id="privilege" href="<?php echo base_url('privilege'); ?>">Privileges</a>
		</li>
		<?php endif; ?>
	</ul>
	<!-- /.nav-second-level -->
</li>
<?php endif; ?>