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
		$studentClasses =  $row['student_id'];
    // var_dump($studentClasses);die;
		foreach ($student as $s) {
        echo $s[$studentClasses-1]['student_name'];
			# code...
		}
        // echo ($student[$studentClasses]['student_name']);
       


		?></td>
		<td><?= $row['attendance_status']; ?></td>
		
		
      

		
		
    </tr>
	<?php } ?>
</tbody>
</table>