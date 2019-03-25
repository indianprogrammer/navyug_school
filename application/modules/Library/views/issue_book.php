<div class="row">
	<div class="col-sm-12">
		<div class="card card-default">
			<div class="card-header def">
				<h3 class="card-title">BOOK ISSUE</h3>

			</div>
			<div class="card-body">
				<?php echo form_open_multipart('library/add_book_issue',array("class"=>"form-horizontal")); ?>
				<div class="row">
					
					<div class="form-group col-md-6">
						
							<input class="form-control" name="search" id="search" onkeyup="searchBook()" type="text" placeholder="search by book number isbn number or title" />                                          
					</div>
					<table class="table table-bordered">
						<thead>
						<tr>
						<th>book title</th>
<th>author</th>
<th>isbn no</th>
<th>book no</th>

</tr>
</thead>
<div class="tab"
					</table>
					<div class="form-group col-md-8">
						
							<select class="form-control" name="user_type" id="user_type" onchange="userType()">
								<option>--select user type--</option>
								<option value="1">Employee</option>
								<option value="2">Student</option>

							</select>                                      
					</div>
					<div id="student_show" class="col-md-8" style="display:none">
						<div class="form-group" >
							<input class="form-control" name="searchStudent" id="searchStudent" onkeyup="searchStudent()" type="text" placeholder="search student by name or number" />  
						</div> 	
						<br><hr>
						<div class="form-group col-md-4">
						
							<select class="form-control" name="user_type" id="user_type" onchange="userType()">
								<option>--select <?= $this->session->menu_classes ?>--</option>
								

							</select>                                      
						</div>
					<div class="form-group col-md-4">
						
							<select class="form-control" name="user_type" id="user_type" onchange="userType()">
								<option>--Select Student--</option>
								

							</select>                                      
					</div>
					</div><!-- end studentShow -->
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
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
  		var newrow='<td>'+obj.title'+</td>'+
'<td>'+obj.author+'</td>'+
'<td>'+obj.book_no+'</td>';

    $(new_row).insertAfter($('table tr.dynamicRows:last'));
                          count++;
  // fetch_category();
 console.log(data);

},
error:function(data)
{

},
});
}	


function userType()
{
 var user_type = $('#user_type').val();
 if(user_type==2)
 {
 	$('#student_show').show();
 }



}
function searchStudent()
{
var search = $('#searchStudent').val();
 $.ajax({
	type: "post",
	url: "<?= base_url() ?>student/search_books",
	data:{search_student:search,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},
	success: function (data) {
  // $('#customerModal').hide();
  // fetch_category();
 console.log(data);

},
error:function(data)
{
console.log("hii");
},
});

}
</script>