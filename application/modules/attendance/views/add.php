 <?php  
 // $classid= $this->input->post('attendance')  ;  
$this->session->batchID=$batch_id;
$this->session->attendance_date=$date_select;

  ?> 

<div class="card card-default">
    <div class="card-heading">
        
   <h5 class="bg-info"> <div class="well text-center"><?= $fetch_name['course_name'] ?>  -><?= $fetch_name['batch_name'] ?> ->Date    <?= $date_select ?> </div></h5>
    </div>
    <div class="card-body">
        <?= form_open('attendance/insertAttendance',array("class"=>"form-horizontal")); ?>
        <table class="table table-bordered table-hover">
            <tr>
            <th width="10%">#serial number</th>
            <th width="50%">Student Name</th>
            <th width="40%">Attendance</th>
        </tr>
         <?php  $count=1; 
         
         ?>
         <?php foreach ($students as $value) { 
             ?>
             
         <!-- <fieldset> -->
        <tr>
            <td><?= $count++  ?>  </td>
            <td><?= $value["name"] ?> </td>
            <td> 

            
                <input type="checkbox" name="<?= $value["id"]; ?>" value="p">&nbsp Present
                <input type="checkbox" name="<?= $value["id"]; ?>" value="A">&nbsp Absent
             </td>


        </tr>
                <!-- </fieldset> -->
    <?php 
   
     } ?>




        
        </table>
        <!-- <input type="hidden" name="batch_id" value="<?= $batch_id ?>"> -->
     <button type="submit"   class="btn btn-info">Submit</button>
        <?= form_close(); ?>

    </div>

</div> 