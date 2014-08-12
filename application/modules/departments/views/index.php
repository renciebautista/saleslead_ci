<h1 class="page-header">Departments</h1>

<div class="page-header-button">
	<a href="<?php echo base_url('departments/create'); ?>" class="btn btn-primary">New Department</a>
</div>

<?php echo $this->session->flashdata('message');?>

<table class="table table-striped table-bordered">
	<thead>
	  	<tr>
			<th>Department</th>
			<th style="width:12%">Action</th>
	  	</tr>
	</thead>
	<tbody>
		<?php if(empty($departments)): ?>
		<tr>
			<td colspan="2">
				No record found.
			</td>
	  	</tr>
		<?php else: ?>
		<?php foreach ($departments as $department):?>
	  	<tr>
			<td>
				<?php echo $department->department; ?>
			</td>
			<td align="center">
				<a class="btn btn-primary btn-sm" href="<?php echo base_url('departments/edit/'.$department->id); ?>">Edit</a> 
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('departments/delete/'.$department->id); ?>">Delete</a>
			</td>
	  	</tr>
	  	<?php endforeach;?>
	  	<?php endif; ?>
	</tbody>
</table>