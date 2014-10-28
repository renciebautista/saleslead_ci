
<?php $method = strtolower($this->uri->segment(2));?>
<div id="tab">
	<ul class="nav nav-tabs" role="tablist">
	  	<li <?php echo (($method == 'updateproject') ? 'class="active"':'' ); ?> ><a href="<?php echo base_url('contact/updateproject/'.$project['project_contact_id']) ?>" role="tab" >Project Details</a></li>
	  	<li <?php echo (($method == 'updateclassification') ? 'class="active"':'' ); ?> ><a href="<?php echo base_url('contact/updateclassification/'.$project['project_contact_id']) ?>" role="tab" >Project Classification</a></li>
	  	<li <?php echo (($method == 'updatecategory') ? 'class="active"':'' ); ?> ><a href="<?php echo base_url('contact/updatecategory/'.$project['project_contact_id']) ?>" role="tab" >Project Category</a></li>
	  	<li <?php echo (($method == 'updatestage') ? 'class="active"':'' ); ?> ><a href="<?php echo base_url('contact/updatestage/'.$project['project_contact_id']) ?>" role="tab" >Project Stage</a></li>
	   	<li <?php echo (($method == 'updatestatus') ? 'class="active"':'' ); ?> ><a href="<?php echo base_url('contact/updatestatus/'.$project['project_contact_id']) ?>" s="tab" >Project Status</a></li>
	   	<li <?php echo (($method == 'updatespecification') ? 'class="active"':'' ); ?> ><a href="<?php echo base_url('contact/updatespecification/'.$project['project_contact_id']) ?>" s="tab" >Paint Specification</a></li>
	   	<li <?php echo (($method == 'request') ? 'class="active"':'' ); ?> ><a href="<?php echo base_url('contact/request/'.$project['project_contact_id']) ?>" s="tab" >Request</a></li>
	</ul>
</div>