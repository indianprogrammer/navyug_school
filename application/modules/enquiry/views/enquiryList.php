<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Enquiry List</h3>
       <div class="card-tools pull-right">
      <a href="<?= site_url('enquiry/add_enquiry'); ?>" class="btn btn-success">Add</a> 
     </div> 
 </div>
 <div class="card-body">


    <div class="table-responsive">





<table id ="parent_table" class="table table-hover table-bordered">
	
	<thead>
		<tr>
			<th>ID</th>
			
			<th>Name</th>
			
			
			<th>Email</th>
			<th>Mobile</th>
			<th>Address</th>
			<th>Purpose</th>
			<th>Category</th>
			<th>Created at</th>
			
			<th>Comments</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$count=1 ?>
		<?php foreach($enquiry as $row){ ?>
			<tr>
				<td><?= $count++ ?></td>
				
				<td><?= $row['name']; ?></td>
				<!-- <td><?= $row['name']; ?></td> -->
				
				
				<td><?= $row['email']; ?></td>
				<td><?= $row['mobile']; ?></td>
				<td><?= $row['address']; ?></td>
				<td><?= $row['type']; ?></td>
				<td><?= $row['category']; ?></td>
				<td><?= $row['created_at']; ?></td>
				<!-- <td><?= $row['location']; ?></td> -->
				<td><?= $row['comments']; ?></td>
				
				<td>
					<div class="btn-group" >
						
						<button type="button" class="btn btn-danger" onclick="delFunction(<?= $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
						<button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button>
						
					</div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script> -->

	<script>
		$(document).ready( function () {
			$('#parent_table').DataTable();
		} );
	</script>
	<script type="text/javascript">
		var url="<?= base_url();?>";
		function delFunction()
		{
			
			
			bootbox.confirm("Are you sure?Are you sure to delete  enquiry", function(result) {
				if(result)
					
					window.location = url+'enquiry/remove/'+id ;
				
			});
		}
	</script>