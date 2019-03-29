<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Batches List</h3>
        <div class="card-tools">
          <div class="pull-right">
            <a href="<?= site_url('classes/add_batch'); ?>" class="btn btn-success">Add</a> 
          </div> 

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
      <table id="class_table" class="table table-striped table-hover table-bordered ">
        <thead>
          <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Batch Name</th>
            <!-- <th>Description</th> -->
            <th>Start Date</th>
            <th>End date</th>
            <!-- <th>Employee</th> -->
            <!-- <th>Start time</th> -->
            <!-- <th>End time</th> -->

            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $count=1 ?>
          <?php foreach($batch as $row){ ?>
            <tr>
              <td><?= $count++ ?></td>

              <td><?= $row['course_name']; ?></td>
              <td><?= $row['batch_name']; ?></td>
        
             
              

              <td><?= $row['start_date']; ?></td>
               <td><?= $row['end_date']; ?></td> 
              <td>

               <!--  <div class="btn-group" >
                  <a href="<?= site_url('classes/edit/'.$row['id']); ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                  <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                  <a href="<?= site_url('attendance/take_attendance') ?>"  class="btn btn-info" data-toggle="tooltip" data-placement="top" title="take attendance" ><i class="fa fa-building-o"></i></a>

                </div>
 -->

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
bootcard.confirm("Are you sure to delete  ", function(result) {
  if(result)

    window.location = url+'classes/remove/'+id ;

});
}
</script>