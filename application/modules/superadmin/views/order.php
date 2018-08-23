



<h4>Order List</h4>

<table id ="parent_table" class="table table-striped table-bordered table-responsive">
    
    <thead>
    	<tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Name</th>
		
		
		<th>Email</th>
		<th>Mobile</th>
		<!-- <th>Address</th> -->
		

		<!-- <th>Location</th> -->
		<th>Comments</th>
		<th>Actions</th>
    </tr>
</thead>
<tbody>
	<?php  
	$count=1 ?>
	<?php foreach($order as $row){ ?>
    <tr>
		<td><?= $count++ ?></td>
	
		<td><?php echo $row['name']; ?></td>
	
		
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['mobile']; ?></td>
		<!-- <td><?php echo $row['address']; ?></td> -->
	<td><?php echo $row['comments']; ?></td> 
		<!-- <td><?php echo $row['location']; ?></td> -->
		<!-- <td><?php echo $row['remarks']; ?></td> -->
		
		<td>
            <!-- <a href="<?php echo site_url('enquiry/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
             <a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);"  class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a> -->
              <div class="btn-group" >
                       <!--  <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= site_url('student/edit/'.$row['id']); ?>" ><i class="fa fa-pencil"></a></i></button -->
                        <!-- <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> -->
                        <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button>
                       
                      </div>
        </td>
    </tr>
	<?php } ?>
</tbody>
</table>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/datatables/jquery.dataTables.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script> -->
<script>
    $(document).ready( function () {
        $('#parent_table').DataTable();
    } );
</script>
