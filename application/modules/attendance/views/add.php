 <?php  $classid= $this->input->post('attendance')  ;  
$this->session->classID=$classid;

  ?> 

<div class="card card-default">
    <div class="card-heading">
        
    </div>
   <h3> <div class="well text-center">Date    <?= date("y-m-d") ;?> </div></h3>
    <div class="card-body">
        <?= form_open('attendance/insertAttendance',array("class"=>"form-horizontal")); ?>
        <table class="table table-bordered table-hover">
            <tr>
            <th width="10%">#serial number</th>
            <th>Student Name</th>
            <th>Attendance</th>
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
             </td>


        </tr>
                <!-- </fieldset> -->
    <?php 
   
     } ?>




        
        </table>
        <input type="hidden" name="batch_id" value="">
     <input type="submit" name="" value="Submit" class="btn btn-info">
        <?= form_close(); ?>

    </div>

</div> 