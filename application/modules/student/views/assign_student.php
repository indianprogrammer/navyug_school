  <div class="row">
  	<div class="col-md-6">

  		<div class="card card-default ">
  			<div class="card-header def">
  				<h3 class="card-title">ASSIGN STUDENT TO COURSE AND BATCh</h3>


  			</div>
  			<!-- /.card-header -->
  			<div class="card-body">
  				<div class="col-md-8">
  					<?= form_open('student/assign_student_process',array("class"=>"form-horizontal")); ?>
  					<div class="form-group">
  						<label for="Gender">COURSE</label>
  						<select class="form-control"  name="course" id="course"  onchange="batchSelect()">
  							<option value="">Please Select</option>
  							<?php foreach($course as $row)  {  ?>

  								<option value="<?= $row['id'] ?>" <?=  set_select('course',  ''.$row['course_name']).'',true ?> ><?= $row['course_name'] ?></option>	
  								<?php } ?>
  						</select>
  						<span class="text-danger"><?php echo form_error('course');?></span>

					</div>
  					</div>
  					<div class="col-md-8">
  						<div class="form-group">
  							<label for="Gender">BATCH</label>
  							<select class="form-control" data-required="true" name="batch" id="batch">


  							</select>
  								<span class="text-danger"><?php echo form_error('batch');?></span>
  						</div>
  					</div>
  					<div class="col-md-8">
  						<div class="form-group">
  							<label for="Gender">Select Student</label>
  							<select class="form-control" data-required="true" name="student" >
  								<option value="">Please Select</option>
  								<?php foreach($student as $row)  {  ?>

  								<option value="<?= $row['id'] ?>" <?=  set_select('student',  ''.$row['name']).'',true ?>><?= $row['name'].' ,'.$row['mobile'] ?></option>	
  								<?php } ?>
  							</select>
  							<span class="text-danger"><?php echo form_error('student');?></span>
  							
  						</div>
  					</div>
  					<div class="col-md-8">
  						<button class="btn btn-info">Submit</button>
  					</div>
  					<?= form_close() ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
<script type="text/javascript">
	
function batchSelect()
	{

		var course=$('#course').val();
		console.log(course);
		 $.ajax({  
            url:"<?= base_url()?>subject/fetch_batch_by_course",  
            method:"POST",  
            data:{course_id:course},  
            success:function(data){  
            	console.log(data);
            	var obj=JSON.parse(data);
            	var row='';
            	if(obj.length>0)
            	{
            	for(var i=0;i<obj.length;i++)
            	{
            		row+='<option value="'+obj[i].id+'">'+obj[i].batch_name+'</option>'

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