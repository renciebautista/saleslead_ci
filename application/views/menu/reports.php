<?php 
	$enable = FALSE;
	$modules = array(
		'CALL REPORT'
		);

	foreach($modules as $module){
		if(in_array($module,$this->session->userdata['flexi_auth']['privileges'])){
			$enable = TRUE;
		}
	}
?>
<?php if($enable): ?>
<li class="dropdown">
	<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
	<ul class="nav nav-second-level">
		<?php if ($this->flexi_auth->is_privileged('CALL REPORT')):?>
		<li>
			<a id="report" href="<?php echo base_url('report/callreport'); ?>">Call Report</a>
		</li>
		<?php endif; ?>
		<!-- <li>
			<a id="report" href="<?php //echo base_url('report/area'); ?>">Area Report</a>
		</li>
		<li>
			<a id="report" href="<?php// echo base_url('report/salesman'); ?>">Salesman Report</a>
		</li>
		<li>
			<a id="report" href="<?php //echo base_url('report/salesmanweekly'); ?>">Salesman Weekly Report</a>
		</li> -->
	</ul>
	<!-- /.nav-second-level -->
</li>
<?php endif; ?>