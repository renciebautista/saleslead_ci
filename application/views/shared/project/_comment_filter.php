<div class="pull-right">
	<div class="btn-group">
		Filter By :
		<a id="filter-menu" class="dropdown-toggle" data-toggle="dropdown" href=""> All Users
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-right" role="menu" style="left: auto;">
			<li><a href="#">All Users</a></li>
			<?php foreach ($users as $row):?>
		  	<li><a href="#"><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></a></li>
		  	<?php endforeach; ?>
		</ul>
	</div>
</div>