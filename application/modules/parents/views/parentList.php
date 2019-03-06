
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Parent List</h3>
        <div class="card-tools pull-right">
          <a href="<?php echo site_url('parents/add'); ?>" class="btn btn-success">Add</a>
        </div>
      </div>
      <div class="card-body">

<div class="table-responsive">
<table id="parent_table" class="table table-bordered table-hover">
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
                    
                 <div class="btn-group" >
                    <button type="button" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= base_url('parents/edit/'.$row['id']); ?>" ><i class="fa fa-pencil"></i></a></button>
                    <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                   <!--  <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button>
 -->
   
                </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>
</div>
</div>
</div>
</div>


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
