<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Statuses</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('role' => 'search', 'method' => 'get' , 'class' => 'form-validate')); ?>
			<div class="pull-right">
				<a href="<?php echo base_url('prjstatus/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Project Status</a>		
			</div>
			<div class="input-group custom-search-form">
				<input type="text" name="q" class="form-control" placeholder="Search..." value="<?php echo $filter; ?>">
					<span class="input-group-btn">
					<button class="btn btn-default" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
			<!-- /input-group -->
		<?php echo form_close(); ?>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->


<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Project Status</th>
						<th>Remarks</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($prjstatuses) < 1): ?>
					<tr>
						<td colspan="2">No record found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($prjstatuses as $prjstatus):?>
					<tr>
						<td><?php echo $prjstatus['prjstatus_desc']; ?></td>
						<td><?php echo nl2br($prjstatus['remarks']); ?></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('prjstatus/edit/'.$prjstatus['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('prjstatus/delete/'.$prjstatus['id']); ?>" >Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
