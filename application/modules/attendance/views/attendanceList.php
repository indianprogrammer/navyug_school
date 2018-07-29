<table id="student_table" class="table table-striped table-bordered table-responsive">
    <thead>
    <tr>
		<th>ID</th>
	
		<th>Student Name</th>
		<th>status</th>
		
    </tr>
</thead>
<tbody>
	<?php $count=1; ?>
	<?php foreach($attendance as $row){ ?>
    <tr>
		<td><?= $count++ ?></td>
		
		<td><?= $row['student_name']; ?></td>
		<td><?= $row['attendance_status']; ?></td>
		
		
      

		
		
    </tr>
	<?php } ?>
</tbody>
</table>