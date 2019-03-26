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
 th
    {
      background-color: #eff3f9;
      /*font-size: 15px;*/
    }
</style>

<div class="row">
	<div class="col-md-8">
		<div class="card card-default">
			<div class="card-header def">
				<h3 class="card-title">BOOK ISSUE</h3>

			</div>
			<div class="card-body">
				<?php echo form_open_multipart('library/issue_book_record_insert',array("class"=>"form-horizontal")); ?>
				<div class="row">
					
					<div class="form-group col-md-6">
						
						<input class="form-control" name="search" id="search" onkeyup="searchBook()" type="text" placeholder="search by book number isbn number or title" />                
						<ul id="show_search_result" class="dropdown-menu customtable"></ul>                     
					</div>
					<table class="table table-bordered table_info col-md-8">
						<thead>
							<tr class="dynamicRows">
								<th>book title</th>
								<th>isbn no</th>
								<th>book no</th>
								<th>author</th>
								<th>action</th>

							</tr>
						</thead>
						<!-- <div class="tab" -->
						</table>
						<div class="form-group col-md-8">

							<select class="form-control" name="user_type" id="user_type" onchange="userType()" required>
								<option>--select user type--</option>
								<option value="1">Employee</option>
								<option value="2">Student</option>

							</select>                                      
						</div>
						<div id="student_show" class="col-md-8" style="display:none">
							<div class="form-group" >
								<input class="form-control" name="searchStudent" id="searchStudent" onkeyup="search_student()" type="text" placeholder="search student by name or number" />  
								<ul id="show_search_result_student" class="dropdown-menu customtable"></ul>  
							</div> 	
							<!-- <br><hr>
							<div class="form-group col-md-4">

								<select class="form-control" name="user_type" id="user_type" onchange="userType()">
									<option>--select <?= $this->session->menu_classes ?>--</option>


								</select>                                      
							</div>
							<div class="form-group col-md-4">

								<select class="form-control" name="user_type" id="user_type" onchange="userType()">
									<option>--Select Student--</option>


								</select>                                      
							</div> -->
						</div><!-- end studentShow -->
						<div id="employee_show" class="col-md-8" style="display:none">
							<div class="form-group" >
								<input class="form-control" name="searchEmployee" id="searchEmployee" onkeyup="search_employee()" type="text" placeholder="search employee by name or number" />  
								<ul id="show_search_result_employee" class="dropdown-menu customtable"></ul>  
							</div> 	
							<!-- <br><hr>
							<div class="form-group col-md-4">

								<select class="form-control" name="user_type" id="user_type" onchange="userType()">
									<option>--select <?= $this->session->menu_classes ?>--</option>


								</select>                                      
							</div>
							<div class="form-group col-md-4">

								<select class="form-control" name="user_type" id="user_type" onchange="userType()">
									<option>--Select Student--</option>


								</select>                                      
							</div> -->
						</div><!-- end studentShow -->
						<div class="table-responsive">	
						<table id="show_student_details" class="table table-bordered col-md-8"></table>
					</div>
					<div class="table-responsive">	
						<table id="show_employee_details" class="table table-bordered col-md-8"></table>
					</div>
					<input type="hidden" name="taker_id" class="taker_id">
						<div class="col-md-8">
							<button type="submit" class="btn btn-info" align="center">Submit</button>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		var count=1;
		$(document).ready(function()
		{
			$('.table_info').hide();

		});
		function searchBook()
		{
			var search = $('#search').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>library/search_books",
				data:{ search:search,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},
				success: function (data) {
  // $('#customerModal').hide();
  var obj=JSON.parse(data);
  console.log(obj);
  var newrow='';
  if(obj.length>0)
  {
  	for(var i=0;i<obj.length;i++)
  	{
  		newrow+='<tr onclick="fill_detail('+obj[i]['id']+',\''+obj[i].title+'\','+obj[i].book_no+','+obj[i].isbn_no+',\''+obj[i].author+'\')"><td>'+obj[i].title+'</td>'+
  		'<td>'+obj[i].author+'</td>'+
  		'<td>'+obj[i].book_no+'</td></tr>';
  		// row += '<tr onclick="fill_detail('+obj[i]['id']+','+obj[i]['mobile']+','+obj[i]['pincode']+',\''+obj[i]['address']+'\',\''+obj[i]['city']+'\',\''+obj[i]['email']+'\',\''+obj[i].name+'\')"><td>'+obj[i]['name']+'</td><td>'+obj[i]['mobile']+'</td></tr>';
  	}
  	$('#show_search_result').show();
  	$('#show_search_result').html(newrow);
  }
  else
  {
  	$('#show_search_result').hide();
  }

  console.log(newrow);
  // $(new_row).insertAfter($('table tr.dynamicRows:last'));

},
error:function(data)
{

},
});
		}	


		function userType()
		{
			var user_type = $('#user_type').val();
			if(user_type==1)
			{
				$('#show_student_details').hide();
				$('#student_show').hide();
				$('#employee_show').show();
			}
			if(user_type==2)
			{
				$('#show_employee_details').hide();
				$('#employee_show').hide();
				$('#student_show').show();
			}



		}
		function search_student()
		{
			var search = $('#searchStudent').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>student/search_student",
				data:{search_student:search,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},
				success: function (data) {
  // $('#customerModal').hide();
  // fetch_category();
  // console.log(data);
   var obj=JSON.parse(data);
  // console.log(obj);
  var newrow='';
			  if(obj.length>0)
			  {
			  	for(var i=0;i<obj.length;i++)
			  	{
			  		newrow+='<tr onclick="student_details('+obj[i]['id']+',\''+obj[i].name+'\','+obj[i].mobile+',\''+obj[i].profile_image+'\')"><td>'+obj[i].name+'</td>'+
			  		'<td>'+obj[i].mobile+'</td>'+
			  		'</tr>';
			  		// row += '<tr onclick="fill_detail('+obj[i]['id']+','+obj[i]['mobile']+','+obj[i]['pincode']+',\''+obj[i]['address']+'\',\''+obj[i]['city']+'\',\''+obj[i]['email']+'\',\''+obj[i].name+'\')"><td>'+obj[i]['name']+'</td><td>'+obj[i]['mobile']+'</td></tr>';
			  	}
			  	$('#show_search_result_student').show();
			  	$('#show_search_result_student').html(newrow);
			  }

						},
			error:function(data)
			{
				console.log("hii");
			},
			});

		}

		function search_employee()
		{
			var search = $('#searchEmployee').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>employee/search_employee",
				data:{search_employee:search,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},
				success: function (data) {
  // $('#customerModal').hide();
  // fetch_category();
  // console.log(data);
   var obj=JSON.parse(data);
  // console.log(obj);
  var newrow='';
			  if(obj.length>0)
			  {
			  	for(var i=0;i<obj.length;i++)
			  	{
			  		newrow+='<tr onclick="employee_details('+obj[i]['id']+',\''+obj[i].name+'\','+obj[i].mobile+',\''+obj[i].profile_image+'\')"><td>'+obj[i].name+'</td>'+
			  		'<td>'+obj[i].mobile+'</td>'+
			  		'</tr>';
			  		// row += '<tr onclick="fill_detail('+obj[i]['id']+','+obj[i]['mobile']+','+obj[i]['pincode']+',\''+obj[i]['address']+'\',\''+obj[i]['city']+'\',\''+obj[i]['email']+'\',\''+obj[i].name+'\')"><td>'+obj[i]['name']+'</td><td>'+obj[i]['mobile']+'</td></tr>';
			  	}
			  	$('#show_search_result_employee').show();
			  	$('#show_search_result_employee').html(newrow);
			  }

						},
			error:function(data)
			{
				console.log("hii");
			},
			});

		}



		function fill_detail(id,title,book_no,isbn,author)
		{
			$('#show_search_result').hide();
			var newrow='';
			 $('.search').val(''); 
			newrow='<tr><td><input type="hidden" name="book_id[]" value="'+id+'" >'+title+'</td><td>'+book_no+'</td><td>'+isbn+'</td><td>'+author+'</td><td><button type="button" class="btn btn-danger">-</button></tr>';
  				$('.table_info').show();
			 $(newrow).insertAfter($('table tr.dynamicRows:last'));
		}

		function student_details(id,name,mobile,image)
		{
			$('#searchStudent').val('');
			$('#show_search_result_student').hide();
			var data='<tr>'+
			'<th>name</th>'+
'<th>mobile</th>'+
'<th>image</th>'+
''+
'</tr>'+
'<tr>'+
'<td>'+name+'</td>'+
'<td>'+mobile+'</td>'+
'<td><img src="<?= base_url() ?>uploads/'+image+'" height="30" width="30" alt=""></td>'+
'</tr>';
	
$('.taker_id').val(id);
			$('#show_student_details').show();
			$('#show_student_details').html(data);

		}
		function employee_details(id,name,mobile,image)
		{
			$('#searchEmployee').val('');
			$('#show_search_result_employee').hide();
			var data='<tr>'+
			'<th>name</th>'+
'<th>mobile</th>'+
'<th>image</th>'+
''+
'</tr>'+
'<tr>'+
'<td>'+name+'</td>'+
'<td>'+mobile+'</td>'+
'<td><img src="<?= base_url() ?>uploads/'+image+'" height="30" width="30" alt=""></td>'+
'</tr>';
$('.taker_id').val(id);
			$('#show_employee_details').show();
			$('#show_employee_details').html(data);

		}
	</script>