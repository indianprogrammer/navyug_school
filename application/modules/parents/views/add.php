<div class="row">
    <div class="col-md-6">

      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">ADD PARENT</h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">





<?php echo form_open_multipart('parents/add',array("class"=>"form-horizontal")); ?>
<div class="form-group">
	<label for="ptype" class="control-label"><span class="text-danger">*</span>Parent Type</label>
	<div class="col-md-11">
		<select name="ptype" id="ptype" class="form-control"  autofocus>
			<option value="">SELECT</option>
			<?php foreach ($ptype as $row) { ?>
				<option value="<?= $row['id'] ?>"> <?=  $row['type'] ?></option>
			<?php  } ?>
		</select>
		<span class="text-danger"><?= form_error('ptype') ?></span>
	</div>
</div>
<div class="form-group">
	<label for="parent_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
	<div class="col-md-11">
		<input type="text" name="parent_Name" value="<?php echo $this->input->post('parent_Name'); ?>" class="form-control" id="parent_Name" required />
		<span class="text-danger"><?php echo form_error('parent_Name');?></span>
	</div>
</div>


<div class="form-group">
	<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
	<div class="col-md-11">
		<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		<span class="text-danger"><?php echo form_error('email');?></span>
	</div>
</div>

<div class="form-group">
	<label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
	<div class="col-md-11">
		<input type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
		<span class="text-danger"><?php echo form_error('mobile');?></span>
	</div>
</div>
<div class="form-group">
	<label for="profile_image" class="col-md-4 control-label">Profile Image</label>
	<div class="col-md-11">
		<input type="file" name="profile_image" value="<?php echo $this->input->post('profile_image'); ?>" class="form-control" id="profile_image" />
		<span class="text-danger"><?php echo form_error('profile_image');?></span>
	</div>
</div>
<div class="form-group">
	<label for="paddress" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
	<div class="col-md-11">
		<textarea name="paddress" class="form-control" id="paddress"><?php echo $this->input->post('paddress'); ?></textarea>
		<span class="text-danger"><?php echo form_error('paddress');?></span>
	</div>
</div>
<div class="form-group">
	<div class="checkbox col-md-11 control-label">
		<label><input type="checkbox" name="optradio" id="check"><span style="font-weight: 13;">    If corresponding address is same as permanent address</span></label>
		</div>
	</div>
	<div class="form-group">
		<label for="taddress" class="col-md-4 control-label"><span class="text-danger">*</span>Corresponding Address</label>
		<div class="col-md-11">
			<textarea name="taddress" class="form-control" id="taddress"><?php echo $this->input->post('taddress'); ?></textarea>
			<span class="text-danger"><?php echo form_error('taddress');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-11">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>


</div>
</div>
</div>
</div>

	<?php echo form_close(); ?>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script>
		$(document).ready(function(e) {
			$('#check').click(function() {

				var c=$('#paddress').val();

				$("#taddress").val(c);
			});
		});


	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#mobile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 211, 13, 111, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
             (e.keyCode == 611 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
             (e.keyCode == 611 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
             (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
             (e.keyCode >= 311 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 117)) && (e.keyCode < 96 || e.keyCode > 1111)  ) {
        	e.preventDefault();
        }
    });
		});
	</script>