<?php echo form_open('superadmin/invoiceAdd',array("class"=>"form-horizontal")); ?>
	
	<div class="form-group">
		<label for="type" class="col-md-4 control-label"><span class="text-danger">*</span>For School</label>
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


	  <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Add Invoice
                    </button>
                </div>
	<?= form_close() ?>