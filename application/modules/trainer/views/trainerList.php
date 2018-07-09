<div class="pull-right">
	<a href="<?php echo site_url('trainer/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Password</th>
		<th>Trainer Name</th>
		<th>Qualification</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Profile Image</th>
		<th>Address</th>
		<th>Actions</th>
    </tr>
	<?php foreach($trainers as $t){ ?>
    <tr>
		<td><?php echo $t['id']; ?></td>
		<td><?php echo $t['password']; ?></td>
		<td><?php echo $t['trainer_Name']; ?></td>
		<td><?php echo $t['qualification']; ?></td>
		<td><?php echo $t['email']; ?></td>
		<td><?php echo $t['mobile']; ?></td>
		<td><?php echo $t['profile_image']; ?></td>
		<td><?php echo $t['address']; ?></td>
		<td>
            <a href="<?php echo site_url('trainer/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('trainer/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
