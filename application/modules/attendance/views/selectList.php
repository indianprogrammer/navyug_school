<?= form_open('attendance/show_report',array('class'=>'form-horizontal')) ?>
<div class="form-group">
	<label for="class_name" class="col-md-4 control-label"><span class="text-danger">*</span>Select Class and date For Attendence report </label>
	<div class="col-md-8">
		<select id="attendance" name="classId">
			<?php foreach($classes as $row) { ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>

			<?php } ?>
		</select>
	

		<span class="text-danger"><?php echo form_error('attendance');?></span>
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">select date</label>
	<div class="col-md-8">
		<input type="date" name="date_select">
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Show report</button>
	</div>
</div>
<?= form_close(); ?>