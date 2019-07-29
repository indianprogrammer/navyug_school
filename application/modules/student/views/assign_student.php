  <div class="row">
  	<div class="col-md-6">

  		<div class="card card-default ">
  			<div class="card-header def">
  				<h3 class="card-title">ASSIGN STUDENT TO COURSE AND BATCh</h3>


  			</div>
  			<!-- /.card-header -->
  			<div class="card-body">
  				<div class="col-md-8">
  					<?= form_open('student/assign_student_process',array("class"=>"form-horizontal","id"=>"form_validation")); ?>
  					<div class="form-group">
  						<label for="Gender">COURSE</label>
  						<select class="form-control"  name="course" id="course" required  onchange="batchSelect()">
  							<option value="">Please Select</option>
  							<?php foreach($course as $row)  {  ?>

  								<option value="<?= $row['id'] ?>" <?=  set_select('course',  ''.$row['id'].'') ?> ><?= $row['course_name'] ?></option>	
  								<?php } ?>
  						</select>
  						<span class="text-danger"><?php echo form_error('course');?></span>

					</div>
  					</div>
  					<div class="col-md-8">
  						<div class="form-group">
  							<label for="Gender">BATCH</label>
  							<select class="form-control"  name="batch" id="batch" required>


  							</select>
  								<span class="text-danger"><?php echo form_error('batch');?></span>
  						</div>
  					</div>
  					<div class="col-md-8">
  						<div class="form-group">
  							<label for="Gender">Select Student</label>
  							<select class="form-control"  name="student" required >
  								<option value="">Please Select</option>
  								<?php foreach($student as $row)  {  ?>

  								<option value="<?= $row['id'] ?>" <?=  set_select('student',  ''.$row['id'].'') ?> ><?= $row['name'].' ,'.$row['mobile'] ?></option>	
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
      <di
      v class="col-md-6 col-sm-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Assign Subject List</h3>

    </div>
    <div class="card-body">

      <div class="table-responsive">
        <table id="subject_table" class="table  table-bordered table-hover">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Course Name</th>
              <th>Batch Name</th>
             
              <!-- <th>Action</th> -->


            </tr>
          </thead>
          <tbody>
            <?php $count=1; ?>
            <?php foreach($student_assign_batch as $row){ ?>
              <tr id="<?= $row['id'] ?>">
                <td><?= $row['student_name']; ?></td>
                <td><?= $row['course_name'] ?></td>
                <td><?= $row['batch_name'] ?></td>
               
              </tr>
            <?php } ?> 
          </tbody>
        </table>
          </div>
        </div>

      </div>
    </div>




  	</div>
  












  <script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/admin/js/form_validation.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
      $('#subject_table').DataTable();
    } );
function batchSelect()
	{

		var course=$('#course').val();
		console.log(course);
		 $.ajax({  
            url:"<?= base_url()?>subject/fetch_batch_by_course",  
            method:"POST",  
            data:{course_id:course,<?= $this->security->get_csrf_token_name();?>:"<?= $this->security->get_csrf_hash();?>"},  
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