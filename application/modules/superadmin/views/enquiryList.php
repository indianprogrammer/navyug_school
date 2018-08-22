



<h4>Enquiry List</h4>


<table id ="parent_table" class="table table-striped table-bordered table-responsive">

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
			<?php if($row['status']==0)
			{ ?>	
				<tr >
				<?php  }	
				else 
					{ ?>
						<tr>
						<?php   } ?>
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
								<button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
								<button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button>
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="javascript:void(0)" onclick="" >Assign to Group</a>
									<a class="dropdown-item" href="javascript:void(0)"data-toggle="modal" data-target="#dataModal">Assign to indivisual</a>
									<a class="dropdown-item" href="javascript:void(0)" onclick="statusUpdate(<?= $row['id'] ?>)">Close Request</a>
								</div>

							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div id="dataModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" >

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<!-- <h4 class="modal-title">Modal Header</h4> -->
					</div>
					<div class="modal-body" id="student_detail">
						<form action="enquiry/assignIndivisual" method="post">
							<input type="checkbox" name="user_id" value="id">vivek chourasiya
							<div class="form-group">
								<label for="comments" class="col-md-4 control-label"><span class="text-danger">*</span>comments</label>
								<div class="col-md-5 col-lg-4">
									<textarea name="comments" class="form-control" id="comments"><?=$this->input->post('comments'); ?></textarea>
									<span class="text-danger"><?=form_error('comments');?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-5">
									<button type="submit" class="btn btn-success">Assign</button>
								</div>
							</div>
						</form>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
			function delFunction()
			{

    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?Are you sure to delete  enquiry", function(result) {
    	if(result)

    		window.location = url+'enquiry/remove/'+id ;

    });
}
function statusUpdate($id)
{
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




    	$.ajax({
    		method: "GET",
    		url:" <?= base_url() ?>enquiry/assign_to_other", 
    		data: {
    			id: $id
    		},

    		success: function( responseObject ) {
    			console.log("dd");
    		}
    	});
    }
</script>