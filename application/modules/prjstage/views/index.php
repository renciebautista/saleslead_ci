<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Project Stages</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open('',array('class' => 'navbar-form', 'role' => 'search', 'method' => 'get')); ?>
			<a href="<?php echo base_url('prjstage/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i>  Project Stage</a>		
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
						<th>Project Stages</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($prjstages) < 1): ?>
					<tr>
						<td colspan="2">Record not found.</td>
					</tr>
				<?php else: ?>
				<?php foreach ($prjstages as $prjstage):?>
					<tr>
						<td><?php echo $prjstage['prjstage_desc']; ?></td>
						<td style="width:100px;text-align: center;">
							<a href="<?php echo base_url('prjstage/edit/'.$prjstage['id']); ?>" >Edit</a>
							<a href="<?php echo base_url('prjstage/delete/'.$prjstage['id']); ?>" >Delete</a>
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
