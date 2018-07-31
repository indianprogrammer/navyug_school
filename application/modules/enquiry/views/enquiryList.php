




<div class="pull-right">
	<a href="<?php echo site_url('enquiry/add'); ?>" class="btn btn-success">Add</a> 
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

		<th>Location</th>
		<th>Remarks</th>
		<th>Actions</th>
    </tr>
</thead>
<tbody>
	<?php foreach($enquiry as $row){ ?>
    <tr>
		<td><?php echo $row['id']; ?></td>
	
		<td><?php echo $row['name']; ?></td>
	
		
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['mobile']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['purpose']; ?></td>
		<td><?php echo $row['location']; ?></td>
		<td><?php echo $row['remarks']; ?></td>
		
		<td>
            <a href="<?php echo site_url('enquiry/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
             <a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);"  class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a>
        </td>
    </tr>
	<?php } ?>
</tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready( function () {
        $('#parent_table').DataTable();
    } );
</script>
<script type="text/javascript">
	 var url="<?php echo base_url();?>";
    function myFunction()
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?Are you sure to delete  enquiry", function(result) {
      if(result)
   
      window.location = url+'enquiry/remove/'+id ;
   
  });
    }
</script>