<h5 align="center" style="font-weight:150px;">Select Class and date For Attendance report</h5>
<br>	
<div class="row">

<div class="form-group">
	<label class="col-md-12 control-label">SELECT CLASS</label>
	<div class="col-md-5">
		<select id="classId" name="classId">
			<?php foreach($classes as $row) { ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>

			<?php } ?>
		</select>
	

		<span class="text-danger"><?php echo form_error('attendance');?></span>
	</div>
</div>
<div class="form-group">
	<label class="col-md-12 control-label">SELECT DATE</label>
	<div class="col-md-6">
		<input type="date" name="date_select" id="date_select">
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8 col-md-3">
		<button type="submit" class="btn btn-success btn-md" id="submitdata">SHOW REPORT</button>
	</div>
</div>
</div>
<table id="displayReport" class="table table-striped  table-responsive"></table>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
<script>
	$(document).ready(function(){
$("#submitdata").click(function(){
	// alert("dfdf");
var id = $("#classId").val();
var date = $("#date_select").val();
console.log(name);
if(id==''||date=='')
{
alert("Please Fill All Fields");
}
else
{

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
			
			tablehead='<tr><th>Serial</th><th>Student Name</th><th>Attendance Status</th></tr>';
			 table+='<tr><td>'+counter +'</td><td>'+obj.student[j].name+'</td><td>'+obj.report[i].attendance_status+'</td></tr>';
			  final=tablehead+table;
			counter++;
		}
		
	}	
}
$('#displayReport').html(final);
}
});

}
});
});
</script>