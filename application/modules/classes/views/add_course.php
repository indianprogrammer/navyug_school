<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ADD COURSE</h3>
                
            </div>
            <div class="card-body">






                <?php echo form_open('classes/add_course_process',array("class"=>"form-horizontal","id"=>"form_validation")); ?>

                <div class="form-group">
                  <label for="course_name" class="col-md-10 control-label"><span class="text-danger">*</span>COURSE NAME</label>
                  <div class="col-md-10">
                     <input type="text" name="course_name" value="<?php echo $this->input->post('course_name'); ?>" class="form-control" id="course_name" required  autofocus />
                     <span class="text-danger"><?php echo form_error('course_name');?></span>
                 </div>
             </div>

             <div class="form-group">
              <label for="description" class="col-md-10  control-label">Description</label>
              <div class="col-md-10">
                 <textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
                 <span class="text-danger"><?php echo form_error('description');?></span>
             </div>
         </div>




         <div class="form-group">
          <div class="col-sm-offset-10 col-sm-5">
             <button type="submit" class="btn btn-success">Save</button>
         </div>
     </div>
     <?php echo form_close(); ?>
 </div>
</div>
</div>
<?php if(count($course)>0) { ?>
<div class="col-md-6 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">COURSE LIST</h3>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="student_table" class="table  table-bordered table-hover">
               <thead>
                  <tr>
                     <th>S.No</th>
                     <th>Course name</th>
                     <th>Action</th>
                 </tr>

             </thead>
             <tbody>
              <?php 

              $count=1;
              foreach($course as $row) { ?>
                  <tr>
                     <td><?= $count++ ?></td>
                     <td><?= $row['course_name'] ?></td>
                     <td><a href="<?= base_url() ?>classes/course_update/<?= $row['id'] ?>" class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-danger" onclick="delFunction(<?= $row['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-trash"></i></a>
                     </td>
                 </tr>



                 <div id="dataModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg" >

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <!-- <h4 class="modal-title">Modal Header</h4> -->
                      </div>
                      <div class="modal-body" id="student_detail">
                        <?php echo form_open('classes/edit_course',array("class"=>"form-horizontal","id"=>"form_validation")); ?>

                        <div class="form-group">
                            <label for="course_name" class="col-md-10 control-label"><span class="text-danger">*</span>COURSE NAME</label>
                            <div class="col-md-10">
                                <input type="text" name="course_name" value="<?= $this->input->post('course_name')?$this->input->post('course_name'):$row['course_name']  ?>" class="form-control" id="course_name"  autofocus required />
                                <span class="text-danger"><?php echo form_error('course_name');?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-10  control-label">Description</label>
                            <div class="col-md-10">
                                <textarea name="description" class="form-control" id="description" required><?= $this->input->post('description')?$this->input->post('description'): $row['description'] ?> </textarea>
                                <span class="text-danger"><?php echo form_error('description');?></span>
                            </div>
                        </div>

                            <input type="hidden" name="id" value="<?= $row['id'] ?>" >


                        <div class="form-group">
                            <div class="col-sm-offset-10 col-sm-5">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>

          </div>
      </div>





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
<script src="<?= base_url() ?>assets/admin/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    function delFunction(id)
        {
     swal({
      title: "Are you sure?", 
      text: "Are you sure that you want to delete this id?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
      $.ajax({
        url: "<?= base_url() ?>classes/remove_cource/"+id,
        type: "POST"
      })
      .done(function(data) {
        swal("Deleted!", "Your file was successfully deleted!", "success");
         // $('#'+id+'').fadeOut(300);
      })
      .error(function(data) {
        swal("Oops", "We couldn't connect to the server!", "error");
      });
    });
  }
</script>