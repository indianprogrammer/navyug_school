<?= form_open('school/add') ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-12">
                        <label for="name" class="control-label"><span class="text-danger">*</span>Username</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?= $this->input->post('name') ?>"
                            class="form-control" id="name"  autofocus/>
                            <span class="text-danger"><?= form_error('name') ?></span>
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
                        <label for="contact_pri" class="control-label"><span class="text-danger">*</span>Full name</label>
                        <div class="form-group">
                            <input type="text" name="contact_pri" maxlength="13" value="<?= $this->input->post('contact_pri') ?>"
                            class="form-control" id="full_name" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_pri') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="contact_sec" class="control-label">Contact Secondry</label>
                        <div class="form-group">
                            <input type="text" name="contact_sec"  maxlength="13" value="<?= $this->input->post('contact_sec') ?>"
                            class="form-control" id="contact_sec" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_sec') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="country_id" class="control-label"><span class="text-danger">*</span>payment Type</label>
                        <div class="form-group">
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Type</option>
                                <option value="">Debit</option>
                                <option value="">Credit</option>
                            </select>
                            <span class="text-danger"><?= form_error('country') ?></span>
                        </div>
                    </div>
                     <div class="col-md-4 col-sm-12">
                        <label for="contact_sec" class="control-label">Payer Name</label>
                        <div class="form-group">
                            <input type="text" name="contact_sec"  maxlength="13" value="<?= $this->input->post('contact_sec') ?>"
                            class="form-control" id="payer_name" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_sec') ?></span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12"><button id="sameUser">Same</button></div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <?= form_close() ?> 
<script>
$(document).ready(function(e) {
       $('#sameUser').click(function() {

    var c=$('#full_name').val();

    $("#payer_name").val(c);
});
});


</script>