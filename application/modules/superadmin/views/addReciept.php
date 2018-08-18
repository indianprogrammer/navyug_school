<?php echo form_open('superadmin/recieptAdd',array("class"=>"form-horizontal")); ?>
	
	<div class="form-group">
		<label for="school" class="col-md-4 control-label"><span class="text-danger">*</span>For School</label>
		<div class="col-md-4">
			<!-- <input type="text" name="type" value="<?php echo $this->input->post('type'); ?>" class="form-control" id="type" /> -->
			<select name="school_id" class="form-control" id="type" autofocus>
				<option>--select--</option>
				<?php foreach($school as $row)  {     ?>
				<option value="<?= $row['id'] ?>"><?=  $row['organization_name']     ?></option>
			<?php } ?>
		</select>
			<span class="text-danger"><?php echo form_error('type');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="amount" class="col-md-4 control-label"><span class="text-danger">*</span>Amount</label>
		<div class="col-md-4">
			<input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control" id="amount"   />
			<span class="text-danger"><?php echo form_error('amount');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="payer_name" class="col-md-4 control-label"><span class="text-danger">*</span>Payer Name</label>
		<div class="col-md-4">
			<input type="text" name="payer_name" value="<?php echo $this->input->post('payer_name'); ?>" class="form-control" id="payer_name"   />
			<span class="text-danger"><?php echo form_error('payer_name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="payer_mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Payer Mobile</label>
		<div class="col-md-4">
			<input type="text" name="payer_mobile" value="<?php echo $this->input->post('payer_mobile'); ?>" class="form-control" id="payer_mobile"   />
			<span class="text-danger"><?php echo form_error('payer_name');?></span>
		</div>
	</div>
	<div class="form-group">
	
                        <label for="method" class= "col-md-4 control-label"><span class="text-danger">*</span>Select payment method </label>
                       <div class="col-md-4">
                            <select name="method" class="form-control">
                            <option value="">select</option>
                            <option value="cash">cash</option>
                            <option value="online">online</option>
                            <option value="swipe">swipe</option>
                            <span class="text-danger"><?= form_error('method') ?></span>

                        </select>
                    </div>
                  
       
      </div>



	  <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        Creat Reciept
                    </button>
                </div>
	<?= form_close() ?>