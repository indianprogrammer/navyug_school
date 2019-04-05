 <style type="text/css">
 	.scroll-table
 	{
 		overflow-y: scroll;
 		max-height: 700px;
 		height:500px; 
 	}
 </style>

 <div class="row">
	<div class="col-md-5">
<div class="card card-default">
			<div class="card-header def">
				ADD BOOKS CATEGORY

			</div>
			<div class="card-body">
				<?php echo form_open('library/add_book_category_process',array("class"=>"form-horizontal","id"=>"form_validation")); ?>

	<div class="form-group"  data-toggle="tooltip" title="tips- maths,physics,electronic,civil...etc">
		<label for="subject_name" class="col-md-12 control-label"><span class="text-danger">*</span>Enter Category Name</label>
		<div class="col-md-12 col-sm-8">
			<input type="text" name="cat_name" value="<?php echo $this->input->post('cat_name'); ?>" class="form-control"  required autofocus/>
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
<?php 	if(count($book_category)>0) { ?>
<div class="col-md-7">
<div class="card card-default">
			<div class="card-header def">
				BOOK CATEGORY
			</div>
			<div class="card-body">
				<div class="table-responsive scroll-table">
					 <table class="table table-bordered ">
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
								<td><span class="fa fa-edit"></span></td>
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
<?php } ?>
</div>
	<script src="<?= base_url() ?>assets/admin/plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/admin/js/form_validation.js"></script>