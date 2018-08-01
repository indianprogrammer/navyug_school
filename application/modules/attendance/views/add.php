 <?php  $classid= $this->input->post('attendance')  ;  
$this->session->classID=$classid;

  ?> 

<div class="panel panel-default">
    <div class="panel panel-heading">
        
    </div>
   <h3> <div class="well text-center">Date    <?= date("y-m-d") ;?> </div></h3>
    <div class="panel panel-body">
        <?= form_open('attendance/insertAttendance',array("class"=>"form-horizontal")); ?>
        <table class="table table-striped">
            <tr>
            <th>#serial number</th>
            <th>Student Name</th>
            <th>Attendance</th>
        </tr>
         <?php  $count=1; 
         
         ?>
         <?php foreach ($students as $value) { 
             ?>
             
         <fieldset>
        <tr>
            <td><?= $count++  ?>  </td>
            <td><?= $value["student_name"] ?> </td>
            <td> 

            
                <input type="checkbox" name="<?= $value["student_id"]; ?>" value="present">Present
             </td>


        </tr>
                </fieldset>
    <?php 
   
     } ?>

     <td><input type="submit" name="" value="submit"></td>



        
        </table>
        <?= form_close(); ?>

    </div>

</div> 