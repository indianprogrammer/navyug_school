<div class="row">
	<div class="col-sm-12">
		<div class="card card-default">
			<div class="card-header def">
				<h3 class="card-title">Add BOOKS</h3>

			</div>
			<div class="card-body">
				<?php echo form_open_multipart('library/add_book_process',array("class"=>"form-horizontal")); ?>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="reg_input_name">Purchase Date</label>
						<div data-date-format="yyyy-M-d" class="input-group date">
							<input placeholder="Issued Date" class="form-control pickadate" value="2019-03-22" name="purchase_date" id="Librarybooks_librarybooks_purchasedate" type="text" /><div class="school_val_error" id="Librarybooks_librarybooks_purchasedate_em_" style="display:none"></div>                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
						</div>
						<div class="school_val_error" id="Librarybooks_librarybooks_purchasedate_em_" style="display:none"></div>                                    </div> 
						<div class="form-group col-sm-6">
							<label for="reg_input_name" class="req">Bill No</label>
							<input class="form-control" name="bill_no" id="Librarybooks_librarybooks_billno" type="text" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_billno_em_" style="display:none"></div>                
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="reg_input_name">Book ISBN No.</label>
							<input class="form-control" name="isbn_no" id="Librarybooks_librarybooks_isbn" type="text" maxlength="256" /><div class="school_val_error" id="Librarybooks_librarybooks_isbn_em_" style="display:none"></div>                
						</div> 
						<div class="form-group col-sm-6">
							<label for="reg_input_name" class="req">Book No.</label>
							<input class="form-control" name="book_no" id="Librarybooks_librarybooks_lbookno" type="text" onkeypress="return isNumberKey(event)" maxlength="45" /><div class="school_val_error" id="Librarybooks_librarybooks_lbookno_em_" style="display:none"></div>                
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="reg_input_name" class="req">Title</label>
							<input class="form-control" name="title" id="Librarybooks_librarybooks_title" type="text" maxlength="256" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_title_em_" style="display:none"></div>                
						</div> 
						<div class="form-group col-sm-6">
							<label for="reg_input_name">Author</label>
							<input class="form-control" name="author" id="Librarybooks_librarybooks_author" type="text" maxlength="256" /><div class="school_val_error" id="Librarybooks_librarybooks_author_em_" style="display:none"></div>                
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="reg_input_name">Edition</label>
							<input class="form-control" name="edition" id="Librarybooks_librarybooks_edition" type="text" maxlength="256" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_edition_em_" style="display:none"></div>                
						</div> 
						<div class="form-group col-sm-6">
							<label for="reg_input" class="req">Book Category</label>
							<select class="form-control" name="book_category" id="Librarybooks_bookcategoryid">
								<?php foreach($book_category as $row) {   ?>
								<option value="">Select Option</option>
								<option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
								<?php } ?> 
							</select>                                        <div class="school_val_error" id="Librarybooks_bookcategoryid_em_" style="display:none"></div>                                    </div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">Publisher</label>
								<input class="form-control" name="publisher" id="Librarybooks_librarybooks_publisher" type="text" maxlength="256" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_publisher_em_" style="display:none"></div>                
							</div> 
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">No.of Copies</label>
								<input class="form-control" name="copies" id="Librarybooks_librarybooks_noofcopies" onkeypress="return isNumberKey(event)" type="text" maxlength="45" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_noofcopies_em_" style="display:none"></div>                
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input_name">Shelf No.</label>
								<input class="form-control" name="shelf" id="Librarybooks_librarybooks_shelfno" type="text" maxlength="45" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_shelfno_em_" style="display:none"></div>                
							</div> 
							<div class="form-group col-sm-6">
								<label for="reg_input_name">Book Position</label>
								<input class="form-control" name="position" id="Librarybooks_librarybooks_bookposition" type="text" maxlength="45" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_bookposition_em_" style="display:none"></div>                
							</div> 
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">Book Cost</label>
								<input class="form-control" name="cost" id="Librarybooks_librarybooks_cost" type="text" onkeypress="return isNumberKey(event)" /><div class="school_val_error" id="Librarybooks_librarybooks_cost_em_" style="display:none"></div>                
							</div> 
							<div class="form-group col-sm-6">
								<label for="reg_input_name" class="req">Language</label>
								<input class="form-control" name="langauge" id="Librarybooks_librarybooks_language" type="text" />                                        <div class="school_val_error" id="Librarybooks_librarybooks_language_em_" style="display:none"></div>                
							</div> 
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="reg_input" class="req">Book Condition</label>
								<select class="form-control" name="condition" id="Librarybooks_condition">
									<option value="">Select Option</option>
									<option value="1">As New</option>
									<option value="2">Fine</option>
									<option value="3">Very Good</option>
									<option value="4">Good</option>
									<option value="5">Fair</option>
									<option value="6">Poor</option>
									<option value="7">Missing</option>
									<option value="8">Lost</option>
								</select><div class="school_val_error" id="Librarybooks_condition_em_" style="display:none"></div>                                    </div>
							</div>
							<div class="row">
								<div class="col-sm-5"><br>
									<div class="form_sep">
										<input class="btn btn-info" type="submit"  value="Save" />                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>