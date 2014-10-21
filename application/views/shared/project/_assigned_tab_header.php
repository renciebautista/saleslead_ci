
<?php $method = strtolower($this->uri->segment(2));?>

<div id="tab">
	<ul class="nav nav-tabs" role="tablist">
		<li <?php echo (($method == 'contactlist') ? 'class="active"':'' ); ?>>
			<a href="<?php echo base_url('project/contactlist/'.$project['id']); ?>" role="tab">
				<?php if($contact_count > 0): ?>
				<span class="badge green"><?php echo $contact_count; ?></span>
				<?php endif; ?>
				 Contact List
			</a>
		</li>
	  	<li <?php echo (($method == 'details') ? 'class="active"':'' ); ?>>
	  		<a href="<?php echo base_url('project/details/'.$project['id']); ?>" role="tab">
	  			<?php if($details_count > 0): ?>
				<span class="badge green"><?php echo $details_count; ?></span>
				<?php endif; ?>
				 Details
			</a>
	  	</li>
	  	<li <?php echo (($method == 'classifications') ? 'class="active"':'' ); ?>>
	  		<a href="<?php echo base_url('project/classifications/'.$project['id']); ?>" role="tab">
	  			<?php if($class_count > 0): ?>
	  			<span class="badge green"><?php echo $class_count; ?></span>
	  			<?php endif; ?>
	  			 Classification
	  		</a>	
	  	</li>
	  	<li <?php echo (($method == 'categories') ? 'class="active"':'' ); ?>>
	  		<a href="<?php echo base_url('project/categories/'.$project['id']); ?>" role="tab">
	  			<?php if($cat_count > 0): ?>
	  			<span class="badge green"><?php echo $cat_count; ?></span>
	  			<?php endif; ?>
	  			 Category
	  		</a>
	  	</li>
	  	<li <?php echo (($method == 'stages') ? 'class="active"':'' ); ?>>
	  		<a href="<?php echo base_url('project/stages/'.$project['id']); ?>" role="tab">
	  			<?php if($stage_count > 0): ?>
	  			<span class="badge green"><?php echo $stage_count; ?></span>
	  			<?php endif; ?>
	  			 Stage
	  		</a>
	  	</li>
	   	<li <?php echo (($method == 'statuses') ? 'class="active"':'' ); ?>>
	   		<a href="<?php echo base_url('project/statuses/'.$project['id']); ?>" role="tab">
	   			<?php if($status_count > 0): ?>
	  			<span class="badge green"><?php echo $status_count; ?></span>
	  			<?php endif; ?>
	  			 Status
	   		</a>
	   	</li>
	   	<li <?php echo (($method == 'specifications') ? 'class="active"':'' ); ?>>
	   		<a href="<?php echo base_url('project/specifications/'.$project['id']); ?>" role="tab">
	   			<?php if($specifications > 0): ?>
	  			<span class="badge green"><?php echo $specifications; ?></span>
	  			<?php endif; ?>
	  			 Paint Specification
	   		</a>
	   	</li>
	   	<!-- <li <?php //echo (($method == 'files') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/files/'.$project['id']); ?>" s="tab">Files</a></li>
	   	<li <?php //echo (($method == 'tasks') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/tasks/'.$project['id']); ?>" s="tab">Task</a></li>

        <li <?php //echo (($method == 'advances') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/advances/'.$project['id']); ?>" s="tab">Advances</a></li>
        <li <?php //echo (($method == 'liquidations') ? 'class="active"':'' ); ?>><a href="<?php //echo base_url('project/liquidations/'.$project['id']); ?>" s="tab">Liquidations</a></li> -->
	</ul>
</div>