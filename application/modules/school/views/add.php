<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">School Add</h3>
            </div>
            <?php echo form_open('School/add_school_process'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="country_id" class="control-label"><span class="text-danger">*</span>Country</label>
						<div class="form-group">
							<select name="country" id="country" class="form-control" >
								<option value="">select</option>
								<?php 
								
								
								foreach($country as $row)
								{
									

									echo '<option value="'.$row->id.'">'.$row->name.'</option>';
									
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('country');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="state_id" class="control-label"><span class="text-danger">*</span>State</label>
						<div class="form-group">
							<select name="state" id="state" class="form-control">
								<option value="">Select State</option>
								<!--  -->
								
							</select>
							<span class="text-danger"><?php echo form_error('state');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="city_id" class="control-label"><span class="text-danger">*</span>City</label>
						<div class="form-group">
							<select name="city" id="city" class="form-control">
								<option value="">Select City</option>
								
							</select>
							<span class="text-danger"><?php echo form_error('city');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="latlong" class="control-label"><span class="text-danger">*</span>Latlong</label>
						<div class="form-group">
							<input type="text" name="latlong" value="<?php echo $this->input->post('latlong'); ?>" class="form-control" id="latlong" />
							<span class="text-danger"><?php echo form_error('latlong');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_pri" class="control-label"><span class="text-danger">*</span>Contact Primary</label>
						<div class="form-group">
							<input type="text" name="contact_pri" value="<?php echo $this->input->post('contact_pri'); ?>" class="form-control" id="contact_pri" />
							<span class="text-danger"><?php echo form_error('contact_pri');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_sec" class="control-label">Contact Secondry</label>
						<div class="form-group">
							<input type="text" name="contact_sec" value="<?php echo $this->input->post('contact_sec'); ?>" class="form-control" id="contact_sec" />
							<span class="text-danger"><?php echo form_error('contact_sec');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="logo" class="control-label"><span class="text-danger">*</span> Upload Logo</label>
						<div class="form-group">
							<input type="text" name="logo" value="<?php echo $this->input->post('logo'); ?>" class="form-control" id="logo" />
							<span class="text-danger"><?php echo form_error('logo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="banner" class="control-label"><span class="text-danger">*</span> Upload Banner</label>
						<div class="form-group">
							<input type="text" name="banner" value="<?php echo $this->input->post('banner'); ?>" class="form-control" id="banner" />
							<span class="text-danger"><?php echo form_error('banner');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label"><span class="text-danger">*</span>Address</label>
						<div class="form-group">
							<textarea name="address" class="form-control" id="address"><?php echo $this->input->post('address'); ?></textarea>
							<span class="text-danger"><?php echo form_error('address');?></span>
						</div>
					</div>
				</div>
			</div>

          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	
$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();

  console.log(country_id);
  if(country_id != '')
  {
  	// alert("hii");
   $.ajax({
    url:"<?php echo base_url(); ?>School/fetch_state",
    method:"POST",
    async: false,
    data:{country_id:country_id},
    success:function(data)
    {
    	// console.log(data); 	
     $('#state').html(data);

     $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State</option>');
   $('#city').html('<option value="">Select City</option>');
  }
 });




 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>School/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
  });
 
</script>
