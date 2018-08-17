
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<?= form_open_multipart('student/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="student_name" class="col-md-4 control-label"><span class="text-danger">*</span>Student Name</label>
		<div class="col-md-5">
			<input type="text" name="student_name" value="<?= $this->input->post('student_name'); ?>" class="form-control" id="student_name" autofocus />
			<span class="text-danger"><?= form_error('student_name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-5">
			<input type="text" name="email" value="<?= $this->input->post('email'); ?>" class="form-control" id="email"  />
			<span class="text-danger"><?= form_error('email');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label">Mobile</label>
		<div class="col-md-5">
			<input type="text" name="mobile" id="mobile" maxlength="13"	 value="<?= $this->input->post('mobile'); ?>" class="form-control" id="mobile" maxlength="13" />
			<span class="text-danger"><?= form_error('mobile');?></span>
		</div>
	</div>
	<div class="form-group" style="width:600px">
		<label for="class" class="col-md-4 control-label"><span class="text-danger">*</span>Select Classes</label>
		<div class="col-md-5">
			<select name="classes[]" id="multiselect" class="form-control"  multiple="multiple">
			<?php	foreach($classes as $row){ ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>
				<?php } ?>
			</select>
			<span class="text-danger"><?= form_error('classes');?></span>

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
		<div class="checkbox col-md-5 control-label">
	      <label><input type="checkbox" name="optradio" id="check"><span style="font-weight: 13;">     If corresponding address is same as permanent address<span></label>
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
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?= form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script>
$(document).ready(function(e) {
       $('#check').click(function() {

    var c=$('#paddress').val();

    $("#taddress").val(c);
});
});


</script>
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
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)  ) {
            e.preventDefault();
        }
    });
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
 $('#multiselect').multiselect({
  nonSelectedText: 'Select Classes',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'430px'
 });
});
</script>