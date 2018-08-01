<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">class List</h3>
                <div class="box-tools">
 <div class="pull-right">
	<a href="<?= site_url('classes/add_class'); ?>" class="btn btn-success">Add</a> 
</div> 
                   
                </div>
            </div>

<table id="class_table" class="table table-striped table-bordered table-responsive">
    <thead>
    <tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Class Name</th>
        <th>Description</th>
        <th>No. of Student</th>
        <th> No of subject</th>
        <!-- <th>Employee</th> -->
        <!-- <th>Start time</th> -->
		<!-- <th>End time</th> -->
		
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php $count=1 ?>
	<?php foreach($class as $row){ ?>
    <tr>
		<td><?= $count++ ?></td>
		
		<td><?= $row['name']; ?></td>
        <td><?= $row['description']; ?></td>
        
        <td><?php 

      for($i=1;$i<count($studentCount);$i++)
      {
        if($row['id']==$studentCount[$i]['class_id'])
            echo ($studentCount[$i]['student_id']);
      }

         ?></td>
        <td><?=  $studentCount ?></td>
      
        <!-- <td><?= $row['start_time']; ?></td> -->
		<!-- <td><?= $row['end_time']; ?></td> -->
		<td>
            <a href="<?= site_url('classes/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
             <a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);"  class="btn btn-danger delete-it"><span class="fa fa-trash"></span> Delete</a>

        </td>
    </tr>
	<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
 <script>
    $(document).ready( function () {
        $('#class_table').DataTable();
    } );
</script>
<script type="text/javascript">
     var url="<?php echo base_url();?>";
    function delFunction(id)
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure to delete  ", function(result) {
      if(result)
          
      window.location = url+'classes/remove/'+id ;
   
  });
    }
</script>