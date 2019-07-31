<div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
          <h3 class="card-title">
           Sms Configuration
         </h3>
       </div> 
                        <div class="card-body">
                            <form id="form_validation" method="POST" novalidate="novalidate" action="<?= base_url() ?>settings/update_sms_configuration/<?= $sms['id'] ?>">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>">
                                <div class="form-group ">
                                    <div class="form-line">
                                        <label class="form-label">Auth key<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="auth_key" required="" aria-required="true"  value="<?= ($this->input->post('auth_key') ? $this->input->post('auth_key') : $sms['auth_key']); ?>" >
                                        <span class="text-danger"><?= form_error('auth_key');?></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="form-line">
                                        <label class="form-label">Url<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="url" required=""  value="<?= ($this->input->post('url') ? $this->input->post('url') : $sms['url']); ?>" aria-required="true" >
                                        <span class="text-danger"><?= form_error('url');?></span>
                                    </div>
                                </div>
                              

                            
                              <div class="form-group ">
                                    <div class="form-line">
                                        <label class="form-label">Route<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="route" required=""  value="<?= ($this->input->post('route') ? $this->input->post('route') : $sms['route']); ?>" aria-required="true" >
                                        <span class="text-danger"><?= form_error('route');?></span>
                                    </div>
                                </div>
                                 <div class="form-group ">
                                    <div class="form-line">
                                        <label class="form-label">Sender id<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="sender_id" required=""  value="<?= ($this->input->post('sender_id') ? $this->input->post('sender_id') : $sms['sender_id']); ?>"  aria-required="true" >
                                        <span class="text-danger"><?= form_error('sender_id');?></span>
                                    </div>
                                </div>
          
                                <button class="btn btn-primary waves-effect" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>