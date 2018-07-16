<div class="pull-right">
	<a href="<?php echo site_url('trainer/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<!-- <th>Password</th> -->
		<th>Trainer Name</th>
		<th>Qualification</th>
		<th>UserName</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>Profile Image</th>
		<th>Actions</th>
    </tr>
	<?php foreach($trainers as $t){ ?>
    <tr>
		<td><?php echo $t['id']; ?></td>
		<!-- <td><?php echo $t['password']; ?></td> -->
		<td><?php echo $t['trainer_Name']; ?></td>
		<td><?php echo $t['qualification']; ?></td>
		<td><?php echo $t['username']; ?></td>
		<td><?php echo $t['email']; ?></td>
		<td><?php echo $t['mobile']; ?></td>
		<td><?php echo $t['address']; ?></td>
		<td><img src="<?= $t['profile_image'];?>" height=5%; </td>
		<td>
			<select onclick="myFunction();" name="choice" id="drop">
				<option>Select</option>
				<option value="edit"> <a href="<?php echo site_url('trainer/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> </option>
				<option  value="delete" id="d" >Delete</option>
				<option>View</option>
			</select>
	            <!-- <a href="<?php echo site_url('trainer/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
	             <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span> Delete</a> -->
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script type="text/javascript">
    function myFunction()
    {
    	$('#drop').on('change', function() {
    var responseId = $(this).val();
    console.log(responseId);
     

    // var id = $(this).data('id');
//     bootbox.confirm("Are you sure?", function(result) {
//       if(result)
//           window.location.href = "<?php echo site_url('trainer/remove/'.$t['id']); ?>"
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
