<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Task Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div id="contact-details" class="col-lg-12">
		<address>
		  	<span><strong><?php echo strtoupper($project['project_name']); ?></strong></span><br>
		  	<span><?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'])); ?></span><br>
		  	<span><?php echo ucwords(strtolower($project['province'])); ?></span><br>
		</address>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div id="tab">
			<ul class="nav nav-tabs" role="tablist">
			  	<li class="active"><a href="<?php echo base_url('task/details/'.$project['id']); ?>" role="tab">Task History</a></li>
			   	<li><a href="<?php echo base_url('task/advances/'.$project['id']); ?>" s="tab">Material / Cash Advances</a></li>
			   	<li><a href="<?php echo base_url('task/liquidations/'.$project['id']); ?>" s="tab">Material / Cash Liquidations</a></li>
			</ul>
		</div>

		<div class="tab-content">
			<div id="details">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Task History
					</div>
					<div class="panel-body">
				
						<div>
							<div>
								<strong class="primary-font">
									AlDEA, DONATO JAVID

								</strong>
								<p>
								
								<small class="text-muted">

									<i class="fa fa-clock-o"></i> 5 days ago
								</small>
								</p>
							</div>
							<div>
								<p>Try to contact the client for further details.</p>
							</div>
						</div>
						<div>
							<div>
								<strong class="primary-font">
									BAUTISTA, RENCIE AGBIN

								</strong>
								<p>
								
								<small class="text-muted">

									<i class="fa fa-clock-o"></i> 2 days ago
								</small>
								</p>
							</div>
							<div>
								<p>Talked to the client.</p>
							</div>
						</div>
					</div>

					<div class="panel-footer">
						<?php echo form_open('contact/updatedetails', array('role' => 'form')); ?>
							<div class="form-group">
								<label class="radio-inline"><input id="optionsRadiosInline1" type="radio" checked="" value="option1" name="optionsRadiosInline">Pending</label>
								<label class="radio-inline"><input id="optionsRadiosInline1" type="radio" checked="" value="option1" name="optionsRadiosInline">Ongoing</label>
								<label class="radio-inline"><input id="optionsRadiosInline1" type="radio" checked="" value="option1" name="optionsRadiosInline">Done</label>
							</div>
						  	<div class="form-group">
						  		<label for="city_id">Details</label>
						    	<textarea name="details" id="details" class="form-control" rows="3" placeholder="Details"></textarea>
						  	</div>
						 	<button type="submit" class="btn btn-success">Submit</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- /.row -->


