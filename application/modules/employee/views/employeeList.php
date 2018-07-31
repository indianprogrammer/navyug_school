<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
<div class="pull-right">
    <a href="<?= site_url('employee/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table id="employee_table" class="table display table-bordered table-striped table-responsive">
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
          <?php $count=1; ?>
    <?php foreach($employees as $row){ ?>
    <tr>
        <td><?= $count++ ?></td>
        <td><?= $row['name']; ?></td>
        
       
        <td><?= $row['qualification']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['mobile']; ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$row['Permanent_address']?>"><?= substr($row['Permanent_address'],0,10).'...' ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$row['temporary_address']?>"><?= substr($row['temporary_address'],0,10).'...' ?></td>
        <td><img src="<?= base_url()."uploads/". $row['profile_image'];?>" style="width:50px;height:50px" ></td>
        <td>
          
                <a href="<?= site_url('employee/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
                 <a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);"  class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a>
                              <!--  <div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 10px;">
      <li><a href="<?= site_url('employee/edit/'.$row['id']); ?>">EDIT</a></li>
      <li><a href="#">DELETE</a></li>
      <li><a href="#myModal" data-toggle="modal" data-target="#myModal" >VIEW</a></li>
    </ul>
  </div> -->
        </td>
    </tr>
    <?php } ?>
</tbody>    
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>

  
<script>
    $(document).ready( function () {
        $('#employee_table').DataTable();
    } );
</script>


<script type="text/javascript">
   var url="<?php echo base_url();?>";
    function delFunction(id)
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure to delete  record ?", function(result) {
      if(result)
         
        window.location = url+'employee/remove/'+id ;
   
  });
    }
</script>