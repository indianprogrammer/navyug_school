<?php echo form_open('classes/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="class_name" class="col-md-4 control-label"><span class="text-danger">*</span>Class</label>
		<div class="col-md-4">
			<input type="text" name="class_name" value="<?php echo $this->input->post('class_name'); ?>" class="form-control" id="class_name"  autofocus />
			<span class="text-danger"><?php echo form_error('class_name');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="description" class="col-md-4  control-label">Description</label>
		<div class="col-md-4">
			<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
			<span class="text-danger"><?php echo form_error('description');?></span>
		</div>
	</div>
	<!-- <div class="form-group">
		<label for="subject" class="col-md-4 control-label"><span class="text-danger">*</span>Subject</label>
		<div class="col-md-5">
			<select  name="subject[]" class="selectpicker" multiple="multiple" id="multiselectSubject">
			
			<?php	foreach($subject as $row){ ?>
				<option value="<?= $row['id'] ?>" ><?= $row['name'] ?></option>
			<?php } ?>
			</select>
			<span class="text-danger"><?php echo form_error('subject');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="employee" class="col-md-4 control-label"><span class="text-danger">*</span>Employee</label>
		<div class="col-md-5 col-sm-10">
			<select  name="employee[]" class="selectpicker" multiple="multiple" id="multiselectEmployee">
				
			<?php	foreach($employee as $row){ ?>
				<option value="<?= $row['id'] ?>" ><?= $row['name'] ?></option>
			<?php } ?>
			</select>
			<span class="text-danger"><?php echo form_error('employee');?></span>
		</div>
	</div> -->
	<div class="form-group">
		<label class="col-md-4 control-label"><span class="text-danger">*</span>Select Classes</label>
	<div class="col-md-4 col-sm-12">
		<select class="form-control select2" multiple="multiple" data-placeholder="Select classes"  name="subject[]"
		>
		<?php	foreach($subject as $row){ ?>
				<option value="<?= $row['id'] ?>" ><?= $row['name'] ?></option>
			<?php } ?>
			</select>
      </div>
  </div>
      <div class="form-group">
		<label class="col-md-4 control-label"><span class="text-danger">*</span>Select Classes</label>
	<div class="col-md-4 col-sm-12">
		<select class="form-control select2" multiple="multiple" data-placeholder="Select classes"  name="employee[]"
		>
			<?php	foreach($employee as $row){ ?>
				<option value="<?= $row['id'] ?>" ><?= $row['name'] ?></option>
			<?php } ?>
			</select>
      </div>
     </div>
     
	<!-- <div class="form-group">
		<label for="start_time" class="col-md-4 control-label"><span class="text-danger">*</span>Start Time</label>
		<div class="col-md-5">
			<input type="text" name="start_time" value="<?php echo $this->input->post('start_time'); ?>" class="form-control" id="start_time" disable/>
			<span class="text-danger"><?php echo form_error('start_time');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="end_time" class="col-md-4 control-label"><span class="text-danger">*</span>End Time</label>
		<div class="col-md-5">
			<input type="text" name="end_time" value="<?php echo $this->input->post('end_time'); ?>" class="form-control" id="end_time" disable />
			<span class="text-danger"><?php echo form_error('end_time');?></span>
		</div>
	</div> -->
	
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>


 <script type="text/javascript">
        	$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    
});
</script>