<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Update Group Privileges of '<?php echo $group['ugrp_name']; ?>'</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
<?php echo form_open('',array('role' => 'form', 'class' => 'form-validate')); ?>
<?php echo form_hidden('group_id', $group['ugrp_id']); ?>
<div class="row">
    <div class="col-lg-12">
		<div class="pull-left">
			<a href="<?php echo base_url('group'); ?>" class="btn btn-default"><i class="fa fa-reply"></i>  Back</a>
			<input class="btn btn-success" type="submit" value="Update">		
		</div>
	</div>                 
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
		<div class="table-responsive">
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width:10px;text-align: center;"></th>
						<th>Privilege Name</th>
						<th>Description</th>
						
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
						<td style="width:10px;text-align: center;">
							<input type="checkbox" name="privileges[]" value="<?php echo $privilege['upriv_id']; ?>" <?php echo ((in_array($privilege['upriv_id'], $selected)) ? 'checked="checked"' : NULL); ?> />
						</td>
						<td><?php echo $privilege['upriv_name']; ?></td>
						<td><?php echo $privilege['upriv_desc']; ?></td>
						
					</tr>
				<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>                 
</div>
<!-- /.row -->
<?php echo form_close(); ?>		


