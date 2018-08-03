	<label for="class_name" class="col-md-4 control-label"><span class="text-danger">*</span>Select Class and date For Attendence report </label>
<!-- <?= form_open('attendance/show_report',array('class'=>'form-horizontal')) ?> -->
<div class="row">

<div class="form-group">
	<label class="col-md-12 control-label">select class</label>
	<div class="col-md-3">
		<select id="classId" name="classId">
			<?php foreach($classes as $row) { ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>

			<?php } ?>
		</select>
	

		<span class="text-danger"><?php echo form_error('attendance');?></span>
	</div>
</div>
<div class="form-group">
	<label class="col-md-12 control-label">select date</label>
	<div class="col-md-6">
		<input type="date" name="date_select" id="date_select">
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8 col-md-3">
		<button type="submit" class="btn btn-success" id="submitdata">Show report</button>
	</div>
</div>
</div>
<div id="displayReport"></div>
<!-- <?= form_close(); ?> -->
<script>
	$(document).ready(function(){
$("#submitdata").click(function(){
	// alert("dfdf");
var id = $("#classId").val();
var date = $("#date_select").val();
console.log(name);
if(id==''||date=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "<?= base_url() ?>attendance/show_report",
data:{id:id,date:date},
success: function(data){
// console.log(data);
var obj=JSON.parse(data);
console.log(obj);
console.log(obj.report[0].class_id);
$('#displayReport').html(obj);

}
});

}
});
});
</script>