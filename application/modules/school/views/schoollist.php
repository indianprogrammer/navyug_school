<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">School Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('School/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>City Id</th>
						<th>State Id</th>
						<th>Country Id</th>
						<th>Name</th>
						<th>Latlong</th>
						<th>Contact Pri</th>
						<th>Contact Sec</th>
						<th>Email</th>
						<th>Logo</th>
						<th>Banner</th>
						<th>Address</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($school as $s){ ?>
                    <tr>
						<td><?php echo $s['id']; ?></td>
						<td><?php echo $s['city_id']; ?></td>
						<td><?php echo $s['state_id']; ?></td>
						<td><?php echo $s['country_id']; ?></td>
						<td><?php echo $s['name']; ?></td>
						<td><?php echo $s['latlong']; ?></td>
						<td><?php echo $s['contact_pri']; ?></td>
						<td><?php echo $s['contact_sec']; ?></td>
						<td><?php echo $s['email']; ?></td>
						<td><?php echo $s['logo']; ?></td>
						<td><?php echo $s['banner']; ?></td>
						<td><?php echo $s['address']; ?></td>
						<td>
                            <a href="<?php echo site_url('School/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('School/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
