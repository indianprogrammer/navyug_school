<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">School Edit</h3>
            </div>
			<?php echo form_open('school/edit/'.$school['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="city_id" class="control-label"><span class="text-danger">*</span>City Id</label>
						<div class="form-group">
							<select name="city_id" class="form-control">
								<option value="">select</option>
								<?php 
								$city_id_values = array(
								);

								foreach($city_id_values as $value => $display_text)
								{
									$selected = ($value == $school['city_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('city_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="state_id" class="control-label"><span class="text-danger">*</span>State Id</label>
						<div class="form-group">
							<select name="state_id" class="form-control">
								<option value="">select</option>
								<?php 
								$state_id_values = array(
								);

								foreach($state_id_values as $value => $display_text)
								{
									$selected = ($value == $school['state_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('state_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="country_id" class="control-label"><span class="text-danger">*</span>Country Id</label>
						<div class="form-group">
							<select name="country_id" class="form-control">
								<option value="">select</option>
								<?php 
								$country_id_values = array(
								);

								foreach($country_id_values as $value => $display_text)
								{
									$selected = ($value == $school['country_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('country_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $school['name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="latlong" class="control-label"><span class="text-danger">*</span>Latlong</label>
						<div class="form-group">
							<input type="text" name="latlong" value="<?php echo ($this->input->post('latlong') ? $this->input->post('latlong') : $school['latlong']); ?>" class="form-control" id="latlong" />
							<span class="text-danger"><?php echo form_error('latlong');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_pri" class="control-label">Contact Pri</label>
						<div class="form-group">
							<input type="text" name="contact_pri" value="<?php echo ($this->input->post('contact_pri') ? $this->input->post('contact_pri') : $school['contact_pri']); ?>" class="form-control" id="contact_pri" />
							<span class="text-danger"><?php echo form_error('contact_pri');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_sec" class="control-label">Contact Sec</label>
						<div class="form-group">
							<input type="text" name="contact_sec" value="<?php echo ($this->input->post('contact_sec') ? $this->input->post('contact_sec') : $school['contact_sec']); ?>" class="form-control" id="contact_sec" />
							<span class="text-danger"><?php echo form_error('contact_sec');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $school['email']); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="logo" class="control-label"><span class="text-danger">*</span>Logo</label>
						<div class="form-group">
							<input type="text" name="logo" value="<?php echo ($this->input->post('logo') ? $this->input->post('logo') : $school['logo']); ?>" class="form-control" id="logo" />
							<span class="text-danger"><?php echo form_error('logo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="banner" class="control-label"><span class="text-danger">*</span>Banner</label>
						<div class="form-group">
							<input type="text" name="banner" value="<?php echo ($this->input->post('banner') ? $this->input->post('banner') : $school['banner']); ?>" class="form-control" id="banner" />
							<span class="text-danger"><?php echo form_error('banner');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label"><span class="text-danger">*</span>Address</label>
						<div class="form-group">
							<textarea name="address" class="form-control" id="address"><?php echo ($this->input->post('address') ? $this->input->post('address') : $school['address']); ?></textarea>
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