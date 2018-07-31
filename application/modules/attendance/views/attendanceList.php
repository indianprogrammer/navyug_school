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
		
		<td><?= $row['student_id']; ?></td>
		<td><?= $row['attendance_status']; ?></td>
		
		
      

		
		
    </tr>
	<?php } ?>
</tbody>
</table>