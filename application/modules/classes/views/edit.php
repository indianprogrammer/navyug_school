<?php echo form_open('classes/edit/'.$classes['id'],array("class"=>"form-horizontal")); ?>

	
	<div class="form-group">
		<label for="class_name" class="col-md-4 control-label"><span class="text-danger">*</span>class Name</label>
		<div class="col-md-8">
			<input type="text" name="class_name" value="<?php echo ($this->input->post('class_name') ? $this->input->post('class_name') : $class['class_name']); ?>" class="form-control" id="class_name" />
			<span class="text-danger"><?php echo form_error('class_name');?></span>
		</div>
	</div>

	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Address</label>
		<div class="col-md-8">
			<textarea name="address" class="form-control" id="address"><?php echo ($this->input->post('address') ? $this->input->post('address') : $class['address']); ?></textarea>
			<span class="text-danger"><?php echo form_error('address');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
