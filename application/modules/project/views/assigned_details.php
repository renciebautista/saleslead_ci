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
			<div id="details">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments"></i> Project Details

						<?php $this->load->view('shared/project/_comment_filter'); ?>
					</div>
					<?php $this->load->view('shared/project/_history'); ?>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- /.row -->

<script type="text/delayscript">
$(document).ready(function(){

	$(".dropdown-menu li a").click(function(){
		var filter_text = $(this).text();
		$("#filter-menu:first-child").html(filter_text+' <span class="caret"></span>');

		$(".timeline .timeline-inverted").each(function () {
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
	var count = $("#tab .active .badge").text();
	if(count > 0){
		$('.timeline li .timeline-panel').slice(-count).css('border', '1px solid #449d44')
		$("html,body").animate({scrollTop: $('.timeline .timeline-inverted:nth-last-child('+count+')').offset().top-30});
	}
	
});
</script>


