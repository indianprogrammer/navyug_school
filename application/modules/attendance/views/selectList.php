 <div class="card">
      <div class="card-header">
        <h3 class="card-title">Select Class and date For Attendance report</h3>
       
      </div>
      <div class="card-body">

<!-- <h5 align="center" style="font-weight:150px;"></h5>
<br> -->	
<div class="row">

	<div class="form-group">
		<label class="col-md-12 control-label">SELECT CLASS</label>
		<div class="col-md-5">
			<select id="classId" name="classId">
				<?php foreach($classes as $row) { ?>
					<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>

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
<div id="dataModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg" >

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <!-- <h4 class="modal-title">Modal Header</h4> -->
                                  </div>
                                  <div class="modal-body" id="student_detail">

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
</div>
</div>
</div>

<script>
	$(document).ready(function(){
		$("#submitdata").click(function(){
	
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

var obj=JSON.parse(data);
if(obj.report.length==0)
{
	$('#displayReport').html("<h4 style='color:red'>Their is No record of this date and class</h4>");
}

var table;
var tablehead;
var final;
var counter=1;

for(var i=0;i<obj.report.length;i++)
{
	// console.log(obj.report[i].student_id);
	for(var j=0;j<obj.student.length;j++)
	{
		// console.log(obj.student[j].ids);
		if(obj.report[i].student_id==obj.student[j].ids)
		{	
			
			tablehead='<tr><th>Serial</th><th>Student Name</th><th>Attendance Status</th></tr>';
			table+='<tr><td>'+counter +'</td><td data-toggle="tooltip" data-placement="top" title="click to get details"><a href="<?=base_url()?>student/getFullDetails?student_id='+obj.student[j].ids+'" target="_blank" >'+obj.student[j].name+'</a></td><td>'+obj.report[i].attendance_status+'</td></tr>';
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
<!-- <script type="text/javascript">

   function showView(student_id) {     
     $.ajax({  
      url:"<?= base_url()?>student/fetchStudentView",  
      method:"post",  
      data:{id:student_id},  
      success:function(data){  
       
        var obj=JSON.parse(data);
   
          if(obj.parent_id)
          {
            var parent_name=obj.parent_name;
          }
          else
          {
            
            var parent_name='<form method="post" action="<?= base_url() ?>parents/add_parent"><button>add </button><input type="hidden" name="studentId" value='+student_id+' ></form>';
          

          }
        $('#student_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Student name</th><th>classes</th><th>Email</th><th>Mobile</th><th>Parent Name</th><th>Permanent Address</th><th>Corresponding Address</th></tr><tr><td>'+obj.name+'</td><td>'+obj.classes+'</td><td>'+obj.email+'</td><td>'+obj.mobile+'</td><td>'+parent_name+'</td><td>'+obj.permanent_address+'</td><td>'+obj.temporary_address+'</td><table>');  
        $('#dataModal').modal("show");  
      }  
    });  
   }



 
</script> -->