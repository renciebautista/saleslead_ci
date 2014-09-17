<div class="row">
	<div id="contact-details" class="col-lg-12">
		<address>
		  	<span><strong><?php echo strtoupper($contact['last_name'].', '.$contact['first_name'].' '.$contact['middle_name']); ?></strong></span><br>
		  	<span><b><?php echo ucwords(strtolower($contact['company'])); ?></b></span><br>
		  	<span><?php echo ucwords(strtolower($contact['lot'].' '.$contact['street'].' '.$contact['brgy'].', '.$contact['city'].' '.$contact['province'])); ?></span><br>
		  	
		</address>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->