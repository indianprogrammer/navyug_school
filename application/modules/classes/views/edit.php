<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">EDIT CLASS</h3>
                
            </div>
<div class="card-body">





<?= form_open('classes/edit/'.$class['id'],array("class"=>"form-horizontal")); ?>


<div class="form-group">
	<label for="class_name" class="col-md-10 control-label"><span class="text-danger">*</span>class Name</label>
	<div class="col-md-10">
		<input type="text" name="class_name" value="<?= ($this->input->post('class_name') ? $this->input->post('class_name') : $class['name']); ?>" class="form-control" id="class_name" />
		<span class="text-danger"><?= form_error('class_name');?></span>
	</div>
</div>

<div class="form-group">
	<label for="description" class="col-md-10 control-label"><span class="text-danger">*</span>Description</label>
	<div class="col-md-10">
		<textarea name="description" class="form-control" id="description"><?= ($this->input->post('description') ? $this->input->post('address') : $class['description']); ?></textarea>
		<span class="text-danger"><?= form_error('discription');?></span>
	</div>
</div>
<div class="form-group">
	<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Subjects</label>
	<div class="col-md-10 col-sm-12">
		<select class="form-control select2" multiple="multiple" data-placeholder="Select classes"  name="subject[]" style="width: 100%;"
		>
		<?php	foreach($subject as $row){
			foreach($selected_subject as $selected)
			{ 
				if($selected['subject_id']==$row['id'])
					{		?>	
						<option value="<?= $selected['subject_id'] ?>" selected ><?= $row['name'] ?></option>
					<?php 	} 

					else { 
				  ?>
				

						<option value="<?= $row['id'] ?>" ><?= $row['name'] ?></option>
					<?php 	 } }} ?>
					
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Employee</label>
			<div class="col-md-10 col-sm-12">
				<select class="form-control select2" multiple="multiple" data-placeholder="Select classes"  name="employee[]" style="width: 100%;"
				>
				<?php	foreach($employee as $row){ ?>
					<option value="<?= $row['id'] ?>" ><?= $row['name'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<!-- <div class="form-group">
		<label for="start_time" class="col-md-10 control-label">Start Time</label>
		<div class="col-md-10">
			<input type="text" name="start_time" value="<?= $this->input->post('start_time'); ?>" class="form-control" id="start_time" disable/>
			<span class="text-danger"><?= form_error('start_time');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="end_time" class="col-md-10 control-label">End Time</label>
		<div class="col-md-10">
			<input type="text" name="end_time" value="<?= $this->input->post('end_time'); ?>" class="form-control" id="end_time" disable />
			<span class="text-danger"><?= form_error('end_time');?></span>
		</div>
	</div> -->
	
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-10">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
	
	<?= form_close(); ?>
</div>
</div>
</div>
</div>
	<script type="text/javascript">
		$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    
});
</script>