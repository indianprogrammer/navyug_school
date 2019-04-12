

<div class="row">
	<div class="col-md-5">

		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">ADD DRIVER</h3>


			</div>
			<!-- /.card-header -->
			<div class="card-body">




				<?= form_open('transport/add_vehicle_process',array("class"=>"form-horizontal","id"=>"form_validation")); ?>
				<div class="row">
					
        			<div class="col-md-9">
						<div class="form-group">
							<label for="vehicle_no" class="col-md-12 control-label"><span class="text-danger">*</span> Vehicle No.</label>
							<select class="form-control" name="vehicle_no"> 
								<option value="">--select--</option>
								<?php foreach ($vehicle as $row) {  ?>
									<option value="<?= $row['id'] ?>"><?= $row['vehicle_no']  ?> </option>
							 <?php 	} ?>
							</select>
							<span class="text-danger"><?= form_error('vehicle_no');?></span>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label for="seats" class="col-md-12 control-label"><span class="text-danger">*</span>Driver Name</label>
							<input type="text" name="seats" value="<?= $this->input->post('seats'); ?>" class="form-control" id="seats" s  required/>
							<span class="text-danger"><?= form_error('seats');?></span>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label for="licence" class="col-md-12 control-label"><span class="text-danger">*</span>License Number</label>
							<input type="text" name="licence" value="<?= $this->input->post('licence'); ?>" class="form-control" id="licence"   required/>
							<span class="text-danger"><?= form_error('licence');?></span>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label for="mobile" class="col-md-12 control-label"><span class="text-danger">*</span>Mobile</label>
							<input type="text" name="mobile" value="<?= $this->input->post('mobile'); ?>" class="form-control" id="mobile"   required/>
							<span class="text-danger"><?= form_error('mobile');?></span>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label for="track_id" class="col-md-12 control-label">Address</label>
							<textarea class="form-control" name="address"></textarea>
							<span class="text-danger"><?= form_error('address');?></span>
						</div>
					</div>
        		</div>
        <div class="form-group">
        	<div class="col-sm-offset-4 col-sm-8">
        		<button type="submit" class="btn btn-success">ADD</button>
        	</div>
        </div>

        <?= form_close(); ?>
    </div>
</div>
</div>



<div class="col-md-7">
	<div class="card">
            <div class="card-header">
                <h3 class="card-title">Driver List</h3>
                
            </div>
<div class="card-body">
  <div class="table-responsive">
<table id="vehicle_table" class="table  table-bordered table-hover">
    <thead>
    <tr>
    	<th>Vehicle no</th>
    	<th>Driver name</th>
    	<th>mobile</th>
    	<th>Licence No</th>
    	<!-- <th>person mobile</th> -->
    </tr>
</thead>
<tbody>
	<?php foreach($driver as $row) { ?>
		<tr>
			<td><?= $row['vehicle_no'] ?></td>
			<td><?= $row['name'] ?></td>
			<td><?= $row['mobile'] ?></td>
			<td><?= $row['licence_no'] ?></td>
			

		</tr>
	<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>















</div>

<!-- <script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script> -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/admin/js/form_validation.js"></script>

<script type="text/javascript">
	 $(document).ready( function () {
        $('#vehicle_table').DataTable();
    } );




  


</script>