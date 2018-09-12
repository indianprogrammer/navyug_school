<?php echo form_open_multipart('test/add',array("class"=>"form-horizontal")); ?>
	
	<!-- <div class="form-group">
		<label for="employee_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Employee Name</label>
		<div class="col-md-4">
			<input type="text" name="employee_Name" value="<?php echo $this->input->post('employee_Name'); ?>" class="form-control" id="employee_Name"  autofocus />
			<span class="text-danger"><?php echo form_error('employee_Name');?></span>
		</div>
	</div> -->
	
	<div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-4">
			<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
		</div>
	</div>
	
	<!-- <div class="form-group">
		<label for="profile" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-4">
			<input type="file" name="profile" value="<?php echo $this->input->post('profile'); ?>" class="form-control" id="profile" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
		</div>
	</div> -->
	
<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
<?php echo form_close(); ?>
<!-- <?= $this->uri->segment(1); ?>
<?=  
str_replace("_", "  ", "vivek_chourasiya") ?> -->