 <?php $organization=$this->session->organization?$this->session->organization:'Organization' ?>
 <div class="row">
   <div class="col-md-8">
    <div class="card">
        <div class="card-header def">
            <?= strtoUpper($organization) ?> PROFILE SETTING
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="institution-form" action="<?= base_url() ?>setting/organization_profile" method="post"> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="reg_input_name" class="req"><?= $organization ?> Name </label>
                            <input size="60" maxlength="256" class="form-control" name="organization_name" id="Institution_institution_name" type="text" value="<?= ($this->input->post('organization_name') ? $this->input->post('organization_name') : $school_info['organization_name']); ?>" /><div class="school_val_error" id="Institution_institution_name_em_" style="display:none"></div>                                                    </div>
                            <div class="col-md-6">
                                <label for="reg_input_name" class="req"><?= $organization ?> Address</label>
                                <textarea class="form-control" name="address" id="Institution_institution_address"><?= ($this->input->post('address') ? $this->input->post('address') : $school_info['address']); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="reg_input_currency" class="req"><?= $organization ?> Email</label>
                                <input size="60" maxlength="256" class="form-control" name="email" id="Institution_institution_contactemail" type="text" value="<?= ($this->input->post('email') ? $this->input->post('email') : $school_info['email']); ?>" />
                                                                                  </div>
                                <div class="col-md-6">
                                    <label for="reg_input_currency" class="req">Primary Contact</label>
                                    <input size="60" maxlength="256" class="form-control" name="p_contact" id="Institution_institution_phone" type="text" value="<?= ($this->input->post('p_contact') ? $this->input->post('p_contact') : $school_info['email']); ?>" />
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="reg_input_currency" class="req">Secondry Contact</label>
                                    <input size="60" maxlength="256" class="form-control" name="sec_contact" id="Institution_institution_mobile" type="text" value="<?= ($this->input->post('sec_contact') ? $this->input->post('sec_contact') : $school_info['contact_sec']); ?>" />
                                </div>
                                                    <!-- <div class="col-md-4">
                                                        <label for="reg_input_currency" class="req"><?= $organization ?> Fax</label>
                                                        <input size="60" maxlength="256" class="form-control" name="Institution[institution_fax]" id="Institution_institution_fax" type="text" value="1234567890" /><div class="school_val_error" id="Institution_institution_fax_em_" style="display:none"></div>                                                    </div> -->
                                                    <!-- <div class="col-md-4">
                                                        <label for="reg_input_currency" class="req">Admin Contact Person</label>
                                                        <input size="60" maxlength="256" class="form-control" name="Institution[institution_contactperson]" id="Institution_institution_contactperson" type="text" value="Admin" /><div class="school_val_error" id="Institution_institution_contactperson_em_" style="display:none"></div>                                                    </div> -->
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">     
                                            <img src="<?= base_url() ?>uploads/school/<?= $school_info['logo']  ?>" alt="" >
                                        </div>
                                        <form  action="<?= base_url() ?>settings/organization_profile_setting" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                <input type="file" name="logo_upload"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info" >Upload logo</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>