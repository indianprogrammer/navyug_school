<div class="row" >
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header with-border">
                <h2 class="card-title">ADD ADMIN</h2>
            </div>
             <div class="card-body">











<?php echo form_open_multipart('superadmin/adminAdd',array("class"=>"form-horizontal")); ?>
	
	<div class="form-group">
		<label for="type" class="col-md-4 control-label"><span class="text-danger">*</span>For School</label>
		<div class="col-md-4">
			<!-- <input type="text" name="type" value="<?php echo $this->input->post('type'); ?>" class="form-control" id="type" /> -->
			<select name="school_id" class="form-control" id="type" autofocus>
				<option>--select--</option>
				<?php foreach($school as $row)  {     ?>
				<option value="<?= $row['id'] ?>"><?=  $row['organization_name']     ?></option>
			<?php } ?>
		</select>
			<span class="text-danger"><?php echo form_error('type');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="employee_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Admin Name</label>
		<div class="col-md-4">
			<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name"   />
			<span class="text-danger"><?php echo form_error('employee_Name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-4">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-4">
			<input type="text" name="mobile" maxlength="13" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?php echo form_error('mobile');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-4">
			<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="paddress" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
		<div class="col-md-4">
			<textarea name="paddress" class="form-control" id="paddress"><?php echo $this->input->post('paddress'); ?></textarea>
			<span class="text-danger"><?php echo form_error('paddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<div class="checkbox col-md-5 control-label">
	      <label><input type="checkbox" name="optradio" id="check"><span style="font-weight: 13;">    If corresponding address is same as permanent address</span></label>
	    </div>
	</div>
	<div class="form-group">
		<label for="taddress" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-4">
			<textarea name="taddress" class="form-control" id="taddress"><?php echo $this->input->post('taddress'); ?></textarea>
			<span class="text-danger"><?php echo form_error('taddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>
</div>
</div>
</div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- script for checkbox -->
<script>
$(document).ready(function(e) {
       $('#check').click(function() {

    var c=$('#paddress').val();

    $("#taddress").val(c);
});
});


</script>