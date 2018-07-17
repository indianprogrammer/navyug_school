<?php echo form_open_multipart('subject/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="subject_name" class="col-md-4 control-label"><span class="text-danger">*</span>Enter Subject Name</label>
		<div class="col-md-6">
			<input type="text" name="subject_name" value="<?php echo $this->input->post('subject_name'); ?>" class="form-control" id="student_name" data-toggle="tooltip" title="tips- maths,physics...etc" />
			<span class="text-danger"><?php echo form_error('subject_name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">ADD</button>
        </div>
	</div>

<?php echo form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
