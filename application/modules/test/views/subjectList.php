
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Subject List</h3>
                <div class="box-tools pull-right">
                    <a href="<?= site_url('subject/add'); ?>" class="btn btn-success ">Add</a>
                </div>
            </div>

<table id="subject_table" class="table table-striped table-bordered table-responsive table-hover" style="width:100%;">
    <thead>
    <tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Subject Name</th>
		
		<th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php $count=1; ?>
	<?php foreach($subject as $row){ ?>
    <tr>
		<td><?= $count++ ?></td>
		
		<td><?= $row['name']; ?></td>
		
		<td>
            <a href="<?= site_url('subject/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
             <a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);" class="btn btn-danger delete-it"><span class="fa fa-trash"></span> Delete</a>

        </td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
 <script>
    $(document).ready( function () {
        $('#subject_table').DataTable();
    } );
</script>
<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delFunction(id)
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure want to delete ?", function(result) {
      if(result)
          window.location = url+'subject/remove/'+id ;
   
  });
    }
</script>