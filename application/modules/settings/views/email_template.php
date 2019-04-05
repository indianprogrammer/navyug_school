  <!--   <div class="row">
    <div class="col-md-6"> -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
           Email template
         </h3>
       </div> 
     </div>
      <div class="card-body">
                <div class="bg-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <!-- <h5><i class="icon fa fa-ban"></i> Alert!</h5> -->
                
                </div>
              </div>
     <?php echo form_open('settings/email_template_setting',array("class"=>"form-horizontal")); ?>
     <div class="row">

      <?php foreach($template as $row) { ?>
       <div class="col-md-6">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
             <?= $row['module'] ?> Module
           </h3>
         </div>
           <!-- tools box -->
           <!-- <div class="card-tools">
            <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
            title="Remove">
            <i class="fa fa-times"></i></button>
          </div> -->
          <!-- /. tools -->
        <!-- </div> -->
        <!-- /.card-header -->
        <div class="card-body pad">
          <div class="form-group">

          <label for="parent_Name" class="col-md-4 control-label"><span class="text-danger">*</span>Subject</label>
          <input type="text" class="form-control" name="subject[]" value="<?= $row['subject'] ?>">
        </div>
          <div class="mb-3">
            <textarea class="textarea" placeholder="Place some text here" name="template[]"
            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $row['context'] ?></textarea>
          </div>

        </div>
      </div>
      <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
        </div>
    <?php } ?>
    <input type="submit"  value="submit">
  </div>
</div>

<?= form_close() ?>
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript">

 $(function () {
  $('.textarea').wysihtml5({
    toolbar: { fa: true }
  })
}) 
</script>