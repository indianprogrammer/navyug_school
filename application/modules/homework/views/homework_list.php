
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Homework List</h3>
                <div class="card-tools pull-right">
                    <a href="<?= site_url('homework/homework_add'); ?>" class="btn btn-success ">Add</a>
                </div>
            </div>
<div class="card-body">
  <div class="table-responsive">
<table id="subject_table" class="table  table-bordered table-hover">
    <thead>
    <tr >
		<!-- <th>ID</th> -->
		<!-- <th>Password</th> -->
    <th>Course Name</th>
    <th>batch Name</th>
		<th>Subject Name</th>
    <th>start date</th>
    <th>submitted date</th>
    <th>Description</th>
    <th>uploaded by</th>
		<th>file</th>
		<th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php $count=1; ?>
	<?php foreach($homework as $row){ ?>
    <tr id="<?= $row['id'] ?>">
		<!-- <td><?= $count++ ?></td> -->
		
		<td><?= $row['course_name']; ?></td>
    <td><?= $row['batch_name']; ?></td>
    <td><?= $row['subject_name']; ?></td>
    <td><?= $row['start_date']; ?></td>
    <td><?= $row['submission_date']; ?></td>
    <td><?= $row['description']; ?></td>
    <td><?= $row['staff_name']; ?></td>
		
        <td><a href="<?= base_url() ?>uploads/homework/<?= $row['file_name'] ?>">download</a></td>
		<td>
            
              <div class="btn-group" >
                  <!--  <a href="<?= site_url('subject/edit/'.$row['id']); ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a>
                    <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> -->
                    

   
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootcard.js/4.4.0/bootcard.js"></script> -->
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

             $.ajax({  
              url:"<?= base_url()?>subject/remove",  
              method:"post",  
              data:{id:id},  
              success:function(data){ 
              if(data){
                $('#'+id+'').fadeOut();
                 }else{
                        bootbox.alert("not deleted");
                 }
              }
          
   
  });
    });
}
</script>