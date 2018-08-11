<!-- <?= form_open("notification/sendNotification") ?> -->
<div class="form-group">
	<label for="notification" class="col-md-4 control-label">Message</label>
	<div class="col-md-5">
		<textarea name="notification" class="form-control" id="notification"><?php echo $this->input->post('notification'); ?></textarea>
		<span class="text-danger"><?php echo form_error('notification');?></span>
	</div>
</div>

<!-- <?php foreach ($schoolName as  $value) {
	echo ucfirst($value);
}  ?> -->
<div class="row">
	
<div class="col-md-6">
<div class="form-group">
	<label for="student" class="col-md-6 control-label"><span class="text-danger">*</span>Select Student</label>
	<div class="col-md-4">

		<select name="student" class="form-control" id="student">
			<option value="">--select--</option>
			<option value="all">All</option>
			<option value="class">Class Wise</option>

		</select>
		<span class="text-danger"><?php echo form_error('type');?></span>
	</div>
</div>
<div class="form-group">
	
	<div class="col-md-4" id="classtype">


		
	</div>
</div>
<div id="student_detail"></div>
</div>

<div class="col-md-6">
<div class="form-group">
	<label for="employee" class="col-md-6 control-label"><span class="text-danger">*</span>Select Employee</label>
	<div class="col-md-4">

		<select name="employee" class="form-control" id="employee">
			<option value="">--select--</option>
			<option value="all">All</option>
			<option value="class">Class Wise</option>

		</select>
		
	</div>
</div>
<div class="form-group">
	
	<div class="col-md-4" id="classtypeemp">


		
	</div>
</div>
<div id="employee_detail"></div>
</div>
<button id="submit">send</button>
</div>
<!-- <?= form_close(); ?> -->

<script type="text/javascript">
	$('#student').change(function () {
		var list_type  = $('#student').val();
		// console.log(list_type);
		if(list_type == 'all') {
			$('#classtype').hide();
			showAllStudent();
			$('#student_detail').show();  
		}
		else if(list_type=='class')
		{
			showclassDropDown();
			$('#student_detail').hide();  

			$('#classtype').show();
		}
		function showAllStudent()
		{

			$.ajax({  
				url:"<?= base_url()?>notification/fetchAllStudent",  
				method:"get",  
            // data:{id:student_id},  
            success:function(data){  
            	var obj=JSON.parse(data);
            	// console.log(obj[4]);

            	var student_data,i;
            	var student_detail='<table class="table table-striped  table-responsive"><tr><th>Student name</th><th>Email</th><th>Mobile</th><th><input type="checkbox">select all </tr>';
            	for (i = 0; i < obj.length; i++) {
            		student_data+='<tr><td>'+obj[i].student_name+'</td><td>'+obj[i].email+'</td><td>'+obj[i].mobile+'</td><td><input type="checkbox" value="'+[obj[i]]+'" id="student" name="'+[obj[i]]+'" ></td></tr>';
            		
            	}
            	var student_final=student_detail+student_data+'</table>';
            	$('#student_detail').html(student_final);  

                // $('#dataModal').modal("show");  
            }  
        });  


		}
		function showclassDropDown()
		{

			$.ajax({  
				url:"<?= base_url()?>notification/fetchAllClasses",  
				method:"get",
            // data:{id:student_id},  
            success:function(data){  
            	var obj=JSON.parse(data);
            	// console.log(obj);
            	var dropdown='<select id="classSelect" class="form-control"><option>--select class--</option>';
            	var dropdownoption,i;
            	for (i = 0; i < obj.length; i++) {
            		dropdownoption+='<option value="'+obj[i].id+'">'+obj[i].name+'</option>';
            		// console.log(obj[i].id);
            	}
            	var finalresult=dropdown+dropdownoption+'</select>';
            	$('#classtype').html(finalresult);
            	$('#classSelect').change(function () {
            		var class_id = $('#classSelect').val();
            		classWiseStudent(class_id);
            		


            		function classWiseStudent ()
            		{
            			$.ajax({  
            				url:"<?= base_url()?>notification/fetchStudentClassWise",  
            				method:"post",
            				data:{id:class_id},  
            				success:function(data){  

            					var obj=JSON.parse(data);
            					 // console.log(obj);
            					 if(obj.length==0)
            					{
            					$('#student_detail').show();
            					$('#student_detail').html("No records found in databse"); 
            					}
            				else
            				{
            				
            					var i,student_data;
            					var student_detail='<table class="table table-striped  table-responsive"><tr><th>Student name</th><th>Email</th><th>Mobile</th><th><input type="checkbox">select all </tr>';
            				for (i = 0; i < obj.length; i++) {
            				student_data+='<tr><td>'+obj[i].student_name+'</td><td>'+obj[i].email+'</td><td>'+obj[i].mobile+'</td><td><input 	type="checkbox" value="'+obj[i]+'" name="'+obj[i]+'" > </td></tr>';
            		
            					}
            					var student_final=student_detail+student_data+'</table>';
            					$('#student_detail').show();
            					$('#student_detail').html(student_final);  
            			}
            			}
            			});

            		}

            });  
            } 
         });
		}
});
	</script>	
