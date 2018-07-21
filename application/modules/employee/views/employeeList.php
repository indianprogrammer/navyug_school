<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
<div class="pull-left">
    <a href="<?= site_url('employee/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table id="employee_id" class="table display table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <!-- <th>Password</th> -->
        <th>Employee Name</th>
        <!-- <th>Employee Type</th> -->
        <th>Qualification</th> 
       <th>Email</th>
        <th>Mobile</th>
        <th>Permanent Address</th>
        <th>Temperory Address</th>
        <th>Profile Image</th>
        <th>Actions</th>
    </tr>
    </thead>
        <tbody>
    <?php foreach($employees as $row){ ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <!-- <td><?= $row['authentication_id']; ?></td> -->
       
        <td><?= $row['qualification']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['mobile']; ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$row['Permanent_address']?>"><?= substr($row['Permanent_address'],0,10).'...' ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$row['temporary_address']?>"><?= substr($row['temporary_address'],0,10).'...' ?></td>
        <td><img src="<?= $row['profile_image'];?>" height=5%; ></td>
        <td>
          
                <a href="<?= site_url('employee/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
                 <!-- <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a><div class="btn-group"> -->
                               <div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 10px;">
      <li><a href="<?= site_url('employee/edit/'.$row['id']); ?>">EDIT</a></li>
      <li><a href="#">DELETE</a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal" onclick="view();">VIEW</a></li>
    </ul>
  </div>
        </td>
    </tr>
    <?php } ?>
</tbody>    
</table>
<div class="pull-right">
    <?= $rowhis->pagination->create_links(); ?>    
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
//           window.location.href = "<?= site_url('employee/remove/'.$row['id']); ?>"
//  									 });
 });
// // });
   

   }
</script>
<script type="text/javascript">
function view()
{
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
}
</script>