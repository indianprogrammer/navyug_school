
<?= form_open('account/generate_invoice') ?>

<div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-12">
                        <label for="name" class="control-label"><span class="text-danger">*</span>School Name</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?= $this->input->post('name') ?>"
                            class="form-control" id="name"  autofocus/>
                            <span class="text-danger"><?= form_error('name') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="email" class="control-label"><span class="text-danger">*</span>Student Name</label>
                        <div class="form-group">
                            <input type="text" name="stuName" value="<?= $this->input->post('email') ?>"
                            class="form-control" id="email"/>
                            <span class="text-danger"><?= form_error('stuName') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
                        <div class="form-group">
                            <input type="text" name="email" value="<?= $this->input->post('email') ?>"
                            class="form-control" id="email"/>
                            <span class="text-danger"><?= form_error('email') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="contact_pri" class="control-label"><span class="text-danger">*</span>Contact Number</label>
                        <div class="form-group">
                            <input type="text" name="contact" maxlength="13" value="<?= $this->input->post('contact_pri') ?>"
                            class="form-control" id="contact_pri" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_pri') ?></span>
                        </div>
                    </div>
                  
                    
                   
                   <!--  <div class="col-md-5 col-sm-12">
                        <label for="address" class="control-label"><span class="text-danger">*</span>Address</label>
                        <div class="form-group">
                            <textarea name="address" class="form-control"
                            id="address"><?= $this->input->post('address') ?></textarea>
                            <span class="text-danger"><?= form_error('address') ?></span>
                        </div>
                    </div> -->
                     <div class="col-md-5 col-sm-12">
                        <label for="class" class="control-label"><span class="text-danger">*</span>class assign</label>
                        <div class="form-group">
                            <input type="text" name="class" value="<?= $this->input->post('class') ?>"
                            class="form-control" id="class"/>
                            <span class="text-danger"><?= form_error('class') ?></span>
                        </div>
                    </div>
                    <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <?= form_close() ?>
