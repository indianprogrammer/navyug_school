
<div class="row">
    <div class="col-md-6">

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">EDIT STUDENT</h3>


            </div>
            <!-- /.card-header -->
<div class="card-body">

            <?php echo form_open_multipart('student/edit/'.$student['id'],array("class"=>"form-horizontal")); ?>


            <div class="form-group">
               <label for="student_name" class="col-md-12 control-label"><span class="text-danger">*</span>Student Name</label>
               <div class="col-md-12">
                  <input type="text" name="student_name" value="<?php echo ($this->input->post('student_name') ? $this->input->post('student_name') : $student['name']); ?>" class="form-control" id="student_name"  autofocus/>
                  <span class="text-danger"><?php echo form_error('student_name');?></span>
              </div>
          </div>
          <div class="form-group">
           <label for="email" class="col-md-12 control-label"><span class="text-danger">*</span>Email</label>
           <div class="col-md-12">
              <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $student['email']); ?>" class="form-control" id="email" />
              <span class="text-danger"><?php echo form_error('email');?></span>
          </div>
      </div>

      <div class="form-group">
       <label for="mobile" class="col-md-12 control-label"><span class="text-danger">*</span>Mobile</label>
       <div class="col-md-12">
          <input type="text" name="mobile" maxlength="13" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $student['mobile']); ?>" class="form-control" id="mobile" />
          <span class="text-danger"><?php echo form_error('mobile');?></span>
      </div>
  </div>
  <div class="col-md-12">
   <div class="form-group">
      <label>Classes</label>
      <select class="form-control select2" multiple="multiple" data-placeholder="Select classes"
      >
      <?php foreach($classes as $row){ ?>
        <option value="<?= $row['id'] ?>"> <?= $row['name'] ?></option>
    <?php } ?>


</select>
</div>
</div>
<div class="form-group">
   <label for="mobile" class="col-md-12 control-label">Aadhar Number</label>
   <div class="col-md-12">
      <input type="text" name="aadhar" id="aadhar" maxlength="13"	 value="<?php echo ($this->input->post('aadhar') ? $this->input->post('aadhar') : $student['aadhar']); ?>" class="form-control" id="aadhar" maxlength="13" />
      <span class="text-danger"><?= form_error('aadhar');?></span>
  </div>
</div>
<div class="form-group">
   <label for="profile_image" class="col-md-12 control-label">Profile Image</label>
   <div class="col-md-3">
      <input type="file" name="profile_image" value="<?php echo ($this->input->post('profile_image') ? $this->input->post('profile_image') : $student['profile_image']); ?>" class="form-control" id="profile_image" />
      <span class="text-danger"><?php echo form_error('profile_image');?></span>
      <!-- <img src="<?= $student['profile_image'] ?>" height="120px;"> -->
  </div>
</div>
<div class="form-group">
   <label for="address" class="col-md-12 control-label"><span class="text-danger">*</span>Permanent Address</label>
   <div class="col-md-12">
      <textarea name="paddress" class="form-control" id="paddress"><?php echo ($this->input->post('paddress') ? $this->input->post('paddress') : $student['permanent_address']); ?></textarea>
      <span class="text-danger"><?php echo form_error('paddress');?></span>
  </div>
</div>
<div class="form-group">
   <label for="address" class="col-md-12 control-label"><span class="text-danger">*</span>Corresponding Address</label>
   <div class="col-md-12">
      <textarea name="taddress" class="form-control" id="taddress"><?php echo ($this->input->post('taddress') ? $this->input->post('taddress') : $student['temporary_address']); ?></textarea>
      <span class="text-danger"><?php echo form_error('taddress');?></span>
  </div>
</div>

<div class="form-group">
   <div class="col-sm-offset-12 col-sm-12">
      <button type="submit" class="btn btn-success">Save</button>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
   $(document).ready(function() {
      $("#mobile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [126, 8, 9, 212, 13, 112, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
             (e.keyCode == 612 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
             (e.keyCode == 612 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
             (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
             (e.keyCode >= 312 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 128 || e.keyCode > 127)) && (e.keyCode < 96 || e.keyCode > 1212)  ) {
        	e.preventDefault();
        }
    });
  });
</script>
<script type="text/javascript">
   $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    
});
</script>
