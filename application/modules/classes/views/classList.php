<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Classes List</h3>
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
            $counting=0;
            $noOfStudent=count($studentCount);
                   // var_dump($studentCount);
            for($i=0;$i<$noOfStudent;$i++)
            {
              if($row['id']==$studentCount[$i]['class_id'])
                // echo $studentCount[$i]['student_id'].',';
                $counting++;

               // var_dump($studentCount[$i]['class_id']);
            }
            echo $counting;

            ?></td>

            <td><?php   
            $counting=0;
            $noOfSubject=count($subjectCount);
            for($i=0;$i<$noOfSubject;$i++)
            {
              if($row['id']==$subjectCount[$i]['class_id'])
                $counting++;

            }
            echo $counting; ?></td>

            <!-- <td><?= $row['start_time']; ?></td> -->
            <!-- <td><?= $row['end_time']; ?></td> -->
            <td>

             <div class="btn-group" >
              <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= site_url('classes/edit/'.$row['id']); ?>" ><i class="fa fa-pencil"></i></a></button>
              <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
              <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="take attendance"><a href="<?= site_url('attendance/take_attendance') ?>"  ><i class="fa fa-building-o"></i></a></button>

            </div>


          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
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
    bootbox.confirm("Are you sure to delete  ", function(result) {
      if(result)

        window.location = url+'classes/remove/'+id ;

    });
  }
</script>