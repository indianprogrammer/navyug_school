
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Subject List</h3>
                <div class="box-tools pull-right">
                    <a href="<?= site_url('subject/add'); ?>" class="btn btn-success ">Add</a>
                </div>
            </div>

<table id="subject_table" class="table table-striped table-bordered table-responsive table-hover" style="width:100%;">
    <thead>
    <tr >
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Subject Name</th>
		
		<th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php $count=1; ?>
	<?php foreach($subject as $row){ ?>
    <tr id="<?= $row['id'] ?>">
		<td><?= $count++ ?></td>
		
		<td><?= $row['name']; ?></td>
		
		<td>
            
              <div class="btn-group" >
                    <button type="button" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= site_url('subject/edit/'.$row['id']); ?>" ><i class="fa fa-pencil"></i></a></button>
                    <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                    

   
                </div>


        </td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script> -->
 <script>
    $(document).ready( function () {
        $('#subject_table').DataTable();
    } );
</script>
<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delFunction(id)
    {
     
    // var id = $(this).data('id');
      
    bootbox.confirm("Are you sure want to delete ?", function(result) {
      if(result)

             $.ajax({  
              url:"<?= base_url()?>subject/remove",  
              method:"post",  
              data:{id:id},  
              success:function(data){ 
              if(data){
                $('#'+id+'').fadeOut();
                 }else{
                        bootbox.alert("not deleted");
                 }
              }
          
   
  });
    });
}
</script>