<div class="row">
	<div class="col-sm-12">
		<div class="card card-default">
			<div class="card-header def">
				<h3 class="card-title">Add BOOKS</h3>

			</div>
			<div class="card-body">
				<?= form_open('library/add_book_process',array("class"=>"form-horizontal","id"=>"form_validation")); ?>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="reg_input_name">Purchase Date</label>
						
							<input  class="form-control pickdate"  name="purchase_date" id="purchase_date" value="<?= $this->input->post('purchase_date'); ?>" type="text" onkeypress="return isNumberKey(event)" />
							                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
							                                            <span class="text-danger"><?= form_error('purchase_date');?></span>
						</div>
						                                   
						<div class="form-group col-sm-6">
							<label for="reg_input_name" class="req">Bill No</label>
							<input class="form-control" name="bill_no" id="Librarybooks_librarybooks_billno" value="<?= $this->input->post('bill_no'); ?>" type="text" />     
							 <span class="text-danger"><?= form_error('bill_no');?></span>                                

						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="reg_input_name">Book ISBN No.</label>
							<input class="form-control" name="isbn_no" id="Librarybooks_librarybooks_isbn" required value="<?= $this->input->post('isbn_no'); ?>" type="text" maxlength="256" />
							 <span class="text-danger"><?= form_error('isbn_no');?></span>

						</div> 
						<div class="form-group col-sm-6">
							<label for="reg_input_name" class="req">Book No.</label>
							<input class="form-control" name="book_no"  type="text" required value="<?= $this->input->post('book_no'); ?>" onkeypress="return isNumberKey(event)" maxlength="45" />
							 <span class="text-danger"><?= form_error('book_no');?></span>

						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="reg_input_name" class="req">Title</label>
							<input class="form-control" name="title" required value="<?= $this->input->post('title'); ?>"  type="text" maxlength="256" />
							<span class="text-danger"><?= form_error('title');?></span>

						</div> 
						<div class="form-group col-sm-6">
							<label for="reg_input_name">Author</label>
							<input class="form-control" name="author" value="<?= $this->input->post('author'); ?>"  type="text" maxlength="256" required />
							<span class="text-danger"><?= form_error('author');?></span>

						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="reg_input_name">Edition</label>
							<input class="form-control" name="edition" value="<?= $this->input->post('edition'); ?>" type="text" maxlength="256"  />
							<span class="text-danger"><?= form_error('edition');?></span>                                                       
						</div> 
						<div class="form-group col-sm-6">
							<label for="reg_input" class="req">Book Category</label>
							<select class="form-control" name="book_category" id="Librarybooks_bookcategoryid" required>
								<option value="">Select Option</option>
								<?php foreach($book_category as $row) {   ?>
								<option value="<?= $row['id'] ?>" <?= set_select('book_category',''.$row['id'].'') ?> ><?= $row['category_name'] ?></option>
								<?php } ?> 
							</select>      
							<span class="text-danger"><?= form_error('book_category');?></span>                                                               
							  </div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">Publisher</label>
								<input class="form-control" name="publisher" value="<?= $this->input->post('publisher'); ?>" type="text" maxlength="256" required />  
								<span class="text-danger"><?= form_error('publisher');?></span>                                      
							</div> 
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">No.of Copies</label>
								<input class="form-control" name="copies" value="<?= $this->input->post('copies'); ?>" onkeypress="return isNumberKey(event)" type="text" maxlength="45" required />   
								<span class="text-danger"><?= form_error('copies');?></span>                                                   
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input_name">Shelf No.</label>
								<input class="form-control" name="shelf" value="<?= $this->input->post('shelf'); ?>" type="text" required /> <span class="text-danger"><?= form_error('shelf');?></span>                                                  
							</div> 
							<div class="form-group col-sm-6">
								<label for="reg_input_name">Book Position</label>
								<input class="form-control" name="position" value="<?= $this->input->post('position'); ?>" type="text" required />    
								 <span class="text-danger"><?= form_error('position');?></span>                                             
							</div> 
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">Book Cost</label>
								<input class="form-control" name="cost" value="<?= $this->input->post('cost'); ?>" type="text" onkeypress="return isNumberKey(event)"  required />
								<span class="text-danger"><?= form_error('cost');?></span>

							</div> 
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">Language</label>
								<input class="form-control" name="langauge" value="<?= $this->input->post('langauge'); ?>" type="text" required  />
								<span class="text-danger"><?= form_error('language');?></span>                                                      
							</div> 
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input" class="req">Book Condition</label>
								<select class="form-control" name="condition" id="Librarybooks_condition" required>
									<option value="">Select Option</option>
									<option value="1" <?= set_select('condition',1) ?>>As New</option>
									<option value="2" <?= set_select('condition',2) ?>>Fine</option>
									<option value="3" <?= set_select('condition',3) ?>>Very Good</option>
									<option value="4" <?= set_select('condition',4) ?>>Good</option>
									<option value="5" <?= set_select('condition',5) ?>>Fair</option>
									<option value="6" <?= set_select('condition',6) ?>>Poor</option>
									<option value="7" <?= set_select('condition',7) ?>>Missing</option>
									<option value="8" <?= set_select('condition',8) ?>>Lost</option>
								</select>
								<span class="text-danger"><?= form_error('condition');?></span>
							  </div>
							</div>
							<div class="row">
								<div class="col-sm-5"><br>
									<div class="form_sep">
										<input class="btn btn-info" type="submit"  value="Save" />                                      
										  </div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		 <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.css"> 
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>

 <!-- <script src="<?= base_url() ?>assets/admin/js/pages/forms/form-validation.js"></script> -->
 <script type="text/javascript">
   $('#form_validation').validate({
      
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }



    });
 </script>
<script type="text/javascript">
			$(document).ready(function() {
    //Initialize Select2 Elements




    $( "#purchase_date" ).datepicker({
        // flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     yearRange: '2018:2032'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


     
    //Datemask dd/mm/yyyy
    
});
});
</script>