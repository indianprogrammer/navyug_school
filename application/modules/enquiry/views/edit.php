<div class="row">
    <div class="col-md-9">

      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">ENQUIRY FORM</h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">





<?php echo form_open('enquiry/edit/'.$enquiry['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="enquiry_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
		<div class="col-md-5">
			<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $enquiry['name']); ?>" class="form-control" id="name"  autofocus />
			<span class="text-danger"><?php echo form_error('name');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-5">
			<input type="text" name="email" maxlength="13" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $enquiry['email']); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-5">
			<input type="text" name="mobile" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $enquiry['mobile']); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?php echo form_error('mobile');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Address</label>
		<div class="col-md-5">
			<textarea name="address" class="form-control" id="address"><?php echo ($this->input->post('address') ? $this->input->post('address') : $enquiry['address']); ?></textarea>
			<span class="text-danger"><?php echo form_error('address');?></span>
		</div>
	</div>
	<!-- <div class="form-group" id="showlat">
	               <label for="latlong" class="control-label col-md-4 col-sm-12"><span class="text-danger">*</span>Location</label>
	                     <div class="col-md-5">
                            <input type="text" name="latlong" class="form-control" id="latlong" value="<?php echo ($this->input->post('location') ? $this->input->post('location') : $enquiry['location']); ?>" onclick="latMap();"  />
                            <span class="text-danger"><?= form_error('latlong') ?></span>
                         <div class="col-md-3" id="dvMap" > </div>
                        </div>
     </div> -->
	<div class="form-group">
		<label for="enquiry_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Remarks</label>
		<div class="col-md-5">
			<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $enquiry['remarks']); ?>" class="form-control" id="remarks" />
			<span class="text-danger"><?php echo form_error('remarks');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>