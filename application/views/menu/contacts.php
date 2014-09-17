<?php 
	$enable = FALSE;
	$modules = array(
		'COMPANY MAINTENANCE',
		'CONTACT MAINTENANCE');

	foreach($modules as $module){
		if(in_array($module,$this->session->userdata['flexi_auth']['privileges'])){
			$enable = TRUE;
		}
	}
?>
<?php if($enable): ?>
<li class="dropdown">
	<a href="#"><i class="fa fa-users fa-fw"></i> Contacts<span class="fa arrow"></span></a>
	<ul class="nav nav-second-level">
		<?php if ($this->flexi_auth->is_privileged('CONTACT MAINTENANCE')):?>
		<li>
			<a id="contact" href="<?php echo base_url('contact'); ?>">Contacts</a>
		</li>
		<?php endif; ?>
		<?php if ($this->flexi_auth->is_privileged('COMPANY MAINTENANCE')):?>
		<li>
			<a id="company" href="<?php echo base_url('company'); ?>">Companies</a>
		</li>
		<?php endif; ?>
	</ul>
	<!-- /.nav-second-level -->
</li>
<?php endif; ?>