
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Subject Listing</h3>
                <div class="box-tools">
                    <a href="<?= site_url('student/add'); ?>" class="btn btn-success ">Add</a>
                </div>
            </div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Subject Name</th>
		
		<th>Actions</th>
    </tr>
	<?php foreach($subject as $s){ ?>
    <tr>
		<td><?= $s['id']; ?></td>
		
		<td><?= $s['name']; ?></td>
		
		<td>
            <a href="<?= site_url('subject/edit/'.$s['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
             <a onclick="myFunction();" class="btn btn-danger delete-it"><span class="fa fa-trash"></span> Delete</a>

        </td>
    </tr>
	<?php } ?>
</table>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script type="text/javascript">
    function myFunction()
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
          window.location.href = "<?php echo site_url('subject/remove/'.$s['id']); ?>"
   
  });
    }
</script>