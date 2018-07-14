<?php echo form_open('student/edit/'.$student['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
		<div class="col-md-8">
			<input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $student['password']); ?>" class="form-control" id="password" />
			<span class="text-danger"><?php echo form_error('password');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="student_name" class="col-md-4 control-label"><span class="text-danger">*</span>Student Name</label>
		<div class="col-md-8">
			<input type="text" name="student_name" value="<?php echo ($this->input->post('student_name') ? $this->input->post('student_name') : $student['student_name']); ?>" class="form-control" id="student_name" />
			<span class="text-danger"><?php echo form_error('student_name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $student['email']); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-md-4 control-label"><span class="text-danger">*</span>Username</label>
		<div class="col-md-8">
			<input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $student['username']); ?>" class="form-control" id="username" />
			<span class="text-danger"><?php echo form_error('username');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-8">
			<input type="text" name="mobile" maxlength="13" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $student['mobile']); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?php echo form_error('mobile');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-8">
			<input type="text" name="profile_image" value="<?php echo ($this->input->post('profile_image') ? $this->input->post('profile_image') : $student['profile_image']); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Address</label>
		<div class="col-md-8">
			<textarea name="address" class="form-control" id="address"><?php echo ($this->input->post('address') ? $this->input->post('address') : $student['address']); ?></textarea>
			<span class="text-danger"><?php echo form_error('address');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
