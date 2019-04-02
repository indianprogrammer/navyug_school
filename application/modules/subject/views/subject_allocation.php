<div class="row">
	<div class="col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header def">
				<h3 class="card-title">Subject Allocation</h3>

			</div>
			<div class="card-body">






				<?php echo form_open('subject/allote_subject_add',array("class"=>"form-horizontal")); ?>
				<div class="form-group">
					<label class="col-md-10 control-label"><span class="text-danger">*</span>Select <?= $this->session->menu_staff?$this->session->menu_staff:'Staff' ?></label>
					<div class="col-md-10">
						<select class="form-control"   name="staff" id="staff"  
						>
						<option value="" >--Select--- </option>
						<?php	foreach($employees as $row){ ?>
							<option value="<?= $row['id'] ?>"  <?=  set_select('staff',  ''.$row['id']).'' ?> ><?= $row['name'] ?></option>
						<?php } ?>
					</select>
				</div>
				 <span class="text-danger"><?php echo form_error('staff');?></span> 
			</div>





				<div class="form-group">
					<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Course</label>
					<div class="col-md-10">
						<select class="form-control"  data-placeholder="Select Courses" onchange="batchSelect()"  name="course" id="course"  
						>
						<option value="" >--Select Course--- </option>
						<?php	foreach($course as $row){ ?>
							<option value="<?= $row['id'] ?>"  <?=  set_select('course',  ''.$row['id']).'',true ?> ><?= $row['course_name'] ?></option>
						<?php } ?>
					</select>
				</div>
				 <span class="text-danger"><?php echo form_error('course');?></span> 
			</div>
				<div class="form-group">
					<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Batch</label>
					<div class="col-md-10">
						<select class="form-control"  data-placeholder="Select Batch"  name="batch" id="batch"  
						>
						
					</select>
				</div>
				 <span class="text-danger"><?php echo form_error('batch');?></span> 
			</div>

			<div class="form-group">
				<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Subject</label>
				<div class="col-md-10">
					<select class="form-control"  data-placeholder="Select classes" id="subject"  name="subject" style="width: 100%;"
					>
					<option value="" >--Select --- </option>
						<?php	foreach($subject as $row){ ?>
							<option value="<?= $row['id'] ?>"  <?=  set_select('subject',  ''.$row['id']).'',true ?> ><?= $row['name'] ?></option>
						<?php } ?>
				</select>
			</div>
			 <span class="text-danger"><?php echo form_error('subject');?></span> 
		</div>
		

	
	
	
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</div>
</div>
</div>
</div>


<?php echo form_close(); ?>


<script type="text/javascript">
	


	function batchSelect()
	{

		var course=$('#course').val();
		 $.ajax({  
            url:"<?= base_url()?>subject/fetch_batch_by_course",  
            method:"POST",  
            data:{course_id:course},  
            success:function(data){  
            	console.log(data);
            	var obj=JSON.parse(data);
            	var row='';
            	for(var i=0;i<obj.length;i++)
            	{
            		row+='<option value="'+obj[i].id+'">'+obj[i].batch_name+'</option>'

            	}	
            	$('#batch').html(row) ;  
            	// subjectSelect();

            },
            error:function(data)
            {

            },
        });



	}
	function subjectSelect()
	{

		
		 $.ajax({  
            url:"<?= base_url()?>subject/fetch_subject",  
            method:"GET",  
          
            success:function(data){  
            	console.log(data);
            	var obj=JSON.parse(data);
            	var row='';
            	if(obj.length>0)
            	{
            	for(var i=0;i<obj.length;i++)
            	{
            		row+='<option value="'+obj[i].id+'">'+obj[i].name+'</option>'

            	}	
            	}
            	else{

            		row='<option value="">No batch is availabel</option>'
            	}	
            	$('#subject').html(row) ;  

            },
            error:function(data)
            {

            },
        });



	}
</script>