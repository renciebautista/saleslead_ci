<div id="tab">
	<ul class="nav nav-tabs" role="tablist">
	  	<li <?php echo (($this->uri->segment(2) == 'phones') ? 'class="active"':''); ?>><a href="<?php echo base_url('contact/phones/'.$contact['id']); ?>" role="tab">Phones</a></li>
	  	<li <?php echo (($this->uri->segment(2) == 'emails') ? 'class="active"':''); ?>><a href="<?php echo base_url('contact/emails/'.$contact['id']); ?>" role="tab">Emails</a></li>
	  	<li <?php echo (($this->uri->segment(2) == 'project') ? 'class="active"':''); ?>><a href="<?php echo base_url('contact/project/'.$contact['id']); ?>" role="tab">Projects</a></li>
	</ul>
</div>