<?php echo form_open('admin/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="admin_name" class="col-md-4 control-label"><span class="text-danger">*</span>Admin Name </label>
		<div class="col-md-8">
			<input type="text" name="admin_name" value="<?php echo $this->input->post('admin_name'); ?>" class="form-control" id="admin_name" />
			<span class="text-danger"><?php echo form_error('admin_name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-md-4 control-label"><span class="text-danger">*</span>Username</label>
		<div class="col-md-8">
			<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
			<span class="text-danger"><?php echo form_error('username');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>password</label>
		<div class="col-md-8">
			<input password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
			<span class="text-danger"><?php echo form_error('password');?></span>
		</div>
	</div>
	
	<!-- <div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-8">
			<input type="text" name="mobile" maxlength="13"	 value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" maxlength="13" />
			<span class="text-danger"><?php echo form_error('mobile');?></span>
		</div>
	</div> -->
	<!-- <div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-8">
			<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
		</div>
	</div> -->
	<!-- <div class="form-group">
		<label for="paddress" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
		<div class="col-md-8">
			<textarea name="paddress" class="form-control" id="paddress"><?php echo $this->input->post('paddress'); ?></textarea>
			<span class="text-danger"><?php echo form_error('paddress');?></span>
		</div>
	</div> -->
<!-- 	<div class="form-group">
		<label for="taddress" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-8">
			<textarea name="taddress" class="form-control" id="taddress"><?php echo $this->input->post('taddress'); ?></textarea>
			<span class="text-danger"><?php echo form_error('taddress');?></span>
		</div>
	</div> -->
	<!-- <div class="form-group">
		<div class="checkbox col-md-4 control-label">
	      <label><input type="checkbox" name="optradio" id="check"><span style="font-weight: 13;">     If corresponding address is same as permanent address<span></label>
	    </div>
	</div> -->
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
       $('#check').click(function() {

    var c=$('#paddress').val();

    $("#taddress").val(c);
});
});


</script>