<!-- for employee -->
	<script type="text/javascript">


$('#employee').change(function () {
		var list_type_emp=$('#employee').val();
		console.log(list_type_emp);
		if(list_type_emp == 'all') {
			$('#classtypeemp').hide();
			showAllEmployee();
			$('#employee_detail').show();
		}
		else if(list_type_emp =='class')
		{
			showclassDropDown();
			$('#employee_detail').hide();  

			$('#classtypeemp').show();
		}
		function showAllEmployee()
		{

			$.ajax({  
				url:"<?= base_url()?>notification/fetchAllEmployee",  
				method:"get",  
            // data:{id:student_id},  
            success:function(data){  
            	var obj=JSON.parse(data);
            	console.log(obj);
            	var employee_data,i;
            	var employee_detail='<table class="table table-striped  table-responsive"><tr><th>name</th><th>Email</th><th>Mobile</th><th><input type="checkbox">select all </tr>';
            	for (i = 0; i < obj.length; i++) {
            		employee_data+='<tr><td>'+obj[i].name+'</td><td>'+obj[i].email+'</td><td>'+obj[i].mobile+'</td><td><input type="checkbox" value="'+obj[i].id+'" ></td></tr>';
            		
            	}
            	var employee_final=employee_detail+employee_data+'</table>';
            	$('#employee_detail').html(employee_final);  

                // $('#dataModal').modal("show");  
            }  
        });  


		}
		function showclassDropDown()
		{

			$.ajax({  
				url:"<?= base_url()?>notification/fetchAllClasses",  
				method:"get",
            // data:{id:student_id},  
            success:function(data){  
            	var obj=JSON.parse(data);
            	// console.log(obj);
            	var dropdown='<select id="classSelect" class="form-control"><option>--select class--</option>';
            	var dropdownoption,i;
            	for (i = 0; i < obj.length; i++) {
            		dropdownoption+='<option value="'+obj[i].id+'">'+obj[i].name+'</option>';
            		// console.log(obj[i].id);
            	}
            	var finalresult=dropdown+dropdownoption+'</select>';
            	$('#classtypeemp').html(finalresult);
            	$('#classSelect').change(function () {
            		var class_id = $('#classSelect').val();
            		classWiseEmployee(class_id);
            		


            		function classWiseEmployee ()
            		{
            			$.ajax({  
            				url:"<?= base_url()?>notification/fetchEmployeeClassWise",  
            				method:"post",
            				data:{id:class_id},  
            				success:function(data){  
            					
            					var obj=JSON.parse(data);
            					if(obj.length==0)
            					{
            					$('#employee_detail').show();
            					$('#employee_detail').html("No records found in databse"); 
            					}
            				else
            				{
            					var i,employee_data;
            					var employee_detail='<table class="table table-striped table-responsive"><tr><th>name</th><th>Email</th><th>Mobile</th><th><input type="checkbox">select all </tr>';
            				for (i = 0; i < obj.length; i++) {
            				employee_data+='<tr><td>'+obj[i].name+'</td><td>'+obj[i].email+'</td><td>'+obj[i].mobile+'</td><td><input 	type="checkbox" value="'+obj[i].id+'"></td></tr>';
            		
            					}
            					var employee_final=employee_detail+employee_data+'</table>';
            					$('#employee_detail').show();
            					$('#employee_detail').html(employee_final); 
            			}
            			}
            			});

            		}

            });  
            } 
         });
		}
});


	</script>
	<script>
		$("#submit").click(function(){

			var name = $("#student").val();
			console.log(name);
		});
	</script>