
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">BOOK LIST</h3>
                <div class="card-tools pull-right">
                    <a href="<?= site_url('library/add_books_process'); ?>" class="btn btn-success ">Add</a>
                </div>
            </div>
<div class="card-body">
  <div class="table-responsive">
<table id="subject_table" class="table table-striped table-bordered table-hover">
    <thead>
    <tr >
		<th>ID</th>
    <!-- <th>Password</th> -->
    <th>ISBN No</th>
    <th>BOOK NAME</th>
    <th>BOOK NO</th>
    <th>BOOK AUTHOR</th>
    <th>LANGAUGE</th>
		<th>STATUS</th>
		
		<th>ACTION</th>
    </tr>
</thead>
<tbody>
    <?php $count=1; ?>
	<?php foreach($book_list as $row){ ?>
    <tr id="<?= $row['id'] ?>">
		<td><?= $count++ ?></td>
		
    <td><?= $row['isbn_no']; ?></td>
    <td><?= $row['title']; ?></td>
    <td><?= $row['book_no']; ?></td>
    <td><?= $row['author']; ?></td>
		<td><?= $row['langauge']; ?></td>
    <?php switch( $row['status']){

      case 1:
      $status='available';
      break;
      case 2:
       $status='issued';
       break;
    case 3:
 $status='not available';
    }
?>
    <td><?= $status ?></td>
		
		<td>
            
              <div class="btn-group" >
                   <!-- <a href="<?= site_url('subject/edit/'.$row['id']); ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a> -->
                    <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-eye"></i></button>
                    

   
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootcard.js/4.4.0/bootcard.js"></script> -->
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
                        bootcard.alert("not deleted");
                 }
              }
          
   
  });
    });
}
</script>