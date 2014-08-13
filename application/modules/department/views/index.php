<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#">Tables</a></li>
			<li><a href="#">Simple Tables</a></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<h4 class="page-header">Departments</h4>
		<a class="btn btn-success" href="">Department</a>
	</div>

	<div class="col-xs-12">
		<div class="box no-drop">
			<div class="box-content no-padding">
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							<th>Department</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if(count($departments) > 0): ?>
					<?php foreach ($departments as $department):?>
						<tr>
							<td><?php echo $department['department']; ?></td>
							<td>SQL server</td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="2">No record found.</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

