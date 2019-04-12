<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Assign Subject</h3>

			</div>
			<div class="card-body">






				<?php echo form_open('subject/assign_subject_add',array("class"=>"form-horizontal","id"=>"form_validation")); ?>

				<div class="form-group">
					<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Course</label>
					<div class="col-md-10">
						<select class="form-control"  data-placeholder="Select Courses" onchange="batchSelect()"  name="course" id="course" required  
						>
						<option value="" >--Select Course--- </option>
						<?php	foreach($course as $row){ ?>
							<option value="<?= $row['id'] ?>"  <?=  set_select('course',  ''.$row['course_name']).'',true ?> ><?= $row['course_name'] ?></option>
						<?php } ?>
					</select>
				</div>
				<span class="text-danger"><?php echo form_error('course');?></span> 
			</div>
			<div class="form-group">
				<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Batch</label>
				<div class="col-md-10">
					<select class="form-control"  data-placeholder="Select Batch"  name="batch" id="batch"  required
					>
						<option value="">--select-- </option>
				</select>
			</div>
			<span class="text-danger"><?php echo form_error('batch');?></span> 
		</div>

		<div class="form-group">
			<label class="col-md-10 control-label"><span class="text-danger">*</span>Select Subject</label>
			<div class="col-md-10">
				<select class="form-control select2" multiple="multiple" data-placeholder="Select classes" id="subject" required name="subject[]" style="width: 100%;"
				>

			</select>
		</div>
		<span class="text-danger"><?php echo form_error('subject[]');?></span> 
	</div>


	
	
	
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-5">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</div>
<?= form_close(); ?>
</div>
</div>
<?php if(count($assign_subject)>0) { ?>
<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Assign Subject List</h3>

		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table  table-bordered table-hover">
					<thead>
						<tr>
							<th>Course Name</th>
							<th>Batch Name</th>

							<th>Subject Name</th>
							<th>Action</th>


						</tr>
					</thead>
					<tbody>
						<?php $count=1; ?>
						<?php foreach($assign_subject as $row){ ?>
							<tr id="<?= $row['id'] ?>">
								<td><?= $row['course_name'] ?></td>
								<td><?= $row['batch_name'] ?></td>

								<td><?= $row['subject_name']; ?></td>
								<td></td>
							</tr>
						<?php } ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<?php } ?>
</div>




<script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/admin/js/form_validation.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();
    subjectSelect()
    //Datemask dd/mm/yyyy
    
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
					$('#batch').html('<option value="">--select--</option>'+row) ; 

				}	
			}

				else{

            		row='<option value="">No batch is availabel</option>'
				$('#batch').html(row) ;  
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
						$('#subject').html('<option value="">--select--</option>'+row) ;  
					}	
				}
				else{

					row='<option value="">No batch is availabel</option>'
				$('#subject').html(row) ;  
				}	

			},
			error:function(data)
			{

			},
		});



	}
</script>