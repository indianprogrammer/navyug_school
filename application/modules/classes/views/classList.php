<!-- <div class="pull-right">
	<a href="<?= site_url('class/add'); ?>" class="btn btn-success">Add</a> 
</div> -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">class List</h3>
                <div class="box-tools">
                    <a href="<?= site_url('classes/add_class'); ?>" class="btn btn-success ">Add</a>
                </div>
            </div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>class Name</th>
        <th>description</th>
        <th>Start time</th>
		<th>End time</th>
		
		<th>Actions</th>
    </tr>
	<?php foreach($class as $row){ ?>
    <tr>
		<td><?= $row['id']; ?></td>
		
		<td><?= $row['name']; ?></td>
        <td><?= $row['description']; ?></td>
        <td><?= $row['start_time']; ?></td>
		<td><?= $row['end_time']; ?></td>
		<td>
            <a href="<?= site_url('classes/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
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
    bootbox.confirm("Are you sure to delete <?= $row['name'] ?>", function(result) {
      if(result)
          window.location.href = "<?php echo site_url('classes/remove/'.$row['id']); ?>"
   
  });
    }
</script>