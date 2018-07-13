<div class="pull-right">
	<a href="<?php echo site_url('parents/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Name</th>
		<!-- <th>Qualification</th> -->
		<th>UserName</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Address</th>
		<!-- <th>Profile Image</th> -->
		<th>Actions</th>
    </tr>
	<?php foreach($parents as $t){ ?>
    <tr>
		<td><?php echo $t['id']; ?></td>
		<!-- <td><?php echo $t['password']; ?></td> -->
		<td><?php echo $t['parent_Name']; ?></td>
		<!-- <td><?php echo $t['qualification']; ?></td> -->
		<td><?php echo $t['username']; ?></td>
		<td><?php echo $t['email']; ?></td>
		<td><?php echo $t['mobile']; ?></td>
		<td><?php echo $t['address']; ?></td>
		<!-- <td><img src="<?= $t['profile_image'];?>" height=5%; </td> -->
		<td>
            <a href="<?php echo site_url('parents/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('parents/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
              <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
 <script type="text/javascript">
    function myFunction()
    {
       
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
          window.location.href = "<?php echo site_url('parents/remove/'.$t['id']) ?>"
      
  });
}
</script>