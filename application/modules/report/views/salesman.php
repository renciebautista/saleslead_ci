<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Salesman Report</h1>	
		<?php echo $this->session->flashdata('message');?>			
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form class="form-horizontal" role="form">
			<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label">Area</label>
		    	<div class="col-sm-6">
		      		<select class="form-control" data-placeholder="SELECT DEPARTMENT" id="department_id" name="department_id" class="medium" >
		      			<option value="0"></option>
					</select>
		    	</div>
		  	</div>

		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label">City / Province</label>
		    	<div class="col-sm-6">
		      		<select class="form-control" data-placeholder="SELECT DEPARTMENT" id="department_id" name="department_id" class="medium" >
		      			<option value="0"></option>
					</select>
		    	</div>
		  	</div>

		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label">Town</label>
		    	<div class="col-sm-6">
		      		<select class="form-control" data-placeholder="SELECT DEPARTMENT" id="department_id" name="department_id" class="medium" >
		      			<option value="0"></option>
					</select>
		    	</div>
		  	</div>

		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label">Project Status</label>
		    	<div class="col-sm-6">
		      		<select class="form-control" data-placeholder="SELECT DEPARTMENT" id="department_id" name="department_id" class="medium" >
		      			<option value="0"></option>
					</select>
		    	</div>
		  	</div>

		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label">Salesman</label>
		    	<div class="col-sm-6">
		      		<select class="form-control" data-placeholder="SELECT DEPARTMENT" id="department_id" name="department_id" class="medium" >
		      			<option value="0"></option>
					</select>
		    	</div>
		  	</div>

		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label">Keyword</label>
		    	<div class="col-sm-6">
		      		<select class="form-control" data-placeholder="SELECT DEPARTMENT" id="department_id" name="department_id" class="medium" >
		      			<option value="0"></option>
					</select>
		    	</div>
		  	</div>

		  	<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label"></label>
		    	<div class="col-sm-6">
		      		<input class="btn btn-success" type="submit" value="Process">
		    	</div>
		  	</div>

		</form>		
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<!-- <tr>
						<th>Department</th>
						<th style="width:100px;text-align: center;">Action</th>
					</tr> -->
				</thead>
				<tbody>
			
					<tr>
						<td colspan="2">No record found.</td>
					</tr>
				
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.col-lg-12 -->						
</div>
<!-- /.row -->
