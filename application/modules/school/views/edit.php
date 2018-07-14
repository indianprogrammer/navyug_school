<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">School Edit</h3>
			</div>
			<?= form_open('school/edit/'.$school['school_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-7">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?= ($this->input->post('name') ? $this->input->post('name') : $school['school_name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?= form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?= ($this->input->post('email') ? $this->input->post('email') : $school['email']); ?>" class="form-control" id="email" />
							<span class="text-danger"><?= form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="address" class="control-label"><span class="text-danger">*</span>Address</label>
						<div class="form-group">
							<textarea name="address" class="form-control" id="address"><?= ($this->input->post('address') ? $this->input->post('address') : $school['address']); ?></textarea>
							<span class="text-danger"><?= form_error('address');?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="contact_pri" class="control-label"><span class="text-danger">*</span>Contact Primary</label>
						<div class="form-group">
							<input type="text" name="contact_pri" maxlength="13" value="<?= ($this->input->post('contact_pri') ? $this->input->post('contact_pri') : $school['contact_pri']); ?>" class="form-control" id="contact_pri" />
							<span class="text-danger"><?= form_error('contact_pri');?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="contact_sec" class="control-label">Contact Secondry</label>
						<div class="form-group">
							<input type="text" name="contact_sec"  maxlength="13" value="<?= ($this->input->post('contact_sec') ? $this->input->post('contact_sec') :$school['contact_sec'] ); ?>" class="form-control" id="contact_sec" />
							<span class="text-danger"><?= form_error('contact_sec');?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="country" class="control-label"><span class="text-danger">*</span>Country </label>
						<div class="form-group">	
							<select name="country" id="country" class="form-control"  >


								<?php foreach($country as $row) {
									if($row['id']==$school['country_id']){ ?>
										<option value="<?= $school['country_id'] ?>" selected ><?= $school['country_name'] ?> </option>
										<?php

									}else{
										?>

										<option value='<?= $row['id'] ?>' ><?= $row['country_name'] ?> </option> 

									<?php }} ?> 
								</select>

								<span class="text-danger"><?= form_error('country');?></span>
							</div>
						</div>
						<div class="col-md-7">
							<label for="state" class="control-label"><span class="text-danger">*</span>State </label>
							<div class="form-group">
								<select name="state" class="form-control" id="state">
									<?php foreach($state as $row) { ?>
										<?php if($school['state_id']==$row['id']) { ?>
											<option value="<?= $school['state_id']; ?>" selected > <?= $school['state_name']; ?></option>
											<?php
									
										} else {
											?>
											<option value='<?= $row['id'] ?>' ><?= $row['state_name'] ?> </option> 


										<?php } } ?>
									</select>
									<span class="text-danger"><?= form_error('state');?></span>
								</div>
							</div>
							<div class="col-md-7">
								<label for="city" class="control-label"><span class="text-danger">*</span>City </label>
								<div class="form-group">
									<select name="city" class="form-control" id="city">
										
										<?php foreach($city as $row) { ?>
											<?php if($school['city_id']==$row['id']) { ?>
												<option value="<?= $school['city_id']; ?>" selected > <?= $school['city_name']; ?></option>
												<?php
											}else { 

												?>
												<option value='<?= $row['id'] ?>' ><?= $row['city_name'] ?> </option> 


											<?php } } ?>
										</select>
										<span class="text-danger"><?= form_error('city');?></span>
									</div>
								</div>
								<div class="col-md-7">
									<label for="latlong" class="control-label"><span class="text-danger">*</span>Latlong</label>
									<div class="form-group">
										<input type="text" name="latlong" value="<?= ($this->input->post('latlong') ? $this->input->post('latlong') : $school['latlong']); ?>" class="form-control" id="latlong" />
										<span class="text-danger"><?= form_error('latlong');?></span>
									</div>
								</div>
								<div class="col-md-7">
									<label for="logo" class="control-label"><span class="text-danger">*</span>Logo</label>
									<div class="form-group">
										<input type="text" name="logo" value="<?= ($this->input->post('logo') ? $this->input->post('logo') : $school['logo']); ?>" class="form-control" id="logo" />
										<span class="text-danger"><?= form_error('logo');?></span>
									</div>
								</div>
								<div class="col-md-7">
									<label for="banner" class="control-label"><span class="text-danger">*</span>Banner</label>
									<div class="form-group">
										<input type="text" name="banner" value="<?= ($this->input->post('banner') ? $this->input->post('banner') : $school['banner']); ?>" class="form-control" id="banner" />
										<span class="text-danger"><?= form_error('banner');?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Save
							</button>
						</div>				
						<?= form_close(); ?>
					</div>
				</div>
			</div>
			<!-- script for dropdown ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript">
                var selectState = '<option value="">Select State</option>';
                var selectCity = '<option value="">Select City</option>';
                $(document).ready(function () {
                    $('#country').change(function () {
                        var country_id = $('#country').val();
                        console.log(country_id);
                        if (country_id != '') {
                            populateState(country_id);
                        }else {
                            $('#state').html(selectState);
                            $('#city').html(selectCity);
                        }
                    });
                    $('#state').change(function () {
                        var state_id = $('#state').val();
                        console.log(state_id);
                        if (state_id != '') {
                            populateCity(state_id);
                        }
                        else {
                            $('#city').html(selectCity);
                        }
                    });
                });

                function populateCity(state_id){
                    console.log(state_id);
                    $.ajax({
                        url: "<?=base_url() ?>school/fetch_city",
                        method: "POST",
                        data: {state_id: state_id},
                        success: function (data) {
                                console.log(obj);
                            var obj = JSON.parse(data);
                            if(obj)
                            {
                                // console.log(obj);
                            var i;
                            var city;
                            // console.log(obj);
                            for (i = 0; i < obj.length; i++) {
                                city += '<option value="' + obj[i].id + '">' + obj[i].city_name + '</option>';
                                $('#city').html(city);
                            }
                        }
                        else
                        {
                             $('#city').html('<option value="">city not available</option>');
                        }
                    } 
                    });
                }
                function populateState(country_id)
                {
                    $.ajax({
                        url: "<?=base_url() ?>school/fetch_state",
                        method: "POST",
                        data: {country_id: country_id},
                        success: function (data) {
                            console.log(data);
                            // console.log(data);
                            var obj = JSON.parse(data);
                            if(obj)
                            {
                            var i;
                            var state = selectState;
                            for (i = 0; i < obj.length; i++) {
                                state += '<option value="' + obj[i].id + '">' + obj[i].state_name + '</option>';
                                $('#state').html(state);
                            }
                            $('#city').html(selectCity);
                            }
                            else
                            {
                                 $('#state').html('<option value="">state not available</option>');
                                 $('#city').html('<option value="">city not  avilable</option>');

                            }
                        }
                    });

               }

            </script>
			<!-- dropdown city and state ajax  end -->

			<!-- only number allowed validation -->
			<script type="text/javascript">
				$(document).ready(function() {
					$("#contact_pri,#contact_sec").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
             (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
             (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
             (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
           
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 107) ) {
        	e.preventDefault();
        }
    });
				});
			</script>
<!-- <script type="text/javascript">
	function showhide()
	{
		 $(document).ready(function () {
        $("#st").click(function(){
    // $("#ost").show();
    $("#gst").hide();
        	
	});
</script> -->