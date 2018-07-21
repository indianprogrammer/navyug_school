<?= form_open('parents/edit/'.$parent['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="parent_Name" class="col-md-4 control-label"><span class="text-danger">*</span> Name</label>
		<div class="col-md-5">
			<input type="text" name="parent_Name" value="<?= ($this->input->post('parent_Name') ? $this->input->post('parent_Name') : $parent['name']); ?>" class="form-control" id="parent_Name" />
			<span class="text-danger"><?= form_error('parent_Name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-5">
			<input type="text" name="email" value="<?= ($this->input->post('email') ? $this->input->post('email') : $parent['email']); ?>" class="form-control" id="email" />
			<span class="text-danger"><?= form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-5">
			<input type="text" name="mobile" value="<?= ($this->input->post('mobile') ? $this->input->post('mobile') : $parent['mobile']); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?= form_error('mobile');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
		<div class="col-md-5">
			<textarea name="paddress" class="form-control" id="address"><?= ($this->input->post('paddress') ? $this->input->post('paddress') : $parent['permanent_address']); ?></textarea>
			<span class="text-danger"><?= form_error('paddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-5">
			<textarea name="taddress" class="form-control" id="taddress"><?= ($this->input->post('taddress') ? $this->input->post('taddress') : $parent['temporary_address']); ?></textarea>
			<span class="text-danger"><?= form_error('taddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?= form_close(); ?>