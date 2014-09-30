<?php 
	$enable = FALSE;
	$modules = array(
		'PUBLIC PROJECT MAINTENANCE',
		'CREATED PROJECT MAINTENANCE',
		'PROJECT ASSIGNING MAINTENANCE',
		'ASSIGNED PROJECT MAINTENANCE');

	foreach($modules as $module){
		if(in_array($module,$this->session->userdata['flexi_auth']['privileges'])){
			$enable = TRUE;
		}
	}
?>
<?php if($enable): ?>
<li class="dropdown">
	<a href="#"><i class="fa fa-file-text-o fa-fw"></i> Projects<span class="fa arrow"></span></a>
	<ul class="nav nav-second-level">
		<?php if ($this->flexi_auth->is_privileged('PUBLIC PROJECT MAINTENANCE')):?>
		<li>
			<a id="project" href="<?php echo base_url('project'); ?>">Public Projects</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('CREATED PROJECT MAINTENANCE')):?>
		<li>
			<a id="created" href="<?php echo base_url('project/created'); ?>">Created Projects</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('ASSIGNED PROJECT MAINTENANCE')):?>
		<li>
			<a id="assigned" href="<?php echo base_url('project/assigned'); ?>">Assigned Projects</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('PROJECT ASSIGNING MAINTENANCE')):?>
		<li>
			<a id="forassigning" href="<?php echo base_url('project/forassigning'); ?>">New Projects</a>
		</li>
		<?php endif; ?>
	</ul>
	<!-- /.nav-second-level -->
</li>
<?php endif; ?>