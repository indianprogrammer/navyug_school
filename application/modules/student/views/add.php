<?= form_open_multipart('student/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="student_name" class="col-md-4 control-label"><span class="text-danger">*</span>Student Name</label>
		<div class="col-md-5">
			<input type="text" name="student_name" value="<?= $this->input->post('student_name'); ?>" class="form-control" id="student_name" />
			<span class="text-danger"><?= form_error('student_name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-5">
			<input type="text" name="email" value="<?= $this->input->post('email'); ?>" class="form-control" id="email"  autofocus/>
			<span class="text-danger"><?= form_error('email');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-5">
			<input type="text" name="mobile" maxlength="13"	 value="<?= $this->input->post('mobile'); ?>" class="form-control" id="mobile" maxlength="13" />
			<span class="text-danger"><?= form_error('mobile');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-5">
			<input type="file" name="profile_image" value="<?= $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?= form_error('profile_image');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="paddress" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
		<div class="col-md-5">
			<textarea name="paddress" class="form-control" id="paddress"><?= $this->input->post('paddress'); ?></textarea>
			<span class="text-danger"><?= form_error('paddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="taddress" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-5">
			<textarea name="taddress" class="form-control" id="taddress"><?= $this->input->post('taddress'); ?></textarea>
			<span class="text-danger"><?= form_error('taddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<div class="checkbox col-md-4 control-label">
	      <label><input type="checkbox" name="optradio" id="check"><span style="font-weight: 13;">     If corresponding address is same as permanent address<span></label>
	    </div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?= form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
       $('#check').click(function() {

    var c=$('#paddress').val();

    $("#taddress").val(c);
});
});


</script>