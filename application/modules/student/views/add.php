  <div class="row">
  	<div class="col-md-12">

  		<div class="card card-default ">
  			<div class="card-header def">
  				<h3 class="card-title">ADD STUDENT</h3>


  			</div>
  			<!-- /.card-header -->
  			<div class="card-body">

  				<?= form_open_multipart('student/add',array("class"=>"form-horizontal","id"=>"form_validation")); ?>
  				<div class="row">
  					<div class="col-md-4">
  						<div class="form-group">
  							<label for="student_name" class="col-md-4 control-label"><span class="text-danger">*</span>Student Name</label>
  							<div class="col-md-12">
  								<input type="text" name="student_name" value="<?= $this->input->post('student_name'); ?>" class="form-control" id="student_name" required autofocus />
  								<span id="error" class="text-danger"><?= form_error('student_name');?></span>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-4">
  						<div class="form-group">
  							<label for="email" class="col-md-4 control-label">Email</label>
  							<div class="col-md-12">
  								<input type="email" name="email" value="<?= $this->input->post('email'); ?>" class="form-control" id="email"  />
  								<span class="text-danger"><?= form_error('email');?></span>
  							</div>
  						</div>
  					</div>

  					<div class="col-md-4">
  						<div class="form-group">
  							<label for="mobile" class="col-md-4 control-label">Mobile</label>
  							<div class="col-md-12">
  								<input type="text" name="mobile" id="mobile" maxlength="13"	 value="<?= $this->input->post('mobile'); ?>" class="form-control" id="mobile" maxlength="13" />
  								<span class="text-danger"><?= form_error('mobile');?></span>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-4">
  						<div class="form-group">
  							<label for="reg_input_name" class="req">Date of Birth</label>
  							<div data-date-format="yyyy-M-d" class="input-group date">
  								<input class="form-control pickadate" name="dob" id="dob" type="text" value="<?= $this->input->post('dob'); ?>" maxlength="45" />
  								<span class="input-group-addon"><i class="icon-calendar"></i></span>
  							</div>
  							<span class="text-danger"><?= form_error('dob');?></span>
  						</div>
  					</div>
  					<div class="col-md-4">
  						<div class="form-group">
  							<label for="Gender">Gender<span class="text-danger">*</span></label>
  							<select class="form-control" data-required="true" name="gender"  required>
  								<option value="">Please Select</option>
  								<option value="male">Male</option>
  								<option value="female">Female</option>
  							</select>
  							<span class="text-danger"><?= form_error('gender');?></span>                        
  						</div>
  					</div>
  					<div class="col-md-4">
  						<div class="form-group">
  							<label for="Blood_Group" >Blood Group</label>
  							<select class="form-control" name="blood_group" id="Student_student_bloodgroup">
  								<option value="">Please Select</option>
  								<option value="A+">A+</option>
  								<option value="A-">A-</option>
  								<option value="B+">B+</option>
  								<option value="B-">B-</option>
  								<option value="0+">O+</option>
  								<option value="0-">O-</option>
  								<option value="AB+">AB+</option>
  								<option value="AB-">AB-</option>
  							</select>
  							<span class="text-danger"><?= form_error('blood_group');?></span>                    
  						</div>
  					</div>


	<!-- <div class="form-group" style="width:600px">
		<label for="class" class="col-md-4 control-label"><span class="text-danger">*</span>Select Classes</label>
		<div class="col-md-12">
			<select name="classes[]" id="multiselect" class="form-control"  multiple="multiple">
			<?php	foreach($classes as $row){ ?>
				<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
				<?php } ?>
			</select>
			<span class="text-danger"><?= form_error('classes');?></span>

		</div>
	</div> -->
	<!-- <div class="col-md-4">
		<div class="form-group">
			<label class="col-md-4 control-label"><span class="text-danger">*</span>Select Classes</label>
			<div class="col-md-12 col-sm-12">
				<select class="form-control select2" multiple="multiple" data-placeholder="Select classes" name="classes[]" style="width: 100%;" required="required"
				>
				<?php	foreach($classes as $row){ ?>
					<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
				<?php } ?>
			</select>
			<span class="text-danger"><?= form_error('classes[]');?></span>
		</div>
	</div>
</div> -->
<div class="col-md-4">
<div class="form-group">
					<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Course</label>
					
						<select class="form-control"  data-placeholder="Select Courses" onchange="batchSelect()"  name="course" id="course"  
						>
						<option value="" >--Select Course--- </option>
						<?php	foreach($course as $row){ ?>
							<option value="<?= $row['id'] ?>"  <?=  set_select('course',  ''.$row['id']).'',true ?> ><?= $row['course_name'] ?></option>
						<?php } ?>
					</select>
			
				<span class="text-danger"><?php echo form_error('course');?></span> 
			</div>
		</div>
			<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Batch</label>
				
					<select class="form-control"  data-placeholder="Select Batch"  name="batch" id="batch"  
					>

				</select>
			
			<span class="text-danger"><?php echo form_error('batch');?></span> 
		</div>
	</div>
