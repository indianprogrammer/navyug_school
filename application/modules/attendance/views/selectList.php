
	<h3>Select Class and date For Attendence report </h3>
<div class="row">

<div class="form-group">
	<label class="col-md-12 ">Select class</label>
	<div class="col-md-3">
		<select id="classId" name="classId">
			<?php foreach($classes as $row) { ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>

			<?php } ?>
		</select>
	

		<span class="text-danger"><?php echo form_error('attendance');?></span>
	</div>
</div>
<div class="form-group">
	<label class="col-md-12 ">Select date</label>
	<div class="col-md-6">
		<input type="date" name="date_select" id="date_select">
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8 col-md-3">
		<button type="submit" class="btn btn-success" id="submitdata">Show report</button>
	</div>
</div>
</div>
<div id="displayReport" > </div>

<script>
	$(document).ready(function(){
$("#submitdata").click(function(){
	// alert("dfdf");
var id = $("#classId").val();
var date = $("#date_select").val();
// console.log(name);
if(id==''||date=='')
{
$('#displayReport').html("<h4 style='color:red'>please fill all field</h4>");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "<?= base_url() ?>attendance/show_report",
data:{id:id,date:date},
success: function(data){
// console.log(data);
var obj=JSON.parse(data);
if(obj.report.length==0)
{
	$('#displayReport').html("<h4 style='color:red'>Their is No record of this date and class</h4>");
}
// var name;
var table;
var tablehead;
var final;
var counter=1;
// console.log(obj);
// console.log(obj.report[0].class_id);
for(var i=0;i<obj.report.length;i++)
{
	// console.log(obj.report[i].student_id);
	for(var j=0;j<obj.student.length;j++)
	{
		// console.log(obj.student[j].ids);
		if(obj.report[i].student_id==obj.student[j].ids)
		{	
			
			tablehead='<table class="table table-striped table-bordered table-responsive"><tr><th>Serial</th><th>Student Name</th><th>Attendance Status</th></tr>';
			 table+='<tr><td>'+counter +'</td><td>'+obj.student[j].student_name+'</td><td>'+obj.report[i].attendance_status+'</td></tr>';
			  final=tablehead+table+'<table>';
			counter++;

		}
		
	}	
}
$('#displayReport').html(final);
// $('#displayReport').append("rtwretre");

}
});

}
});
});
</script>