
<?= form_open('account/generate_reciept') ?>

<div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-12">
                        <label for="name" class="control-label"><span class="text-danger">*</span>Enter Invoice ID</label>
                        <div class="form-group">
                            <input type="text" name="invoice" value="<?= $this->input->post('name') ?>"
                            class="form-control" id="name"  autofocus/>
                            <span class="text-danger"><?= form_error('name') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="method" class="control-label"><span class="text-danger">*</span>Select payment method </label>
                        <div class="form-group">
                            <select name="method">
                            <option value="cash">cash</option>
                            <option value="online">online</option>
                            <option value="swipe">swipe</option>
                            <span class="text-danger"><?= form_error('method') ?></span>

                        </select>
                    </div>
                    </div>
                    
                  
                    
                   
                   
                   </div>
                    <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <?= form_close() ?>
