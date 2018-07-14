<?php echo form_open_multipart('trainer/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="trainer_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Trainer Name</label>
		<div class="col-md-8">
			<input type="text" name="trainer_Name" value="<?php echo $this->input->post('trainer_Name'); ?>" class="form-control" id="trainer_Name" />
			<span class="text-danger"><?php echo form_error('trainer_Name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="qualification" class="col-md-4 control-label"><span class="text-danger">*</span>Qualification</label>
		<div class="col-md-8">
			<input type="text" name="qualification" value="<?php echo $this->input->post('qualification'); ?>" class="form-control" id="qualification" />
			<span class="text-danger"><?php echo form_error('qualification');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-md-4 control-label"><span class="text-danger">*</span>UserName</label>
		<div class="col-md-8">
			<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
			<span class="text-danger"><?php echo form_error('username');?></span>
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
		<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
		<div class="col-md-8">
			<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
			<span class="text-danger"><?php echo form_error('password');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-8">
			<input type="text" name="mobile" maxlength="13" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?php echo form_error('mobile');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-8">
			<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Address</label>
		<div class="col-md-8">
			<textarea name="address" class="form-control" id="address"><?php echo $this->input->post('address'); ?></textarea>
			<span class="text-danger"><?php echo form_error('address');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>