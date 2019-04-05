
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">BOOK  ISSUE DETAIL</h3>
                <!-- <div class="card-tools pull-right">
                    <a href="<?= site_url('library/add_books_process'); ?>" class="btn btn-success ">Add</a>
                </div> -->
            </div>
<div class="card-body">
  <div class="table-responsive">
<table id="subject_table" class="table  table-bordered table-hover">
    <thead>
    <tr>
		<th>ID</th>
    <!-- <th>Password</th> -->
    <th>Name</th>
    <th>Book Name</th>
    <th>Book No</th>
    <th>Author</th>
    <th>Issue date</th>
    <th>Due Date</th>
    <th>Return Date</th>
		<th>STATUS</th>
		
		<th>ACTION</th>
    </tr>
</thead>
<tbody>
    <?php $count=1; ?>
	<?php foreach($issue_book as $row){ ?>
    <tr id="<?= $row['id'] ?>">
		<td><?= $count++ ?></td>
		
    <td><a href="<?= base_url() ?>student/getFullDetails?student_id=<?= $row['name']; ?>"></a><?= $row['name']; ?></td>
    <td><?= $row['title']; ?></td>
    <td><?= $row['book_no']; ?></td>
    <td><?= $row['author']; ?></td>
    <td><?= $row['issue_date']; ?></td>
    <td><?= $row['due_date']; ?></td>
    <td><?= $row['returning_date']; ?></td>
		<!-- <td><?= $row['langauge']; ?></td> -->
   
    <td><?= $row['status'] ?></td>
		
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
                        bootbox.alert("not deleted");
                 }
              }
          
   
  });
    });
}
</script>