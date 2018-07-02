<?php include_once dirname(__FILE__) .'/header.php'; ?> 
  <?php include_once dirname(__FILE__) .'/sidebar.php'; ?> 
  

  

<div class="container" style="position: absolute;top:0;left:16%;top:10%">
  <h2 align="center">Students List</h2>
  <?php if($status=$this->session->flashdata('status')){?>
       <div class="alert alert-success">
        <?php echo $status ?>
       </div>         
       <?php } ?> 
  <table class="table table-hover" style="color:black;">
    <thead>
      <tr>
        <th>Serial no.</th>
        <th> Name</th>
        <th> Email</th>
    
        <th> Mobile</th>
        <th> Course</th>
        <th> Gender </th>
        <th> Address</th>
        <th> Birthday</th>
        <th> Fee Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	 
    <?php 
    $count=1;
    foreach($data as $res) {
    	 ?>
      <tr>
        <td><?php echo  $count++ ?></td>
        <td><?php echo $res->Student_Name ?></td>
        <td><?php echo $res->Student_Email ?></td>
        
        <td><?php echo $res->Student_Mobile ?></td>
        <td><?php echo $res->Student_Course ?></td>
        <td><?php echo $res->Student_Gender ?></td>
        <td><?php echo $res->Student_Address ?></td>
        <td><?php echo $res->Student_Birthday ?></td>
        <td><?php echo $res->Fees_Status ?></td>
        
        <td><a  class="btn btn-danger" Onclick="ConfirmDelete()">DELETE</a></td>
      </tr>
       <span style="color:red"><?php echo form_error('Student') ?></span> 
      
    </tbody>
<?php } ?>
  </table>
</div>
<script type="text/javascript">
  function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
       window.location.href="<?= base_url() ?>index.php/institute/AdminController/delete_list_student/<?php echo $res->id ?>";
  else
    return false;
}
</script>