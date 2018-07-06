<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">School Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('school/add_school'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact Primary</th>
                        <th>Contact Secondry</th>
                        <th>Country Id</th>
                        <th>State Id</th>
                        <th>City Id</th>
                        <th>Latlong</th>
                        <th>Logo</th>
                        <th>Banner</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($school as $s) { ?>
                        <tr>
                            <td><?php echo $s['id']; ?></td>
                            <td><?php echo $s['name']; ?></td>
                            <td><?php echo $s['address']; ?></td>
                            <td><?php echo $s['email']; ?></td>
                            <td><?php echo $s['contact_pri']; ?></td>
                            <td><?php echo $s['contact_sec']; ?></td>
                            <td><?php echo $s['country_id']; ?></td>
                            <td><?php echo $s['state_id']; ?></td>
                            <td><?php echo $s['city_id']; ?></td>
                            <td><?php echo $s['latlong']; ?></td>
                            <td><?php echo $s['logo']; ?></td>
                            <td><?php echo $s['banner']; ?></td>
                            <td>
                                <a href="<?php echo site_url('school/edit/' . $s['id']); ?>"
                                   class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script type="text/javascript">
    function myFunction()
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
          window.location.href = "<?php echo site_url('school/remove/' . $s['id']) ?>"
   
  });
    }
</script>