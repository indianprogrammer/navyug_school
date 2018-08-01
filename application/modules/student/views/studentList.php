<!-- <div class="pull-right">
	<a href="<?= site_url('student/add'); ?>" class="btn btn-success">Add</a> 
</div> -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Student List</h3>
                <div class="box-tools pull-right">
                    <a href="<?= site_url('student/add'); ?>" class="btn btn-success ">Add</a>
                </div>
            </div>

<table id="student_table" class="table table-striped table-bordered table-responsive">
    <thead>
    <tr>
		<th>ID</th>
	
		<th>Student Name</th>
		<th>Email</th>
		<th>classes</th>
		<th>Mobile</th>
        <th>Permanent Address</th>
		<th>Corresponding Address</th>
		<th>Profile Image</th>
		<th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php $count=1; ?>
	<?php foreach($student as $row){ ?>
    <tr>
		<td><?= $count++  ?></td>
		
		<td><?= $row['student_name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?php 
        //var_dump($row['classes']);
       $studentClasses = explode(',', $row['classes']);
    // var_dump($studentClasses);die;
        foreach ($studentClasses as $studentClass) {
         echo ($classes[$studentClass-1]['name'].',');
        } 
        //var_dump($classes);

        ?></td>
		
		<td><?= $row['mobile']; ?></td>
		
        <td data-toggle="tooltip" data-placement="top" title="<?= $row['permanent_address']?>" ><?php echo substr($row['permanent_address'],0,10).'....' ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?= $row['temporary_address']?>" ><?php echo substr($row['temporary_address'],0,10).'....' ?></td>

		<td > <img src="<?=base_url()."uploads/". $row['profile_image']; ?>" style="width:50px;height:50px" ></td>
		<td>
            <a href="<?= site_url('student/edit/'.$row['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
             <a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);"  class="btn btn-danger delete-it"><span class="fa fa-trash"></span> Delete</a>

        </td>
    </tr>
	<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script>
    $(document).ready( function () {
        $('#student_table').DataTable();
    } );
</script>

<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delFunction(id)
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure to delete  record ?", function(result) {
      if(result)
         
          window.location.href = url+'student/remove/'+id
   
  });
    }
</script>