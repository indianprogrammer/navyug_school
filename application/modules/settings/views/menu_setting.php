<div class="row">
  	<div class="col-md-6">

  		<div class="card card-default ">
  			<div class="card-header def">
  				<h3 class="card-title">MENU SETTING</h3>

	
  			</div>
  			<!-- /.card-header -->
  			<div class="card-body">
					<form class="form-horizontal" method="post" action="<?= base_url() ?>settings/update_menu_setting">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2"><?= strtoupper(isset($this->session->menu_dashboard)?$this->session->menu_dashboard:'dashboard') ?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control" name="dashboard" value="<?= ($this->input->post('dashboard') ? $this->input->post('dashboard') : $menu['dashboard']); ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"><?= strtoupper(isset($this->session->menu_student)?$this->session->menu_student:'student') ?> </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control"  name="student" value="<?= ($this->input->post('student') ? $this->input->post('student') : ($menu['student'])); ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"><?= strtoupper(isset($this->session->menu_staff)?$this->session->menu_staff:'staff') ?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control"  name="staff" value="<?= ($this->input->post('staff') ? $this->input->post('staff') : $menu['staff']); ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"><?= strtoupper(isset($this->session->menu_ticket)?$this->session->menu_ticket:'ticket') ?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control"  name="ticket" value="<?= ($this->input->post('ticket') ? $this->input->post('ticket') : ($menu['ticket'])); ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"><?= strtoupper(isset($this->session->menu_classes)?$this->session->menu_classes:'classes') ?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control"  name="classes" value="<?= ($this->input->post('classes') ? $this->input->post('classes') : ($menu['classes'])); ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"><?= strtoupper(isset($this->session->menu_subjects)?$this->session->menu_subjects:'subjects') ?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control"  name="subjects" value="<?= ($this->input->post('subjects') ? $this->input->post('subjects') : ($menu['subjects'])); ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"><?= strtoupper(isset($this->session->menu_parents)?$this->session->menu_parents:'parents') ?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control"  name="parents" value="<?= ($this->input->post('parents') ? $this->input->post('parents') : ($menu['parents'])); ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"><?= strtoupper(isset($this->session->menu_account)?$this->session->menu_account:'account') ?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control"  name="account" value="<?= ($this->input->post('account') ? $this->input->post('account') : ($menu['account'])); ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                    </div>
                                </div>
                            </form>
                        </div>

  			</div>
  		</div>
  	</div>
  </div>
