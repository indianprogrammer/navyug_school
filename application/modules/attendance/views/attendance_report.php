
<!-- <style type="text/css">
	@media print 
	{
		table td
		{
			border:1px solid black ;
		}

	}


</style> -->

<div class="card">
 	<div class="card-header">
 		<h3 class="card-title"> Attendance report</h3>

 	</div>
 	<div class="card-body">

<!-- <h5 align="center" style="font-weight:150px;"></h5>
	<br> -->	
		<?= form_open('attendance/attendance_report',array("class"=>"form-horizontal","id"=>"form_validation")); ?>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label class="col-md-12 control-label"><span class="text-danger">*</span>Select course</label>
				<select id="course" name="course_id" class="form-control" onchange="batch_fetch()">
					<option value="">--Select--</option>
					<?php foreach($course as $row) { ?>
						<option value="<?= $row['id'] ?>"><?= $row['course_name'] ?></option>

					<?php } ?>
				</select>


				<span class="text-danger"><?php echo form_error('attendance');?></span>
			</div>
		</div>
		<div class="col-md-3" id="batch_dropdown">
			<div class="form-group">
				<label for="class_name" class="col-md-12 control-label"><span class="text-danger">*</span>Select Batch  </label>
				<select id="batch" name="batch_id" class="form-control">
					<option value="">--select--</option>
				</select>


				<span class="text-danger"><?php echo form_error('batch');?></span>
			</div>

		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label class="col-md-12 control-label"><span class="text-danger">*</span>Select Year</label>
				<select id="year" name="year" class="form-control">
					<option value="">--Select--</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
				</select>


				<span class="text-danger"><?php echo form_error('month');?></span>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="col-md-12 control-label"><span class="text-danger">*</span>Select Month</label>
				<select id="month" name="month" class="form-control">
					<option value="">--Select--</option>
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>


				<span class="text-danger"><?php echo form_error('month');?></span>
			</div>
		</div>
		<div class="col-md-12" align="center">
			<button class="btn btn-info" type="submit">Show Report</button>
		</div>
	</div>
	<?= form_close(); ?>
</div>
</div>
<?php if(count($attendance_report)>0)  {   ?>
		<div class="card" id="div_print">
		<div class="card-body"> 
			<div class="card-header">
				<button class="btn btn-success print_report" onclick="print_report()">Print</button>
			</div>
	<div class="table-responsive">
<table class="table table-bordered">
	<tr>
<th>Student</th>
<?php $count=1; 
?>
<?php for($i=1;$i<=$no_of_days;$i++) {  ?>
<th><?= $i ?></th>
<?php } ?>
<th>Total</th>
</tr>
		<?php for($k=0;$k<count($attendance_report);$k++) {
$present=0;
		  ?>

<tr>
	<td>
		<a href="<?= base_url() ?>student/getFullDetails?student_id=<?= $attendance_report[$k]['student_id'] ?>" target="_blank"> <?= $attendance_report[$k]['name']  ?> </a>
	</td>
	<?php for($j=1;$j<=$no_of_days;$j++)	{  ?>
	<td><?php if(($j)==date('d',strtotime($attendance_report[$k]['date']))) { echo $attendance_report[$k]['attendance_status'] ; if($attendance_report[$k]['attendance_status']=='p'){ $present++; }   }      ?></td>
<?php } ?>
	<td>P= <?= $present ?> Days</td>
</tr>
<?php } ?>
</table>
</div>
</div>

<?php } ?>
<script type="text/javascript">
		
// $(document).ready(function(){
// $('#batch_dropdown').hide();	
// });


function batch_fetch()
{
var course_id=$('#course').val();
console.log(course_id);
	$.ajax({
			 url:"<?= base_url()?>subject/fetch_batch_by_course",  
            method:"POST",  
            data:{course_id:course_id,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},  
            success:function(data){  
            	console.log(data);
            	var obj=JSON.parse(data);
            	var row='';
            	if(obj.length>0)
            	{
            	for(var i=0;i<obj.length;i++)
            	{
            		row+='<option value="'+obj[i].id+'" >'+obj[i].batch_name+'</option>'

            	}
            	}
            	else{

            		row='<option value="">No batch is availabel</option>'
            	}	
            	$('#batch').html(row) ;  
            	// subjectSelect();

            },
            error:function(data)
            {

            },
		});

}

function print_report()
{

        var divToPrint = document.getElementById('div_print');
        var popupWin = window.open('', '', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
  


}
</script>