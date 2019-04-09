<div class="row">
  <div class="col-md-10">

    <div class="card ">
      <div class="card-header">
        <h3 class="card-title">TAKE ATTENDANCE</h3>


      </div>

      <div class="card-body">
<form action="<?= base_url()?>attendance/fetchStudent" class="form-horizontal" method="post">
	<div class="row">
	<div class="col-md-4">
<div class="form-group">
	<label for="class_name" class="col-md-12 control-label"><span class="text-danger">*</span>Select Course  </label>
		<select id="course" name="attendance" class="form-control" onchange="batch_fetch()">
				<option value="">--select--</option>
			<?php foreach($classes as $row) { ?>
				<option value="<?= $row['id'] ?>"><?= $row['course_name'] ?></option>

			<?php } ?>
		</select>
	

		<span class="text-danger"><?php echo form_error('attendance');?></span>
	</div>

</div>
	<div class="col-md-4" id="batch_dropdown">
<div class="form-group">
	<label for="class_name" class="col-md-12 control-label"><span class="text-danger">*</span>Select Batch  </label>
		<select id="batch" name="batch_id" class="form-control">
				<option value="">--select--</option>
		</select>
	

		<span class="text-danger"><?php echo form_error('attendance');?></span>
	</div>
	
</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Attendance Start</button>
	</div>
</div>
</form>
</div>
</div>
</div>
</div>
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


</script>