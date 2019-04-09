 <div class="card">
 	<div class="card-header">
 		<h3 class="card-title"> Attendance report</h3>

 	</div>
 	<div class="card-body">

<!-- <h5 align="center" style="font-weight:150px;"></h5>
	<br> -->	
	<div class="row">

		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-12 control-label">Select course</label>
				<select id="classId" name="classId" class="form-control" onchange="batch_fetch()">
					<?php foreach($classes as $row) { ?>
						<option value="<?= $row['id'] ?>"><?= $row['course_name'] ?></option>

					<?php } ?>
				</select>


				<span class="text-danger"><?php echo form_error('attendance');?></span>
			</div>
		</div>
		<div class="col-md-4" id="batch_dropdown">
			<div class="form-group">
				<label for="class_name" class="col-md-12 control-label"><span class="text-danger">*</span>Select Batch  </label>
				<select id="batch" name="batch_id" class="form-control">
					<option value="">--select--</option>
				</select>


				<span class="text-danger"><?php echo form_error('attendance');?></span>
			</div>

		</div>
		<!-- </div> -->
		<div class="col-md-4">
			<div class="form-group">
				<label class="col-md-12 control-label">Select Date</label>
				<input type="text" name="date_select" id="date" class="form-control">
				<span class="input-group-addon"><i class="icon-calendar"></i></span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8 col-md-3">
				<button type="submit" class="btn btn-success btn-md" id="submitdata">SHOW REPORT</button>
			</div>
		</div>
	</div>
	<div class="col-md-12">
	<table id="displayReport" class="table table-hover table-bordered"></table>
</div>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
<script>
	$(document).ready(function(){
		$("#submitdata").click(function(){

			var id = $("#classId").val();
			var date = $("#date").val();
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
			
			tablehead='<tr><th>#Serial</th><th>Student Name</th><th>Attendance Status</th></tr>';
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


	function batch_fetch()
	{
		var course_id=$('#classId').val();
		console.log(course_id);
		$.ajax({
			url:"<?= base_url()?>subject/fetch_batch_by_course",  
			method:"POST",  
			data:{course_id:course_id,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},  
			success:function(data){  
				console.log(data);
				var obj=JSON.parse(data);
				var row='';
				if(obj.length>0)
				{
					for(var i=0;i<obj.length;i++)
					{
						row+='<option value="'+obj[i].id+'" >'+obj[i].batch_name+'</option>'

					}
				}
				else{

					row='<option value="">No batch is availabel</option>'
				}	
				$('#batch').html(row) ;  
            	// subjectSelect();

            },
            error:function(data)
            {

            },
        });

	}


    //Initialize Select2 Elements




    $( "#date" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     yearRange: '1970:2020'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


     
    //Datemask dd/mm/yyyy
    
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