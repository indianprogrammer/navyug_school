<?php echo form_open('parents/add',array("class"=>"form-horizontal")); ?>
                        <div class="form-group">
                        <label for="ptype" class="control-label"><span class="text-danger">*</span>Parent Type</label>
						<div class="col-md-5 col-sm-12">
                            <select name="ptype" id="ptype" class="form-control"  autofocus>
                                <option value="">SELECT</option>
                                <?php foreach ($ptype as $row) { ?>
                                   <option value="<?= $row->id ?>"> <?=  $row->type ?></option>
                              <?php  } ?>
                            </select>
                            <span class="text-danger"><?= form_error('ptype') ?></span>
                        </div>
                    </div>
	<div class="form-group">
		<label for="parent_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
		<div class="col-md-5">
			<input type="text" name="parent_Name" value="<?php echo $this->input->post('parent_Name'); ?>" class="form-control" id="parent_Name" />
			<span class="text-danger"><?php echo form_error('parent_Name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-5">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
		<div class="col-md-5">
			<input type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
			<span class="text-danger"><?php echo form_error('mobile');?></span>
		</div>
	</div>
	<!-- <div class="form-group">
		<label for="profile_image" class="col-md-4 control-label"><span class="text-danger">*</span>Profile Image</label>
		<div class="col-md-5">
			<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
			<span class="text-danger"><?php echo form_error('profile_image');?></span>
		</div>
	</div> -->
	<div class="form-group">
		<label for="paddress" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
		<div class="col-md-5">
			<textarea name="paddress" class="form-control" id="paddress"><?php echo $this->input->post('paddress'); ?></textarea>
			<span class="text-danger"><?php echo form_error('paddress');?></span>
		</div>
	</div>
	<div class="form-group">
		<div class="checkbox col-md-5 control-label">
	      <label><input type="checkbox" name="optradio" id="check"><span style="font-weight: 13;">    If corresponding address is same as permanent address<span></label>
	    </div>
	</div>
	<div class="form-group">
		<label for="taddress" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-5">
			<textarea name="taddress" class="form-control" id="taddress"><?php echo $this->input->post('taddress'); ?></textarea>
			<span class="text-danger"><?php echo form_error('taddress');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
       $('#check').click(function() {

    var c=$('#paddress').val();

    $("#taddress").val(c);
});
});


</script>