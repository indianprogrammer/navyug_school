<?php print_r($e); ?>
<?php $attendance='p';
	$date=3;
 ?>
<table class="table table-bordered">
	<tr>
<th>Student</th>
<?php $count=1; ?>
<?php for($i=1;$i<31;$i++) {  ?>
<th><?= $i ?></th>
<?php } ?>
<th>Total</th>
</tr>
		<?php for($k=0;$k<count($e);$k++) {  ?>
<tr>
	<td>
		<?= $e[$k]['student_id'] ?>
	</td>
	<?php for($j=1;$j<31;$j++)	{  ?>
	<td><?php if(($j)==date('d',strtotime($e[$k]['date']))) { echo $e[$k]['attendance_status'] ;    }      ?></td>
<?php } ?>
	<td></td>
</tr>
<?php } ?>
</table>