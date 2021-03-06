
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">PARENT EDIT</h3>
                
            </div>
<div class="card-body">



<?= form_open('parents/edit/'.$parent['id'],array("class"=>"form-horizontal")); ?>

<div class="form-group">
	<label for="parent_Name" class="col-md-10 control-label"><span class="text-danger">*</span> Name</label>
	<div class="col-md-10">
		<input type="text" name="parent_Name" value="<?= ($this->input->post('parent_Name') ? $this->input->post('parent_Name') : $parent['name']); ?>" class="form-control" id="parent_Name"  autofocus/>
		<span class="text-danger"><?= form_error('parent_Name');?></span>
	</div>
</div>


<div class="form-group">
	<label for="email" class="col-md-10 control-label"><span class="text-danger">*</span>Email</label>
	<div class="col-md-10">
		<input type="text" name="email" value="<?= ($this->input->post('email') ? $this->input->post('email') : $parent['email']); ?>" class="form-control" id="email" />
		<span class="text-danger"><?= form_error('email');?></span>
	</div>
</div>

<div class="form-group">
	<label for="mobile" class="col-md-10 control-label"><span class="text-danger">*</span>Mobile</label>
	<div class="col-md-10">
		<input type="text" name="mobile" value="<?= ($this->input->post('mobile') ? $this->input->post('mobile') : $parent['mobile']); ?>" class="form-control" id="mobile" />
		<span class="text-danger"><?= form_error('mobile');?></span>
	</div>
</div>
<div class="form-group">
	<label for="profile_image" class="col-md-10 control-label">Profile Image</label>
	<div class="col-md-10">
		<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
		<span class="text-danger"><?php echo form_error('profile_image');?></span>
	</div>
</div>

<div class="form-group">
	<label for="address" class="col-md-10 control-label"><span class="text-danger">*</span>Permanent Address</label>
	<div class="col-md-10">
		<textarea name="paddress" class="form-control" id="address"><?= ($this->input->post('paddress') ? $this->input->post('paddress') : $parent['permanent_address']); ?></textarea>
		<span class="text-danger"><?= form_error('paddress');?></span>
	</div>
</div>
<div class="form-group">
	<label for="address" class="col-md-10 control-label"><span class="text-danger">*</span>Corresponding Address</label>
	<div class="col-md-10">
		<textarea name="taddress" class="form-control" id="taddress"><?= ($this->input->post('taddress') ? $this->input->post('taddress') : $parent['temporary_address']); ?></textarea>
		<span class="text-danger"><?= form_error('taddress');?></span>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-10 col-sm-10">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?= form_close(); ?>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#mobile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [106, 8, 9, 210, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
             (e.keyCode == 610 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
             (e.keyCode == 610 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
             (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
             (e.keyCode >= 310 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 108 || e.keyCode > 107)) && (e.keyCode < 96 || e.keyCode > 1010)  ) {
        	e.preventDefault();
        }
    });
	});
</script>