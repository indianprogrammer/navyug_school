
<style type="text/css">
	#show_search_result{
  background-color: #Fffffe;
  list-style-type:none;
}
#show_search_result li:hover
{
  background-color:grey;
  /*color:white;*/
}
.list_design
{
  font-size: 12px;
  color:blue;
}
.customtable
{
  width:100%;
  max-width: 700px;
  min-width: 300px;
  max-height: 400px;
  border-collapse:collapse; 
  background-color: #f8f8f8;
  overflow-y: scroll;

  /*background-color:red;*/
} 
.customtable td
{

  padding:7px; 


}
.customtable tr:hover
{

  background-color:#d2d2d2;


}
.customtable tr
{

  display: block;

}
</style>
<div class="row">
	<div class="col-md-8">
		<div class="card card-default">
			<div class="card-header def">
				<h3 class="card-title">BOOK RETURN</h3>

			</div>
			<div class="card-body">
				<?php echo form_open_multipart('library/books_return_record',array("class"=>"form-horizontal")); ?>
				<div class="row">
					<div class="form-group col-md-8">
						
						<select class="form-control" name="user_type" id="user_type" onchange="userType()">
							<option>--select user type--</option>
							<option value="1">Employee</option>
							<option value="2">Student</option>

						</select>                                      
					</div>
					<div id="student_show" class="col-md-8" style="display:none">
						<div class="form-group" >
							<input class="form-control" name="searchStudent" id="searchStudent" onkeyup="search_student()" type="text" placeholder="search student by name or number" />  
					<ul id="show_search_result_stu" class="dropdown-menu customtable"></ul>    
						</div> 	
					</div>
					<div id="employee_show" class="col-md-8" style="display:none">
						<div class="form-group" >
							<input class="form-control" name="searchEmployee" id="searchEmployee" onkeyup="search_employee()" type="text" placeholder="search Employee by name or number" />  
							<ul id="show_search_result_emp" class="dropdown-menu customtable"></ul> 
						</div> 	
					</div>
					<table class="table table-bordered table_info">
					
						<!-- <div class="show_table"></div> -->
						<!-- <div class="tab" -->
						</table>
				<button type="submit"> Submit</button>
				</div>
				<script type="text/javascript">
					function search_student()
					{
						var search = $('#searchStudent').val();
						$.ajax({
							type: "GET",
							url: "<?= base_url() ?>student/search_student",
							// data:{search_student:search,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},
							success: function (data) {
  
										  // console.log(data);
										var obj=JSON.parse(data);
										  console.log(obj);
										  var newrow='';
										  if(obj.length>0)
										  {
										  	for(var i=0;i<obj.length;i++)
										  	{
										  		newrow+='<tr onclick="get_issue_book('+obj[i]['id']+',2)"><td>'+obj[i].name+'</td>'+
										  		'<td>'+obj[i].mobile+'</td>'+
										  		// '<td>'+obj[i].book_no+'</td>
										  		'</tr>';
										  		// row += '<tr onclick="fill_detail('+obj[i]['id']+','+obj[i]['mobile']+','+obj[i]['pincode']+',\''+obj[i]['address']+'\',\''+obj[i]['city']+'\',\''+obj[i]['email']+'\',\''+obj[i].name+'\')"><td>'+obj[i]['name']+'</td><td>'+obj[i]['mobile']+'</td></tr>';
										  	}
										  	$('#show_search_result_stu').show();
										  	$('#show_search_result_stu').html(newrow);
										  }
										  else
										  {
										  	$('#show_search_result_stu').hide();
										  }

										},
										error:function(data)
										{
											console.log("hii");
										},
										});
						// alert("gg");

					}
					function search_employee()
					{
						var search = $('#searchEmployee').val();
						$.ajax({
							type: "GET",
							url: "<?= base_url() ?>employee/search_employee",
							// data:{search_student:search,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},
							success: function (data) {
  
										  // console.log(data);
										var obj=JSON.parse(data);
										  console.log(obj);
										  var newrow='';
										  if(obj.length>0)
										  {
										  	for(var i=0;i<obj.length;i++)
										  	{
										  		newrow+='<tr onclick="get_issue_book('+obj[i]['id']+',2)"><td>'+obj[i].name+'</td>'+
										  		'<td>'+obj[i].mobile+'</td>'+
										  		// '<td>'+obj[i].book_no+'</td>
										  		'</tr>';
										  		// row += '<tr onclick="fill_detail('+obj[i]['id']+','+obj[i]['mobile']+','+obj[i]['pincode']+',\''+obj[i]['address']+'\',\''+obj[i]['city']+'\',\''+obj[i]['email']+'\',\''+obj[i].name+'\')"><td>'+obj[i]['name']+'</td><td>'+obj[i]['mobile']+'</td></tr>';
										  	}
										  	$('#show_search_result_emp').show();
										  	$('#show_search_result_emp').html(newrow);
										  }
										  else
										  {
										  	$('#show_search_result_emp').hide();
										  }

										},
										error:function(data)
										{
											console.log("hii");
										},
										});
						// alert("gg");

					}
					function userType()
					{
						var user_type = $('#user_type').val();
						if(user_type==1)
						{
						$('#employee_show').show();
						$('#student_show').hide();

						}
						if(user_type==2)
						{
							
						$('#employee_show').hide();
						$('#student_show').show();
						}

					}
					function get_issue_book(id,type)
					{
						$('#show_search_result').hide();
						// alert(id);
						$.ajax({
							type: "POST",
							url: "<?= base_url() ?>library/search_issue_record",
							data:{search_student:id,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},
							success: function (data) {
  
										  // console.log(data);
										var obj=JSON.parse(data);
										  console.log(obj);
										  var newrow='';
										  if(obj.length>0)
										  {
												var heading=	'<thead>'+
																							'<tr class="dynamicRows">'+
																							'<th>Action</th>'+
																							'<th>book title</th>'+
																							'<th>isbn no</th>'+
																							'<th>book no</th>'+
																							'<th>author</th>'+
																							'<th>issue date</th>'+
																							'<th>due date</th>'+
																							''+
																							'</tr>'+
																							'</thead>'
										  	for(var i=0;i<obj.length;i++)
										  	{
										  		newrow +='<tr><td><input type="checkbox" name="id[]" value="'+obj[i].id+'"></td><td>'+obj[i].title+'</td>'+
										  		'<td>'+obj[i].isbn_no+'</td><td>'+obj[i].book_no+'</td><td>'+obj[i].author+'</td><td>'+obj[i].issue_date+'</td><td>'+obj[i].due_date+'</td></tr>';
										  		
										  	}
										  	$('.table_info').show();

										  		// $('#show_search_result').show();
										  		$('.table_info').html(heading+newrow);
										  }
										  else
										  {
										  	$('#show_table').hide();
										  }

										},
										error:function(data)
										{
											console.log("server error");
										},
										});
					}
				</script>