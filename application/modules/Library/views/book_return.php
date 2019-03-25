<div class="row">
	<div class="col-sm-12">
		<div class="card card-default">
			<div class="card-header def">
				<h3 class="card-title">BOOK RETURN</h3>

			</div>
			<div class="card-body">
				<?php echo form_open_multipart('library/add_book_return',array("class"=>"form-horizontal")); ?>
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
							<input class="form-control" name="searchStudent" id="searchStudent" onkeyup="searchStudent()" type="text" placeholder="search student by name or number" />  
						</div> 	
					</div>
				</div>
				<script type="text/javascript">
					function searchStudent()
					{
						var search = $('#searchStudent').val();
						$.ajax({
							type: "post",
							url: "<?= base_url() ?>library/search_issue_record",
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