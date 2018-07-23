<!-- <?php echo form_open('admin/add',array("class"=>"form-horizontal")); ?> -->

	<div class="form-group">
		<label for="class_name" class="col-md-4 control-label"><span class="text-danger">*</span>Select Class For Attendence </label>
		<div class="col-md-8">
			<select>
				<?php foreach($classes as $row) { ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>
			<?php } ?>
			</select>


						<span class="text-danger"><?php echo form_error('admin_name');?></span>
		</div>
	</div>
	
	
	<!-- <div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div> -->

<!-- <?php echo form_close(); ?> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
