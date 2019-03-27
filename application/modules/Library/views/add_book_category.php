<div class="row">
	<div class="col-md-5">
<div class="card card-default">
			<div class="card-header def">
				ADD BOOKS CATEGORY

			</div>
			<div class="card-body">
				<?php echo form_open('library/add_book_category_process',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="subject_name" class="col-md-12 control-label"><span class="text-danger">*</span>Enter Category Name</label>
		<div class="col-md-12 col-sm-8">
			<input type="text" name="cat_name" value="<?php echo $this->input->post('cat_name'); ?>" class="form-control"  data-toggle="tooltip" title="tips- maths,physics,electronic,civil...etc" required autofocus/>
			<span class="text-danger"><?php echo form_error('cat_name');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">ADD</button>
        </div>
	</div>

<?php echo form_close(); ?>
			</div>
		</div>
	</div>
<div class="col-md-7">
<div class="card card-default">
			<div class="card-header def">
				BOOK CATEGORY
			</div>
			<div class="card-body">
				<div class="table-responsive">
					 <table class="table table-bordered">
					 	<thead>
					 	<?php $count=1;  ?>
					 	<tr>
						<th>No</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
						</thead>
						<tbody>
							<?php foreach($book_category as $row) { ?>
 							<tr>
								<td><?= $count++ ?></td>
								<td><?= $row['category_name'] ?></td>
								<td></td>
								<!-- <td></td> -->
							</tr>
						<?php } ?>
						</tbody>
						<!-- <th></th> -->
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
	