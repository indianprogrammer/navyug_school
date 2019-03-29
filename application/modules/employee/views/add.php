<?php $emp_name=ucfirst($this->session->menu_staff ?$this->session->menu_staff:'Staff') ?>

<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">ADD <?= $emp_name ?></h3>

			</div>
			<div class="card-body">







				<?php echo form_open_multipart('employee/add',array("class"=>"form-horizontal")); ?>

				<div class="row">
					<div class="col-md-12">
						<p><b>PERSONAL DETAILS:-</b></p><hr class="hr_line">
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="employee_Name" class="col-md-10 control-label"><span class="text-danger">*</span> Name</label>
							<input type="text" name="employee_Name" value="<?php echo $this->input->post('employee_Name'); ?>" class="form-control" id="employee_Name"  autofocus />
							<span class="text-danger"><?php echo form_error('employee_Name');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label  class="control-label"><span class="text-danger">*</span>DOB</label>
						<div class="form-group">
							<!-- <div class="form-group"> -->
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div> -->
                    <input type="text" class="form-control datemask" required   name="dob" id="start_date">
                </div>
                <span class="text-danger"></span>
            </div>
            			<div class="col-md-4">
            		<div class="form-group">
            			<label for="qualification" class="col-md-10 control-label"><span class="text-danger">*</span>Qualification</label>
            				<input type="text" name="qualification" value="<?php echo $this->input->post('qualification'); ?>" class="form-control" id="qualification" />
            				<span class="text-danger"><?php echo form_error('qualification');?></span>
            			</div>
            		</div>
            <div class="col-md-4">
            	<div class="form-group">
            		<label for="Gender">Gender</label>
            		<select class="form-control" data-required="true" name="gender" id="Student_student_gender">
            			<option value="prompt">Please Select</option>
            			<option value="male">Male</option>
            			<option value="female">Female</option>
            		</select><div class="school_val_error" id="Student_student_gender_em_" style="display:none"></div>                            </div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label for="Blood_Group" >Blood Group</label>
            			<select class="form-control" name="blood_group" id="Student_student_bloodgroup">
            				<option value="prompt">Please Select</option>
            				<option value="A+">A+</option>
            				<option value="A-">A-</option>
            				<option value="B+">B+</option>
            				<option value="B-">B-</option>
            				<option value="0+">O+</option>
            				<option value="0-">O-</option>
            				<option value="AB+">AB+</option>
            				<option value="AB-">AB-</option>
            			</select>
            			 <div class="school_val_error" id="Student_student_bloodgroup_em_" style="display:none"></div>                            </div>
            		</div>
            		<div class="col-md-4">
            			<div class="form-group">
            				<label for="mobile" class="col-md-12 control-label">Aadhar Number</label>
            				<div class="col-md-12">
            					<input type="text" name="aadhar" id="aadhar" maxlength="13"	 value="<?= $this->input->post('aadhar'); ?>" class="form-control" id="aadhar" maxlength="13" />
            					<span class="text-danger"><?= form_error('aadhar');?></span>
            				</div>
            			</div>
            		</div>
            		<div class="col-md-4">
            			<div class="form-group">
            				<label for="designation" class="col-md-12 control-label">Designation</label>
            				<div class="col-md-12">
            					<input type="text" name="designation" id="designation" maxlength="13"	 value="<?= $this->input->post('designation'); ?>" class="form-control" id="designation" maxlength="13" />
            					<span class="text-danger"><?= form_error('designation');?></span>
            				</div>
            			</div>
            		</div>
            			<div class="col-md-4">
            		<div class="form-group">
            			<label for="type" class="col-md-10 control-label"><span class="text-danger">*</span>User type</label>
            				<!-- <input type="text" name="type" value="<?php echo $this->input->post('type'); ?>" class="form-control" id="type" /> -->
            				<select name="type" class="form-control" id="type">
            					<option>--select--</option>
            					<?php foreach($emptype as $row)  {     ?>
            						<option value="<?= $row['id'] ?>"><?=  $row['type']     ?></option>
            					<?php } ?>
            				</select>
            				<span class="text-danger"><?php echo form_error('type');?></span>
            			</div>
            		</div>

            			<div class="col-md-4">
            		<div class="form-group">
            			<label for="profile_image" class="col-md-10 control-label">Profile Image</label>
            				<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
            				<span class="text-danger"><?php echo form_error('profile_image');?></span>
            			</div>
            		</div>
            		<div class="col-md-12">
	<p><b>CONTACT DETAILS:-</b></p><hr class="hr_line">
</div>
            			<div class="col-md-6">
            		<div class="form-group">
            			<label for="email" class="col-md-10 control-label">Email</label>
            				<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
            				<span class="text-danger"><?php echo form_error('email');?></span>
            			</div>
            		</div>

            			<div class="col-md-6">
            		<div class="form-group">
            			<label for="mobile" class="col-md-10 control-label">Mobile</label>
            				<input type="text" name="mobile" maxlength="13" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
            				<span class="text-danger"><?php echo form_error('mobile');?></span>
            			</div>
            		</div>


<div class="col-md-6">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="paddress" class="col-md-12 control-label"><span class="text-danger">*</span>Permanent Address</label>
				<div class="col-md-12">
					<textarea name="paddress" class="form-control" id="paddress" value="<?= $this->input->post('paddress'); ?>" ></textarea>
					<span class="text-danger"><?= form_error('paddress');?></span>
				</div>
			</div>

		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-12 control-label">City</label>
				<div class="col-md-12">
					<input type="text" name="p_city"  maxlength="13"	 value="<?= $this->input->post('p_city'); ?>" class="form-control" id="p_city" maxlength="13" />
					<span class="text-danger"><?= form_error('p_city');?></span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-12 control-label">Pincode</label>
				<div class="col-md-12">
					<input type="text" name="p_pincode"  maxlength="13"	 value="<?= $this->input->post('p_pincode'); ?>" class="form-control" id="p_pincode" maxlength="13" />
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
		<label for="taddress" class="col-md-12 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-12">
			<textarea name="taddress" class="form-control" id="taddress" value="<?= $this->input->post('taddress'); ?>"></textarea>
			<span class="text-danger"><?= form_error('taddress');?></span>
		</div>
	</div>
</div>
<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-12 control-label">City</label>
				<div class="col-md-12">
					<input type="text" name="t_city"  maxlength="13"	 value="<?= $this->input->post('p_city'); ?>" class="form-control" id="t_city" maxlength="13" />
					<span class="text-danger"><?= form_error('t_city');?></span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="mobile" class="col-md-12 control-label">Pincode</label>
				<div class="col-md-12">
					<input type="text" name="t_pincode"  maxlength="13"	 value="<?= $this->input->post('p_pincode'); ?>" class="form-control" id="t_pincode" maxlength="13" />
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
            		<div class="form-group">
            			<div class="col-sm-offset-10 col-sm-10">
            				<button type="submit" class="btn btn-success">Save</button>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>

<!-- script for checkbox -->
<script>
	$(document).ready(function(e) {
		$('#check').click(function() {

			var c=$('#paddress').val();

			$("#taddress").val(c);
		});
	});


</script>