<?php include_once dirname(__FILE__) .'/header.php'; ?> 
  <?php include_once dirname(__FILE__) .'/sidebar.php'; ?> 
<div class="container" style="position: absolute;top:0;left:20%">	
<h2>Add Teacher here </h2> 
 <?php if($status=$this->session->flashdata('status')){?>
			 <div class="alert alert-success">
			 	<?php echo $status ?>
			 </div>					
			 <?php } ?> 

  
   <?php echo form_open(base_url() . 'index.php/institute/AdminController/store_teacher/' , array('class' => 'form form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
	
					<div class="form-group col-md-6">
						  <label for="sname">Name:</label>
						  <input type="text" class="form-control" name="tname">
						<div class="text-danger"><?php echo form_error('tname'); ?></div>
						</div>
						<div class="form-group col-md-6">
						  <label for="semail">Email:</label>
						  <input type="email" class="form-control" name="temail">
						  <div class="text-danger"><?php echo form_error('temail'); ?></div>
						</div>
						<div class="form-group col-md-6">
						  <label for="Password">Password:</label>
						  <input type="password" class="form-control" name="tpassword">
						  <div class="text-danger"><?php echo form_error('tpassword'); ?></div>
						</div>	
						<div class="form-group col-md-6">
						  <label for="tmobile">Mobile:</label>
						  <input type="text" class="form-control" name="tmobile">
						  <div class="text-danger"><?php echo form_error('tmobile'); ?></div>
						</div>
						<div class="form-group col-md-6">
						  <label for="texp">Experience in Year </label>
						  <input type="text" class="form-control" name="texp">
						  <div class="text-danger"><?php echo form_error('texp'); ?></div>
						</div>
						<div class="form-group col-md-6">
						  <label for="tqua">Qualification </label>
						  <input type="text" class="form-control" name="tqua">
						  <div class="text-danger"><?php echo form_error('tqua'); ?></div>
						</div>
						<div class="form-group col-md-6">
						<label for="field-2" class="control-label">Course </label>
                        
						
							<select name="tcourse" class="form-control select2 col-md-6">
                              <option value="">Select Course</option>
                              <?php 
								$courses = $this->db->get('courses')->result_array();
								foreach($courses as $row):
									?>
                            		<option value="<?php echo $row['course_id'];?>">
										<?php echo $row['course_name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
                          <div class="text-danger"><?php echo form_error('tcourse'); ?></div>
						
					</div>
					<div class="form-group col-md-6">
						  <label for="tcer">Any Certification (optional) </label>
						  <input type="text" class="form-control" name="tcer">
						  
						</div>
					<div class="form-group col-md-6 ">
						 <label for="usr">Gender:&nbsp</label>
						<label class="radio-inline">
						      <input type="radio" name="tgender" value="Male">Male
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="tgender" value="Female">Female
						    </label>
						    <div class="text-danger"><?php echo form_error('tgender'); ?></div>
					</div>	    
							<div class="form-group col-md-6">
								 <label for="usr">Birthday:</label>
						    <div class="input-group date" data-provide="datepicker">
						    <input type="text" class="form-control" name="tbday" style="width: 900px;">
						    <div class="input-group-addon">
						        <span class="glyphicon glyphicon-th"></span>
						    </div>
							</div>
							<div class="text-danger"><?php echo form_error('tbday'); ?></div>
							</div>
  
  
  <button type="submit" class="btn btn-primary">Add</button>
	 <span style="color:red"><?php echo form_error('teachers') ?></span> 
 <?php echo form_close();?>
</div>
<script type="text/javascript">
	$('.datepicker').datepicker();
</script>

