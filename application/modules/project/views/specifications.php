<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<?php $this->load->view('shared/project/_project_back'); ?>
<?php $this->load->view('shared/project/_project_name_address'); ?>

<div class="row">
	<div class="col-lg-12">
		<?php $this->load->view('shared/project/_assigned_tab_header'); ?>

		<div class="tab-content">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#specs" role="tab" data-toggle="tab">Paint Specification</a></li>
			  <li><a href="#history" role="tab" data-toggle="tab">
			  	<?php if($specifications > 0): ?>
	  			<span class="badge green"><?php echo $specifications; ?></span>
	  			<?php endif; ?>
			  		History</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  	<div class="tab-pane active" id="specs">
					<div style =" margin-top:15px;">
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-comments"></i> Paint Specification
									<?php $this->load->view('shared/project/_comment_filter'); ?>
							</div>
							<?php if(!empty($specs)): ?>
							<div class="panel-body">
								<ul class="timeline">
									<?php foreach ($specs as $spec):?>
									<li class="timeline-inverted">
										<div class="timeline-badge">
											<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$spec['details']['avatar']); ?>">
										</div>
										<div class="timeline-panel">
											<div class="timeline-heading">
												<p>
													<strong class="bdo-name"><?php echo strtoupper($spec['details']['ulast_name'].', '.$spec['details']['ufirst_name'].' '.$spec['details']['umiddle_name']); ?></strong>
												</p>
												
											</div>
											<div class="timeline-body">
												<em><?php echo strtoupper($spec['details']['last_name'].', '.$spec['details']['first_name'].' '.$spec['details']['middle_name']); ?> ( <?php echo $spec['details']['grouptype_desc']; ?>)</em>
												<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>Type</th>
															<th>Details</th>
															<th>Area<i>(SqM)</i></th>
															<th>Paint Requirement<i>(Ltrs.)</i></th>
															<th>Painting Cost<i>(Php)</i></th>
														</tr>
													</thead>
													<tbody>
													<?php foreach ($spec['specs'] as $row):?>
														<tr>
															<td>
																<?php echo $row['painttype']; ?><br>
															</td>
															<td>
																<?php echo nl2br($row['details']); ?><br>
															</td>
															<td>
																<?php echo number_format($row['area'],2); ?><br>
															</td>
															<td>
																<?php echo number_format($row['paint'],2); ?><br>
															</td>
															<td>
																<?php echo number_format($row['cost'],2); ?><br>
															</td>

														</tr>
													<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											</div>
										</div>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif; ?>
						</div>
					</div>
			  	</div>
			  	<div class="tab-pane" id="history">
				  	<div style =" margin-top:15px;">
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-comments"></i> History
								<div class="pull-right">
									<div class="btn-group">
										Filter By :
										<a id="filter-menu" class="dropdown-toggle" data-toggle="dropdown" href=""> All Users
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu dropdown-menu-right" role="menu" style="left: auto;">
											<li><a href="#">All Users</a></li>
											<?php foreach ($users2 as $row):?>
										  	<li><a href="#"><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></a></li>
										  	<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
							<?php if(!empty($logs)): ?>
							<div class="panel-body">
								<ul class="timeline">
									<?php foreach ($logs as $log):?>
									<li class="timeline-inverted">
										<div class="timeline-badge">
											<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$log['avatar']); ?>">
										</div>
										<div class="timeline-panel">
											<div class="timeline-heading">
												<p>
													<strong class="bdo-name"><?php echo strtoupper($log['ulast_name'].', '.$log['ufirst_name'].' '.$log['umiddle_name']); ?></strong>
												</p>
												<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($log['created_at']),'m/d/y H:i:s'); ?></small>
											</div>
											<div class="timeline-body">
												<em><?php echo strtoupper($log['last_name'].', '.$log['first_name'].' '.$log['middle_name']); ?> ( <?php echo $log['grouptype_desc']; ?>)</em>
												<p><?php echo $log['remarks']; ?></p>
												<?php echo $log['details']; ?>
											</div>
										</div>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif; ?>
						</div>
					</div>
			  	</div>
			</div>
		</div>


	</div>
</div>
<!-- /.row -->



<script type="text/delayscript">
$(".dropdown-menu li a").click(function(){
    var filter_text = $(this).text();
    $("#filter-menu:first-child").html(filter_text+' <span class="caret"></span>');

    $(".timeline li").each(function () {
        if(filter_text != "All Users"){
            if ($(this).find(".bdo-name").text() == filter_text) {
                $(this).removeClass("hidden");
            } else {
                $(this).addClass("hidden"); 
            }
        }else{
            $(this).removeClass("hidden");
        }
        
    });
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	if($(e.target).attr('href') == "#history"){
		// console.log($(e.target).find('span').text());
		var count = $(e.target).find('span').text();
		if(count > 0){
			$('.timeline li .timeline-panel').slice(-count).css('border', '1px solid #449d44')
			$("html,body").animate({scrollTop: $('#history .timeline li:nth-last-child('+count+')').offset().top-30});
			var post_data = {
		        'project_id': <?php echo $project['id']; ?>,
		        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		    };

			$.ajax({
				type: "POST",
				url: domain + '/project/deletenotifications',
				data: post_data
			});
		}
	}
})
</script>