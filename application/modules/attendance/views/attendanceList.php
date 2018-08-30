<table id="student_table" class="table table-striped table-bordered table-responsive">
    <thead>
    <tr>
		<th>Serial Number</th>
	
		<th>Student Name</th>
		<th>status</th>
		
    </tr>
</thead>
<tbody>
	<?php $count=1; ?>
	<?php foreach($report as $row){ ?>
    <tr>
		<td><?= $count++ ?></td>
		
		<td><?php  
	  $studentId =  $row['student_id'];
	    // var_dump($student);die;
	    for( $i=0;$i<count($student);$i++)
	    {
	  if($row['student_id']==$student[$i]['id'])
	  {
	  	echo $student[$i]['name'];
	  }
	    	
	    }
     	


		?></td>
		<td><?= $row['attendance_status']; ?></td>
		
		
      

		
		
    </tr>
	<?php } ?>
</tbody>
</table>