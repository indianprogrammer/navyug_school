<?php include_once dirname(__FILE__) .'/header.php'; ?> 
  <?php include_once dirname(__FILE__) .'/sidebar.php'; ?> 
  <?php if($status=$this->session->flashdata('status')){?>
       <div class="alert alert-success">
        <?php echo $status ?>
       </div>         
       <?php } ?> 

  

<div class="container" style="position: absolute;top:0;left:17%;overflow: scroll;">
  <h2>Teachers List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Serial no.</th>
        <th> Name</th>
        <th> Email</th>
        <th> Password</th>
        <th> Mobile</th>
        <th> Experience</th>
        <th> Qualification</th>
        <th> Gender </th>
        <th> Certification</th>
        <th> Birthday</th>
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
        <td><?php echo $res->Teacher_Name ?></td>
        <td><?php echo $res->Teacher_Email ?></td>
        <td><?php echo $res->Teacher_Password ?></td>
        <td><?php echo $res->Teacher_Mobile ?></td>
        <td><?php echo $res->Teacher_Experience ?></td>
        <td><?php echo $res->Teacher_Qualification ?></td>
        <td><?php echo $res->Teacher_Gender ?></td>
        <td><?php echo $res->Teacher_Certification ?></td>
        <td><?php echo $res->Teacher_Birthday ?></td>
        
        <td><a  class="btn btn-danger" Onclick="ConfirmDelete()">DELETE</a></td>
      </tr>
       <span style="color:red"><?php echo form_error('teacher') ?></span> 
      
    </tbody>
<?php } ?>
  </table>
</div>
<script type="text/javascript">
  function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
       window.location.href="<?= base_url() ?>index.php/institute/AdminController/delete_list_teacher/<?php echo $res->Teacher_id ?>";
  else
    return false;
}
</script>