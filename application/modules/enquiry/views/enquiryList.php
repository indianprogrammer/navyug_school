



<h4>Enquiry List</h4>
<div class="pull-right">
	<a href="<?php echo site_url('enquiry/add_enquiry'); ?>" class="btn btn-success">Add</a> 
</div>

<table id ="parent_table" class="table table-striped table-bordered table-responsive">
    
    <thead>
    	<tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Name</th>
		
		
		<th>Email</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>purpose</th>

		<!-- <th>Location</th> -->
		<th>Remarks</th>
		<th>Actions</th>
    </tr>
</thead>
<tbody>
	<?php  
	$count=1 ?>
	<?php foreach($enquiry as $row){ ?>
    <tr>
		<td><?= $count++ ?></td>
	
		<td><?php echo $row['name']; ?></td>
	
		
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['mobile']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['type']; ?></td>
		<!-- <td><?php echo $row['location']; ?></td> -->
		<td><?php echo $row['remarks']; ?></td>
		
		<td>
            <div class="btn-group" >
                        <!-- <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= site_url('student/edit/'.$row['id']); ?>" ><i class="fa fa-pencil"></a></i></button> -->
                        <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button>
                       
                      </div>
        </td>
    </tr>
	<?php } ?>
</tbody>
</table>

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
</script>