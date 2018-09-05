<?php echo form_open('subject/edit/'.$subject['id'],array("class"=>"form-horizontal")); ?>

	
	<div class="form-group">
		<label for="subject_name" class="col-md-4 control-label"><span class="text-danger">*</span>Subject Name</label>
		<div class="col-md-4">
			<input type="text" name="subject_name" value="<?php echo ($this->input->post('subject_name') ? $this->input->post('subject_name') : $subject['name']); ?>" class="form-control" id="subject_name" />
			<span class="text-danger"><?php echo form_error('subject_name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