<div class="col-md-4">
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label">Aadhar Number</label>
		<div class="col-md-12">
			<input type="text" name="aadhar" id="aadhar" maxlength="13"	 value="<?= $this->input->post('aadhar'); ?>" class="form-control" id="aadhar" maxlength="13" />
			<span class="text-danger"><?= form_error('aadhar');?></span>
		</div>
		<span class="text-danger"><?= form_error('aadhar');?></span>
	</div>

</div>
<div class="col-md-4">
	<div class="form-group">
		<label for="profile_image" class="col-md-4 control-label">Profile Image</label>
		<div class="col-md-12">
			<input type="file" name="profile_image" value="<?= $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?= form_error('profile_image');?></span>
		</div>
	</div>
</div>
<br><br>
<!-- ADDRESS DETAILS<hr><br><br> -->
<div class="col-md-12">
	<p><b>CONTACT DETAILS:-</b></p><hr class="hr_line">
</div>


<div class="col-md-6">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="paddress" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
				<div class="col-md-12">
					<textarea name="paddress" class="form-control" id="paddress" value="<?= $this->input->post('paddress'); ?>" required></textarea>
					<span class="text-danger"><?= form_error('paddress');?></span>
				</div>
			</div>

		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
				<div class="col-md-12">
					<input type="text" name="p_city"  	value="<?= $this->input->post('p_city'); ?>" class="form-control" id="p_city" required />
					<span class="text-danger"><?= form_error('p_city');?></span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Pincode</label>
				<div class="col-md-12">
					<input type="text" name="p_pincode"  	 value="<?= $this->input->post('p_pincode'); ?>" class="form-control" id="p_pincode" maxlength="6" required />
					<span class="text-danger"><?= form_error('p_pincode');?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="taddress" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
				<div class="col-md-12">
					<textarea name="taddress" class="form-control" id="taddress" value="<?= $this->input->post('taddress'); ?>" required></textarea>
					<span class="text-danger"><?= form_error('taddress');?></span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
				<div class="col-md-12">
					<input type="text" name="t_city" 	 value="<?= $this->input->post('p_city'); ?>" class="form-control" id="t_city" required />
					<span class="text-danger"><?= form_error('t_city');?></span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Pincode</label>
				<div class="col-md-12">
					<input type="text" name="t_pincode"  value="<?= $this->input->post('p_pincode'); ?>" class="form-control" id="t_pincode" maxlength="6" required />
					<span class="text-danger"><?= form_error('t_pincode');?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<div class="checkbox col-md-12 control-label">
			<label><input type="checkbox" name="optradio" id="check"><span style="font-weight: 13;">     If corresponding address is same as permanent address</span></label>
		</div>
	</div>
</div>
<div class="col-md-12" align="center">
	<div class="form-group" >
		<div class="col-sm-offset-4 col-sm-12">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>

<?= form_close(); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>

<!-- <script src="<?= base_url() ?>assets/admin/js/pages/forms/form-validation.js"></script> -->
<script type="text/javascript">
	

	$(document).ready(function(e) {
		$('#check').click(function() {

			var c=$('#paddress').val();
			var city=$('#p_city').val();
			var pincode=$('#p_pincode').val();

			$("#taddress").val(c);
			$("#t_city").val(city);
			$("#t_pincode").val(pincode);
		});

		$("#mobile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 212, 13, 110, 190]) !== -1 ||
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
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 127)) && (e.keyCode < 96 || e.keyCode > 1012)  ) {
        	e.preventDefault();
        }
    });


    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements




    $( "#dob" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     yearRange: '1970:2020'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


     
    //Datemask dd/mm/yyyy
    
});
    
});
	function batchSelect()
	{

		var course=$('#course').val();
		console.log(course);
		 $.ajax({  
            url:"<?= base_url()?>subject/fetch_batch_by_course",  
            method:"POST",  
            data:{course_id:course,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},  
            success:function(data){  
            	console.log(data);
            	var obj=JSON.parse(data);
            	var row='';
            	if(obj.length>0)
            	{
            	for(var i=0;i<obj.length;i++)
            	{
            		row+='<option value="'+obj[i].id+'">'+obj[i].batch_name+'</option>'

            	}
            	}
            	else{

            		row='<option value="">No batch is availabel</option>'
            	}	
            	$('#batch').html(row) ;  
            	// subjectSelect();

            },
            error:function(data)
            {

            },
        });



	}
</script>