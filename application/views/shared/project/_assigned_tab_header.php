
<?php $method = strtolower($this->uri->segment(2));?>

<div id="tab">
	<ul class="nav nav-tabs" role="tablist">
		<li <?php echo (($method == 'contactlist') ? 'class="active"':'' ); ?>><a href="<?php echo base_url('project/contactlist/'.$project['id']); ?>" role="tab">Contact List</a></li>
	  	<li <?php echo (($method == 'details') ? 'class="active"':'' ); ?>><a href="<?php echo base_url('project/details/'.$project['id']); ?>" role="tab">Project Details</a></li>
	  	<li <?php echo (($method == 'classifications') ? 'class="active"':'' ); ?>><a href="<?php echo base_url('project/classifications/'.$project['id']); ?>" role="tab">Project Classification</a></li>
	  	<li <?php echo (($method == 'categories') ? 'class="active"':'' ); ?>><a href="<?php echo base_url('project/categories/'.$project['id']); ?>" role="tab">Project Category</a></li>
	  	<li <?php echo (($method == 'stages') ? 'class="active"':'' ); ?>><a href="<?php echo base_url('project/stages/'.$project['id']); ?>" role="tab">Project Stage</a></li>
	   	<li <?php echo (($method == 'statuses') ? 'class="active"':'' ); ?>><a href="<?php echo base_url('project/statuses/'.$project['id']); ?>" s="tab">Project Status</a></li>
	   	<!-- <li <?php //echo (($method == 'specifications') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/specifications/'.$project['id']); ?>" s="tab">Paint Specification</a></li> -->
	   	<!-- <li <?php //echo (($method == 'files') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/files/'.$project['id']); ?>" s="tab">Files</a></li>
	   	<li <?php //echo (($method == 'tasks') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/tasks/'.$project['id']); ?>" s="tab">Task</a></li>

        <li <?php //echo (($method == 'advances') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/advances/'.$project['id']); ?>" s="tab">Advances</a></li>
        <li <?php //echo (($method == 'liquidations') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/liquidations/'.$project['id']); ?>" s="tab">Liquidations</a></li> -->
	</ul>
</div>