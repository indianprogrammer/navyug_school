<ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= base_url() ?>school/index">Home</a></li>
  <li class="breadcrumb-item ">Enquiry</li>
  <li class="breadcrumb-item active">Enquiry List</li>
</ul>




<div class="pull-left">
	<a href="<?php echo site_url('enquiry/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered table-responsive">
    <tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Name</th>
		
		
		<th>Email</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>Location</th>
		<th>Remarks</th>
		<th>Actions</th>
    </tr>
	<?php foreach($enquiry as $t){ ?>
    <tr>
		<td><?php echo $t['id']; ?></td>
	
		<td><?php echo $t['name']; ?></td>
	
		
		<td><?php echo $t['email']; ?></td>
		<td><?php echo $t['mobile']; ?></td>
		<td><?php echo $t['address']; ?></td>
		<td><?php echo $t['location']; ?></td>
		<td><?php echo $t['remarks']; ?></td>
		
		<td>
            <a href="<?php echo site_url('enquiry/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
             <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script type="text/javascript">
    function myFunction()
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
          window.location.href = "<?php echo site_url('enquiry/remove/'.$t['id']); ?>"
   
  });
    }
</script>