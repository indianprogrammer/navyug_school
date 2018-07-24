
<div class="container">
<div class="form-group">
	<label for="class_name" class="col-md-4 control-label"><span class="text-danger">*</span>Select Class For Attendence </label>
	<div class="col-md-8">
		<select id="attendance" name="attendance">
			<?php foreach($classes as $row) { ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>
			<?php } ?>
		</select>


		<span class="text-danger"><?php echo form_error('admin_name');?></span>
	</div>
</div>


<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Attendance Start</button>
	</div>
</div>
<div id="showtable"   class="form-group" style="height: 200px;width: 200px;">
<form action="<?=base_url()?>attendance/add_attendance" method="post">
	<table class="table table-responsive">
		<tr>
			<th>Student Name</th>
			<th>Action</th>
		</tr>
		<tr>
			<td>shubham</td>
			<td><input type="checkbox" name="student[]" value="1">present</td>
		</tr>
		<tr>
			<td>tarun</td>
			<td><input type="checkbox" name="student[]" value="2">present</td>
		</tr>
		<!-- <tr>
			<td>tarun</td>
			<td><input type="checkbox" name="student" value="3">present</td>
		</tr> -->
		<input type="submit" name="">
	</table>
</div>	
</form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script type="text/javascript">

	$(document).ready(function () {
		$('#attendance').change(function () {
			var classes_id = $('#attendance').val();
                        // console.log(classes_id);
                        $.ajax({
                        	url: "<?=base_url() ?>attendance/fetch_student",
                        	method: "POST",
                        	data: {classes_id: classes_id},
                        	success: function (data) {
                                 // console.log(data);
                                 var obj = JSON.parse(data);
                                 console.log(obj);
                                 if(obj)
                                 {


                                    	// var student_id=obj[i].id;
                                    	// var students_name=obj[i].student_name;
                                    // console.log(obj);
                                    // for (var i = 0; i < obj.length; i++) 
                                    var i=0;
                                    	 var checkbox = "<label><input type='checkbox' name='students[]' value='"+obj[i].student_id+"'>"+obj[i].student_name+"</label><input type='submit' value='submit'>";
                                    	while(i<obj.length)
                                    {
                                    	// var checkbox = ''<label><input type="checkbox" value="'+obj[i].id+">rtr</label>';
                                    		// $('#showtable').append('<table>');
                                    		// $('#showtable').append('<tr><th>Student name</th><th>Action</th></tr>');
                                    		// $('#showtable').append('<tr><th>Student name</th><th>Action</th></tr>');
                                    		// $('#showtable').append('<tr><th>Student name</th><th>Action</th></tr>');

                                    	  $('#showtable').html(checkbox);
                                    		// $('#showtable').append('<table>');
                                    	 i++;
										   
										     
										   
                                    }
                                }
                                else
                                {
                                	$('#showtable').html("<h4>No student in this class</h4>");
                                }



                            }

                        });

                    });
	});

</script>


<script type="text/javascript">
	function getAttendancePopUp()
	{

    // var id = $(this).data('id');
    bootbox.confirm("<?= $row['student_name']; ?> record ?", function(result) {
    	if(result)
    		window.location.href = "<?php echo site_url('student/remove/'.$s['id']); ?>"

    });
}
</script>