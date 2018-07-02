<?php include_once dirname(__FILE__) .'/header.php'; ?> 
  <?php include_once dirname(__FILE__) .'/sidebar.php'; ?> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<!-- <div class="row" > -->
	<div class="col-md-9 col-sm-12" style="position: absolute;top:0;left:20%">
		<h2>ADD STUDENT HERE</h2>
		<?php if($status=$this->session->flashdata('status')){?>
				 <div class="alert alert-success">
				 	<?php echo $status ?>
				 </div>					
				 <?php } ?> 
		
				
                <?php echo form_open(base_url() . 'index.php/institute/AdminController/storeStudent/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
					<div class="form-group">
						  <label for="sname">Name:</label>
						  <input type="text" class="form-control" name="sname">
						  <div class="text-danger"><?php echo form_error('sname'); ?></div>
						</div>
						<div class="form-group">
						  <label for="semail">Email:</label>
						  <input type="email" class="form-control" name="semail">
						  <div class="text-danger"><?php echo form_error('semail'); ?></div>
						</div>	
						<div class="form-group">
						  <label for="smobile">Mobile:</label>
						  <input type="text" class="form-control" name="smobile">
						  <div class="text-danger"><?php echo form_error('smobile'); ?></div>
						</div>
						<div class="form-group">
						<label for="field-2" class="control-label">Courses</label>
                        
						
							<select name="scourse" class="form-control select2">
                              <option value="">Select Course</option>
                              <?php 
								$courses = $this->db->get('courses')->result_array();
								foreach($courses as $row):
									?>
                            		<option value="<?php echo $row['course_name'];?>">
										<?php echo $row['course_name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						<div class="text-danger"><?php echo form_error('scourse'); ?></div>
					</div>
					<div class="form-group">
						 <label for="usr">Gender:</label>
						<label class="radio-inline">
						      <input type="radio" name="sgender" value="Male">Male
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="sgender" value="Female">Female
						    </label>
						    <div class="text-danger"><?php echo form_error('sgender'); ?></div>
					</div>	    
							<div class="form-group">
								 <label for="sbday">Birthday:</label>
						    <div class="input-group date" data-provide="datepicker">
						    <input type="text" class="form-control" name="sbday" style="width: 900px;">
						    <div class="input-group-addon">
						        <span class="glyphicon glyphicon-th"></span>
						    </div>
						</div>
						<div class="text-danger"><?php echo form_error('sbday'); ?></div>
					</div>

					 <div class="form-group">
						  <label for="saddress">Address</label>
						  <input type="text" class="form-control" name="saddress">
						  <div class="text-danger"><?php echo form_error('saddress'); ?></div>
						</div> 

					<div class="form-group">
						<label for="field-2" class="control-label">Fee Status</label>
                       				<select name="sfee" class="form-control select2">
	                              	<option value="">Select Status</option>
	                              	<option value="paid">paid</option>
	                            	<option value="Reamaning">Reamining</option>
	                            	</select>
	                            	<div class="text-danger"><?php echo form_error('sfee'); ?></div>
	                </div>

	                              
								
                            		
                                    
                           
                          
						
					

					
	
					<!-- <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Upload Image</label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 70px; height: 70px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>	
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="simage" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>
                     -->
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-success"> ADD</button>
						</div>
					</div>
                <?php echo form_close();?>
    



<script type="text/javascript">
	$('.datepicker').datepicker();
</script>