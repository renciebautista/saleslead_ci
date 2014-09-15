<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Update Group Privileges of '<?php echo $group['ugrp_name']; ?>'</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->



<div class="row">
	<?php echo form_open('');?>  	
	<?php echo form_hidden('group_id', $group['ugrp_id']); ?>
	<div class="col-lg-12">
		<div class="pull-left">
			<a href="<?php echo base_url('group'); ?>" class="btn btn-default"><i class="fa fa-reply"></i>  Back</a>
			<input class="btn btn-success" type="submit" value="Update">		
		</div>
	</div>
	<div class="col-lg-12">
		
		

		<div class="table-responsive">
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Privilege Name</th>
						<th>Description</th>
						<th style="width:120px;text-align: center;">Has Privilege</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($privileges) < 1): ?>
					<tr>
						<td colspan="3">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($privileges as $privilege):?>
					<tr>
						<td><?php echo $privilege['upriv_name']; ?></td>
						<td><?php echo $privilege['upriv_desc']; ?></td>
						<td style="width:100px;text-align: center;">
							<input type="checkbox" name="privileges[]" value="<?php echo $privilege['upriv_id']; ?>" <?php echo ((in_array($privilege['upriv_id'], $selected)) ? 'checked="checked"' : NULL); ?> />
						</td>
					</tr>
				<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
		
	</div>
	<!-- /.col-lg-12 -->
	<?php echo form_close(); ?>						
</div>
<!-- /.row -->
