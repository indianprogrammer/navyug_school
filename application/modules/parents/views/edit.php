<?= form_open('parents/edit/'.$parent['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="parent_Name" class="col-md-4 control-label"><span class="text-danger">*</span> Name</label>
		<div class="col-md-8">
			<input type="text" name="parent_Name" value="<?= ($this->input->post('parent_Name') ? $this->input->post('parent_Name') : $parent['name']); ?>" class="form-control" id="parent_Name" />
			<span class="text-danger"><?= form_error('parent_Name');?></span>
		</div>
	</div>
	<!-- <div class="form-group">
		<label for="qualification" class="col-md-4 control-label"><span class="text-danger">*</span>Qualification</label>
		<div class="col-md-8">
			<input type="text" name="qualification" value="<?= ($this->input->post('qualification') ? $this->input->post('qualification') : $parent['qualification']); ?>" class="form-control" id="qualification" />
			<span class="text-danger"><?= form_error('qualification');?></span>
		</div>
	</div> -->
	<div class="form-group">
		<label for="username" class="col-md-4 control-label"><span class="text-danger">*</span>UserName</label>
		<div class="col-md-8">
			<input type="text" name="username" value="<?= ($this->input->post('username') ? $this->input->post('username') : $parent['username']);  ?>" class="form-control" id="username" />
			<span class="text-danger"><?= form_error('username');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?= ($this->input->post('email') ? $this->input->post('email') : $parent['email']); ?>" class="form-control" id="email" />
			<span class="text-danger"><?= form_error('email');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
		<div class="col-md-8">
			<input type="text" name="password" value="<?= ($this->input->post('password') ? $this->input->post('password') : $parent['password']); ?>" class="form-control" id="password" />
			<span class="text-danger"><?= form_error('password');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-8">
			<input type="text" name="mobile" value="<?= ($this->input->post('mobile') ? $this->input->post('mobile') : $parent['mobile']); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?= form_error('mobile');?></span>
		</div>
	</div>
	<!-- <div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-8">
			<input type="text" name="profile_image" value="<?= ($this->input->post('profile_image') ? $this->input->post('profile_image') : $parent['profile_image']); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?= form_error('profile_image');?></span>
		</div>
	</div> -->
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Address</label>
		<div class="col-md-8">
			<textarea name="address" class="form-control" id="address"><?= ($this->input->post('address') ? $this->input->post('address') : $parent['address']); ?></textarea>
			<span class="text-danger"><?= form_error('address');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?= form_close(); ?>