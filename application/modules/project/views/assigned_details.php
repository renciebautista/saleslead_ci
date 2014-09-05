<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Details</h1>				
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div id="project-details" class="col-lg-12">
		<table class="table">
			<tbody>
				<tr>
					<td>Project Name</td>
					<td><?php echo $project['project_name']; ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo ucwords(strtolower($project['lot'].' '.$project['street'].' '.$project['brgy'].', '.$project['city'].' '.$project['province'])); ?></td>
				</tr>
				<tr>
					<td>Owner</td>
					<td><?php echo $project['owner_name']; ?></td>
				</tr>
				<tr>
					<td>Owner Address</td>
					<td><?php echo ucwords(strtolower($project['owner_lot'].' '.$project['owner_street'].' '.$project['owner_brgy'].', '.$project['owner_city'].' '.$project['owner_province'])); ?></td>
				</tr>
				<tr>
					<td>Classification</td>
					<td><?php echo $project['prjclassification_desc']; ?></td>
				</tr>
				<tr>
					<td>Category</td>
					<td><?php echo $project['prjcategory_desc']; ?></td>
				</tr>
				<tr>
					<td>Sub Category</td>
					<td><?php echo $project['prjsubcategory_desc']; ?></td>
				</tr>
				<tr>
					<td>Stage</td>
					<td><?php echo $project['prjstage_desc']; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo $project['prjstatus_desc']; ?></td>
				</tr>
				<tr>
					<td>Estimated Amount</td>
					<td><?php echo number_format($project['estimated_amount'],2); ?></td>
				</tr>
				<tr>
					<td>Created By</td>
					<td><?php echo strtoupper($project['last_name'].', '.$project['first_name'].' '.$project['middle_name']); ?></td>
				</tr>
				<tr>
					<td>Date Created</td>
					<td><?php echo number_format($project['estimated_amount'],2); ?></td>
				</tr>
				<tr>
					<td>Date Started</td>
					<td></td>
				</tr>
				<tr>
					<td>Date Completed</td>
					<td></td>
				</tr>

			</tbody>
		</table>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<h4>Project Won/Loss By <i>(Win/Loss statement)</i></h4>
		<p><i><?php echo nl2br($project['project_details']); ?></i></p>
		
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<h4>Details</h4>
		<p><i><?php echo nl2br($project['project_details']); ?></i></p>
		
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<!-- <div class="panel panel-default"> -->
			<!-- <div class="panel-footer"> Painting Specification <i>(Coating System)</i> </div> -->
			<!-- <div class="panel-body"> -->
				<div class="table-responsive">
					<table class="table">
						<thead>
						<tr>
							<th>Type</th>
							<th>Painting Specification <i>(Coating System)</i></th>
							<th>Area <i>(SqM)</i></th>
							<th>Paint Requirement <i>(Ltrs.)</i></th>
							<th>Panting Cost <i>(Php)</i></th>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td>Exterior</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			<!-- </div>	 -->
		<!-- </div> -->
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div id="prj-photo" class="col-lg-12">
		<h4>Photos</h4>
		<div class="col-lg-4">
			<div class="panel panel-default">
				
				<div class="panel-body">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">

				</div>
				<div class="panel-footer"> Before Painting 
					<span class="pull-right text-muted small">
						<em>Jun 20,2014</em>
					</span>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-default">
				
				<div class="panel-body">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">

				</div>
				<div class="panel-footer"> During Painting 
					<span class="pull-right text-muted small">
						<em>Aug 30, 2014</em>
					</span>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">
					<img class="img-thumbnail" alt="..." src="http://placehold.it/84x84">

				</div>
				<div class="panel-footer"> After Painting 
					<span class="pull-right text-muted small">
						<em>Sep 5, 2014</em>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->