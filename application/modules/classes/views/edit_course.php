<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">EDIT COURSE</h3>
                
            </div>
            <div class="card-body">






                <?= form_open('classes/course_update/'.$course["id"].' ?>',array("class"=>"form-horizontal","id"=>"form_validation")); ?>

                <div class="form-group">
                  <label for="course_name" class="col-md-10 control-label"><span class="text-danger">*</span>COURSE NAME</label>
                  <div class="col-md-10">
                     <input type="text" name="course_name" value="<?= $this->input->post('course_name')?$this->input->post('course_name'):$course['course_name'] ?>" class="form-control" id="course_name" required  autofocus />
                     <span class="text-danger"><?= form_error('course_name');?></span>
                 </div>
             </div>

             <div class="form-group">
              <label for="description" class="col-md-10  control-label">Description</label>
              <div class="col-md-10">
                 <textarea name="description" class="form-control" id="description"><?= $this->input->post('description')?$this->input->post('description'):$course['description'] ?></textarea>
                 <span class="text-danger"><?= form_error('description');?></span>
             </div>
         </div>




         <div class="form-group">
          <div class="col-sm-offset-10 col-sm-5">
             <button type="submit" class="btn btn-success">Save</button>
         </div>
     </div>
     <?= form_close(); ?>
 </div>
</div>
</div>