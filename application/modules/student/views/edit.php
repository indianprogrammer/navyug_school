<?php echo form_open('student/edit/'.$student['id'],array("class"=>"form-horizontal")); ?>

	
	<div class="form-group">
		<label for="student_name" class="col-md-4 control-label"><span class="text-danger">*</span>Student Name</label>
		<div class="col-md-5">
			<input type="text" name="student_name" value="<?php echo ($this->input->post('student_name') ? $this->input->post('student_name') : $student['student_name']); ?>" class="form-control" id="student_name"  autofocus/>
			<span class="text-danger"><?php echo form_error('student_name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-5">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $student['email']); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-5">
			<input type="text" name="mobile" maxlength="13" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $student['mobile']); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?php echo form_error('mobile');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-3">
			<input type="file" name="profile_image" value="<?php echo ($this->input->post('profile_image') ? $this->input->post('profile_image') : $student['profile_image']); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
			<img src="<?= $student['profile_image'] ?>" height="50px;">
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
		<div class="col-md-5">
			<textarea name="paddress" class="form-control" id="paddress"><?php echo ($this->input->post('paddress') ? $this->input->post('paddress') : $student['permanent_address']); ?></textarea>
			<span class="text-danger"><?php echo form_error('paddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-5">
			<textarea name="taddress" class="form-control" id="taddress"><?php echo ($this->input->post('taddress') ? $this->input->post('taddress') : $student['temporary_address']); ?></textarea>
			<span class="text-danger"><?php echo form_error('taddress');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#mobile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 25, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
             (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
             (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
             (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 55)) && (e.keyCode < 96 || e.keyCode > 105)  ) {
            e.preventDefault();
        }
    });
    });
</script>
