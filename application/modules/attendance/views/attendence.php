<div class="row">
  <div class="col-md-6">

    <div class="card ">
      <div class="card-header">
        <h3 class="card-title">TAKE ATTENDANCE</h3>


      </div>

      <div class="card-body">
<form action="<?= base_url()?>attendance/fetchStudent" class="form-horizontal" method="post">
<div class="form-group">
	<label for="class_name" class="col-md-4 control-label"><span class="text-danger">*</span>Select Class For Attendence </label>
	<div class="col-md-8">
		<select id="attendance" name="attendance">
			<?php foreach($classes as $row) { ?>
				<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>

			<?php } ?>
		</select>
	

		<span class="text-danger"><?php echo form_error('attendance');?></span>
	</div>
</div>


<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Attendance Start</button>
	</div>
</div>
</form>
</div>
</div>
</div>
</div>
