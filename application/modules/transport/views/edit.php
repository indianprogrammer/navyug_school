

<div class="row">
	<div class="col-md-10">

		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">ADD Homework</h3>


			</div>
			<!-- /.card-header -->
			<div class="card-body">




				<?php echo form_open_multipart('homework/add',array("class"=>"form-horizontal","id"=>"form_validation")); ?>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Course</label>
							<select class="form-control"  data-placeholder="Select Courses" onchange="batchSelect()"  name="course" id="course" required  
							>
							<option value="" >--Select Course--- </option>
							<?php	foreach($course as $row){ ?>
								<option value="<?= $row['id'] ?>"  <?=  set_select('course',  ''.$row['id']).'',true ?> ><?= $row['course_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('course');?></span> 
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Batch</label>
						<select class="form-control"  data-placeholder="Select Batch"  name="batch" id="batch_id" onchange="subjectSelect()"  required
						>

					</select>
				</div>
				<span class="text-danger"><?php echo form_error('batch');?></span> 
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Subject</label>
					<select class="form-control"   id="subject" required name="subject" 
					>

				</select>
			</div>
			<span class="text-danger"><?php echo form_error('subject');?></span> 
		</div>
		<div class="col-md-4">
			<label  class="control-label"><span class="text-danger">*</span>homework  Date</label>
			<div class="form-group">
				<!-- <div class="form-group"> -->
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div> -->
                    <input type="text" class="form-control datemask" required   name="start_date" id="date" value="<?= $this->input->post('start_date')?$this->input->post('start_date'):$homework['start_date'] ?>" >
                </div>
                <span class="text-danger"></span>
            </div>
            <div class="col-md-4">
            	<label  class="control-label"><span class="text-danger">*</span>Submission Date</label>
            	<div class="form-group">
            		
            		<input type="text" class="form-control datemask" required value="<?= $this->input->post('submission_date')?$this->input->post('submission_date'):$homework['submission_date'] ?>"   name="submission_date" id="submission_date">
            	</div>
            	<span class="text-danger"></span>
            </div>
            <div class="col-md-4">
            	<label  class="control-label"><span class="text-danger">*</span>Upload(pdf)</label>
            	<div class="form-group">
            		
            		<input type="file" class="form-control" required   name="document" >
            	</div>
            	<span class="text-danger"></span>
            </div>
            <div class="col-md-12">
            	<label  class="control-label"><span class="text-danger">*</span>Description</label>
            	<div class="form-group">
            		
            		<textarea class="form-control" name="description"><?= $this->input->post('description') ?></textarea>
            	</div>
            	<span class="text-danger"></span>
            </div>
        </div>
        <div class="form-group">
        	<div class="col-sm-offset-4 col-sm-8">
        		<button type="submit" class="btn btn-success">ADD</button>
        	</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>
</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/admin/js/form_validation.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    //Initialize Select2 Elements




    $( "#date" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     yearRange: '2018:2032'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


     
    //Datemask dd/mm/yyyy
    
});

    $( "#submission_date" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     yearRange: '2018:2032'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


     
    //Datemask dd/mm/yyyy
    
});    
});
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
				if(obj.length>0)
				{
					for(var i=0;i<obj.length;i++)
					{
						row+='<option value="'+obj[i].id+'">'+obj[i].batch_name+'</option>'

					}	
					$('#batch_id').html('<option value="">--select--</option>'+row) ;  
				}

				else{

					row='<option value="">No batch is availabel</option>'
					$('#batch_id').html(row) ;  
				}	
            	// subjectSelect();

            },
            error:function(data)
            {

            },
        });



	}
	function subjectSelect()
	{

		var batch=$('#batch_id').val();
		$.ajax({  
			url:"<?= base_url()?>subject/fetch_subject_by_batch",  
			method:"POST",  
			data:{batch_id:batch},  
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
					$('#subject').html('<option value="">--select--</option>'+row) ;  
				}

				else{

					row='<option value="">No Subject is availabel</option>'
				}	
            	// subjectSelect();

            },
            error:function(data)
            {
            	console.log('cannot connect to the server');
            },
        });



	}


</script>