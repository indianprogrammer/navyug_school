<div class="row">
	<div class="col-sm-6">
		<div class="card card-default">
			<div class="card-header def">
				<h3 class="card-title">LIBRARY SETTING</h3>

			</div>
			<div class="card-body">
				<?php echo form_open('library/add_library_setting',array("class"=>"form-horizontal")); ?>
				<div class="form-group">
					<label for="employee_Name" class="col-md-10 control-label"><span class="text-danger">*</span>Due day after Issue Book</label>
					<div class="col-md-10">
						<input type="text" name="due_day" value="<?php echo $this->input->post('due_day'); ?>" class="form-control" id="due_day"  autofocus />
						<span class="text-danger"><?php echo form_error('due_day');?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="employee_Name" class="col-md-10 control-label"><span class="text-danger">*</span>Fine of 1 Day</label>
					<div class="col-md-10">
						<input type="text" name="fine" value="<?php echo $this->input->post('fine'); ?>" class="form-control" id="fine"  autofocus />
						<span class="text-danger"><?php echo form_error('fine');?></span>
					</div>
				</div>
				<div class="col-md-10">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
		

	</div>
</div>