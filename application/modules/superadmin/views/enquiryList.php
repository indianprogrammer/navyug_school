<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Enquiry List</h3>
        
      </div>
      <div class="card-body">





<div class="table-responsive">
<table id ="parent_table" class="table table-striped table-bordered ">

	<thead>
		<tr>
			<th>ID</th>
			<th>Ticket No</th>
			<!-- <th>Password</th> -->
			<th>Name</th>


			<th>Email</th>
			<th>Mobile</th>
			<th>Comments</th>
			<th>date</th>


			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$count=1 ?>
		<?php foreach($enquiry as $row){ ?>
			
			
						<tr>
						
						<td><?= $count++ ?></td>

						<td><?php echo $row['ticket_id']; ?></td>
						<td><?php echo $row['name']; ?></td>


						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['mobile']; ?></td>
						<td><?php echo $row['comment']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<!-- <td><?php echo $row['location']; ?></td> -->
						<!-- <td><?php echo $row['remarks']; ?></td> -->

						<td>
							<div class="btn-group" >
								<!-- <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= site_url('student/edit/'.$row['id']); ?>" ><i class="fa fa-pencil"></a></i></button> -->
								<!-- <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> -->
								<!-- <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button> -->
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									<span class="caret">Action</span>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="javascript:void(0)" onclick="" >Assign to Group</a>
									<a class="dropdown-item" href="javascript:void(0)" onclick="assignIndivisual(<?= $row['ticket_id'] ?>)" >Assign to indivisual</a>
									<a class="dropdown-item" href="javascript:void(0)" onclick="statusUpdate(<?= $row['id'] ?>)">Close Request</a>
								</div>

							</div>
						</td>
							
		<div id="assignModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg" >

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!-- <h4 class="modal-title">Invoice Information</h4> -->
                            </div>
                            <div class="modal-body" id="assigning">
                          


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
					</tr>

				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
</div>
</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>

		<script>
			$(document).ready( function () {
				$('#parent_table').DataTable();
			} );
		</script>
		<script type="text/javascript">
			var url="<?php echo base_url();?>";
			function delFunction($id)
			{

    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?Are you sure to delete  enquiry", function(result) {
    	if(result)

    		window.location = url+'enquiry/remove/'+id ;

    });
}
function statusUpdate($id)
{
	console.log($id);
    	// console.log($id);
    	$.ajax({
    		method: "GET",
    		url:" <?= base_url() ?>enquiry/statusUpdate", 
    		data: {
    			id: $id
    		},

    		success: function( responseObject ) {
    			console.log("dd");
    		}
    	});
    }	
    function assignIndivisual($id)
    {
    	var id= $id;
    	console.log(id);

    	$('#assigning').html('<form action="../<?php base_url() ?>enquiry/assignIndivisual" method="post"><input type="checkbox" name="assign"  value="4">vivek chourasiya<br><input type="hidden" name="ticket_id" value="'+id+'" ><div class="form-group col-md-6"><label>message</label><textarea name="comment" class="form-control"></textarea><br><button type="submit" class="btn btn-info">Assign</button></form>');
    	$('#assignModal').modal('show');


    // 	$.ajax({
    // 		method: "GET",
    // 		url:" <?= base_url() ?>enquiry/assign_to_other", 
    // 		data: {
    // 			id: $id
    // 		},

    // 		success: function( responseObject ) {
    // 			console.log("dd");
    // 		}
    // 	});
    // }
}
</script>