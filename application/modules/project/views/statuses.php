<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
    <div class="col-lg-12 header-button">
        <a class="btn btn-default" href="<?php echo base_url('project/assigned'); ?>">
            <i class="fa fa-reply"></i> Back
        </a>
    </div>
    <!-- /.col-lg-12 -->                        
</div>
<!-- /.row -->

<?php $this->load->view('shared/project/_project_name_address'); ?>

<div class="row">
	<div class="col-lg-12">
		<?php $this->load->view('shared/project/_assigned_tab_header'); ?>

		<div class="tab-content">
			<div id="details">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Status
							<?php $this->load->view('shared/project/_comment_filter'); ?>
					</div>
					<?php if(!empty($status)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($status as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong class="bdo-name"><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p>Updated to <?php echo($row['prjstatus_desc']); ?></p>
										<p><?php echo nl2br($row['remarks']); ?></p>
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
</script>
