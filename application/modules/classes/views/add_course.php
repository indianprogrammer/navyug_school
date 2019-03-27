<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ADD COURSE</h3>
                
            </div>
<div class="card-body">






<?php echo form_open('classes/add_course_process',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="course_name" class="col-md-10 control-label"><span class="text-danger">*</span>COURSE NAME</label>
		<div class="col-md-10">
			<input type="text" name="course_name" value="<?php echo $this->input->post('course_name'); ?>" class="form-control" id="course_name"  autofocus />
			<span class="text-danger"><?php echo form_error('course_name');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="description" class="col-md-10  control-label">Description</label>
		<div class="col-md-10">
			<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
			<span class="text-danger"><?php echo form_error('description');?></span>
		</div>
	</div>
	
   
	
	
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
<?php echo form_close(); ?>
</div>
</div>
</div>

    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">COURSE LIST</h3>
                
            </div>
<div class="card-body">
	 <div class="table-responsive">
        <table id="student_table" class="table  table-bordered table-hover">
        	<thead>
        		<tr>
        			<td>S.No</td>
        			<td>course name</td>
        			<td>action</td>
        		</tr>

        	</thead>
        	<tbody>
        		<?php 

        		$count=1;
        		foreach($course as $row) { ?>
        		<tr>
        			<td><?= $count++ ?></td>
        			<td><?= $row['course_name'] ?></td>
        			<td>edit</td>
        		</tr>
        	<?php } ?>
        	</tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>



 <script type="text/javascript">
        	$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    
});
</script>