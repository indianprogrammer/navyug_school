<div class="row">
	<div class="col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">ADD BATCH</h3>

			</div>
			<div class="card-body">






				<?php echo form_open('classes/add_batch_process',array("class"=>"form-horizontal","id"=>"form_validation")); ?>
				<div class="form-group">
					<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Course</label>
					<div class="col-md-10">
						<select class="form-control"  data-placeholder="Select Courses"  name="course" style="width: 100%;" required="required" autofocus
						>
                        <option value="">-select-</option>
						<?php	foreach($course as $row){ ?>
							<option value="<?= $row['id'] ?>" ><?= $row['course_name'] ?></option>
						<?php } ?>
					</select>
                <span class="text-danger"><?php echo form_error('course');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="batch_name" class="col-md-10 control-label"><span class="text-danger">*</span>Batch Name</label>
				<div class="col-md-10">
					<input type="text" name="batch_name" value="<?php echo $this->input->post('batch_name'); ?>" class="form-control" id="batch_name" required   />
					<span class="text-danger"><?php echo form_error('batch_name');?></span>
				</div>
			</div>

			<div class="col-md-10">
				<label  class="control-label"><span class="text-danger">*</span>Start Date</label>
				<div class="form-group">
					<!-- <div class="form-group"> -->
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div> -->
                    <input type="text" class="form-control datemask" required   name="start_date" id="start_date" >
                </div>
                <span class="text-danger"></span>
            </div>
            <div class="col-md-10">
				<label  class="control-label"><span class="text-danger">*</span>End Date</label>
				<div class="form-group">
					<!-- <div class="form-group"> -->
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div> -->
                    <input type="text" class="form-control datemask" required   name="end_date" id="end_date">
                </div>
                <span class="text-danger"></span>
            </div>



            <div class="form-group">
            	<div class="col-sm-offset-10 col-sm-5">
            		<button type="submit" class="btn btn-success">Save</button>
            	</div>
            </div>
        </div>
    </div>
</div>
</div>


<?php echo form_close(); ?>
 <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.css"> 
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/admin/js/form_validation.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    //Initialize Select2 Elements




    $( "#start_date" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     yearRange: '2018:2032'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


     
    //Datemask dd/mm/yyyy
    
});
     $( "#end_date" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     yearRange: '2018:2032'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


     
    //Datemask dd/mm/yyyy
    
});
});
</script>