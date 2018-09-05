<div class="pull-right">
    <a href="<?php echo site_url('parents/add'); ?>" class="btn btn-success">Add</a>
</div>

<table id="parent_table" class="table table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Permanent Address</th>
            <th>Temporary Address</th>
            <th>Profile Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1 ?>
        <?php foreach ($parents as $row) { ?>
            <tr>
                <td><?= $count ++ ?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['mobile']?></td>
                <td data-toggle="tooltip" data-placement="top" title="<?=$row['permanent_address']?>"><?php echo substr($row['permanent_address'],0,10).'...' ?></td>
                <td data-toggle="tooltip" data-placement="top" title="<?=$row['temporary_address']?>"><?php echo substr($row['temporary_address'],0,10).'...' ?></td>
                <td><img src="<?= base_url() ."uploads/". $row['profile_image'];?>" class="zoom" style="height: 50px;width:50px" alt=""></td>

                <td>
                    <a href="<?php echo site_url('parents/edit/' . $row['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);"  class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span>
                    Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>



<script>
    $(document).ready( function () {
        $('#parent_table').DataTable();
    } );
</script>
<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delFunction(id)
    {
       
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure want to delete  ?", function(result) {
      if(result)
          window.location = url+'parents/remove/'+id ;
      
  });
}
</script>
