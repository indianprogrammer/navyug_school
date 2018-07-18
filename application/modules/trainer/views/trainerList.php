<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<div class="pull-left">
    <a href="<?php echo site_url('employee/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table display" id="table_id">
    <thead>
    <tr>
        <th>ID</th>
        <!-- <th>Password</th> -->
        <th>employee Name</th>
        <th>Qualification</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Profile Image</th>
        <th>Actions</th>
    </tr>
    </thead>
        <tbody>
    <?php foreach($employees as $t){ ?>
    <tr>
        <td><?php echo $t['id']; ?></td>
        <!-- <td><?php echo $t['password']; ?></td> -->
        <td><?php echo $t['name']; ?></td>
        <td><?php echo $t['qualification']; ?></td>
        <td><?php echo $t['username']; ?></td>
        <td><?php echo $t['email']; ?></td>
        <td><?php echo $t['mobile']; ?></td>
        <td><?php echo $t['address']; ?></td>
        <td><img src="<?= $t['profile_image'];?>" height=5%; ></td>
        <td>
            <!-- <select onclick="myFunction();" name="choice" id="drop">
                <option>Select</option>
                <option value="edit"> <a href="<?php echo site_url('employee/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> </option>
                <option  value="delete" id="d" >Delete</option>
                <option>View</option>
            </select> -->
                <a href="<?php echo site_url('employee/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
                 <!-- <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a><div class="btn-group"> -->
                               <div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 10px;">
      <li><a href="<?php echo site_url('employee/edit/'.$t['id']); ?>">EDIT</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div>
        </td>
    </tr>
</tbody>    
    <?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
  
<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script type="text/javascript">
    function myFunction()
    {
    	$('#drop').on('change', function() {
    var responseId = $(this).val();
    console.log(responseId);
     

    // var id = $(this).data('id');
//     bootbox.confirm("Are you sure?", function(result) {
//       if(result)
//           window.location.href = "<?php echo site_url('employee/remove/'.$t['id']); ?>"
//  									 });
 });
// // });
   

   }
</script>
<!-- <script type="text/javascript">
function($){
    
    $('select[name=serviceChoice]').change(function(){
        if( $('select[name=serviceChoice] option:selected').val() == 'A' ) {
            $('.optionBox').hide();
            $('#dropOff').show();
       } else if ( $('select[name=serviceChoice] option:selected').val() == 'B' ) {
            $('.optionBox').hide();
            $('#pickUp').show();
        } else if ( $('select[name=serviceChoice] option:selected').val() == 'C' ) {
            $('.optionBox').hide();
            $('#pickUp').show();
        } else if ( $('select[name=serviceChoice] option:selected').val() == 'D' ) {
            $('.optionBox').hide();
            $('#pickUp').show();
        } else {
            $('.optionBox').show();
        }
    });
};
</script> -->
