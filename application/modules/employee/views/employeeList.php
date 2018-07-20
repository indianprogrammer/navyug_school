<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
<div class="pull-left">
    <a href="<?php echo site_url('employee/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table id="employee_id" class="table display table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <!-- <th>Password</th> -->
        <th>Employee Name</th>
        <th>Qualification</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Permanent Address</th>
        <th>Temperory Address</th>
        <th>Profile Image</th>
        <th>Actions</th>
    </tr>
    </thead>
        <tbody>
    <?php foreach($employees as $t){ ?>
    <tr>
        <td><?php echo $t['id']; ?></td>
       
        <td><?php echo $t['name']; ?></td>
        <td><?php echo $t['qualification']; ?></td>
        <td><?php echo $t['username']; ?></td>
        <td><?php echo $t['email']; ?></td>
        <td><?php echo $t['mobile']; ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$t['Permanent_address']?>"><?php echo substr($t['Permanent_address'],0,10).'...' ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$t['temporary_address']?>"><?php echo substr($t['temporary_address'],0,10).'...' ?></td>
        <td><img src="<?= $t['profile_image'];?>" height=5%; ></td>
        <td>
          
                <a href="<?php echo site_url('employee/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
                 <!-- <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a><div class="btn-group"> -->
                               <div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 10px;">
      <li><a href="<?php echo site_url('employee/edit/'.$t['id']); ?>">EDIT</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div>
        </td>
    </tr>
    <?php } ?>
</tbody>    
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
  
<script>
    $(document).ready( function () {
        $('#employee_id').DataTable();
    } );
</script>
<script type="text/javascript">
    function myFunction()
    {
        $('#drop').on('change', function() {
    var responseId = $(this).val();
    console.log(responseId);
     

    // var id = $(this).data('id');
//     bootbox.confirm("Are you sure?", function(result) {
//       if(result)
//           window.location.href = "<?php echo site_url('employee/remove/'.$t['id']); ?>"
//  									 });
 });
// // });
   

   }
</script>
