  <?php include_once dirname(__FILE__) .'/header.php'; ?> 
  <?php include_once dirname(__FILE__) .'/sidebar.php'; ?> 
  <?php if($status=$this->session->flashdata('status')){?>
       <div class="alert alert-success">
        <?php echo $status ?>
       </div>         
       <?php } ?> 

  

<div class="container" style="position: absolute;top:0;left:30%">
  <h2>Course List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Serial no.</th>
        <th>Course_name</th>
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
        <td><?php echo $res->course_name ?></td>
        
        <td><a  class="btn btn-danger" Onclick="ConfirmDelete()">DELETE</a></td>
        <td><?=  $c=$this->db->from("courses")->count_all_results();?>
      </tr>
       <span style="color:red"><?php echo form_error('course') ?></span> 
      
    </tbody>
<?php } ?>
  </table>
</div>
<script type="text/javascript">
  function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
       window.location.href="<?= base_url() ?>index.php/institute/AdminController/delete_list_course/<?php echo $res->course_id ?>";
  else
    return false;
}
</script>
