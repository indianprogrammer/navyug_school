<div class="row">
	<div class="col-md-5">
<div class="card card-default">
			<div class="card-header def">
				Add Books Category

			</div>
			<div class="card-body">
				<?php echo form_open_multipart('library/add_category_process',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="subject_name" class="col-md-12 control-label"><span class="text-danger">*</span>Enter Category Name</label>
		<div class="col-md-12 col-sm-8">
			<input type="text" name="subject_name" value="<?php echo $this->input->post('subject_name'); ?>" class="form-control" id="student_name" data-toggle="tooltip" title="tips- maths,physics...etc" required autofocus/>
			<span class="text-danger"><?php echo form_error('subject_name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">ADD</button>
        </div>
	</div>

<?php echo form_close(); ?>
			</div>
		</div>
	</div>
<div class="col-md-7">
<div class="card card-default">
			<div class="card-header def">
			</div>
		</div>
	</div>

</div>
	