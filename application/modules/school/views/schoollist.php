<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">School List</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('school/add_school'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="school_table" class="table table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Primary</th>
                        <th>Contact Secondry</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th>Logo</th>
                        <th>Banner</th>
                        <th>Actions</th>
                    </tr>
                    <thead>
                      <tbody>
                    <?php foreach ($school as $s) { ?>
                        <tr>
                            <td><?php echo $s['id']; ?></td>
                            <td><?php echo $s['organization_name']; ?></td>
                            <td><?php echo $s['email']; ?></td>
                            <td><?php echo $s['contact_pri']; ?></td>
                            <td><?php echo $s['contact_sec']; ?></td>
                            <td><?php echo $s['country_name']; ?></td>
                            <td><?php echo $s['state_name']; ?></td>
                            <td><?php echo $s['city_name']; ?></td>
                            <td data-toggle="tooltip" data-placement="top" title="<?=$s['address']?>"><?php echo substr($s['address'],0,10).'....' ?></td>
                            <td data-toggle="tooltip" data-placement="top" title="<?=$s['address']?>"><?php echo substr($s['latlong'],0,10).'....'; ?></td>
                            <td><?php echo $s['logo']; ?></td>
                            <td><?php echo $s['banner']; ?></td>
                            <td>
                                <a href="<?php echo site_url('school/edit/' . $s['id']); ?>"
                                 class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                 <a onclick="myFunction();" class="btn btn-danger btn-md delete-it"><span class="fa fa-trash"></span> Delete</a>
                             </td>
                         </tr>
                     <?php } ?>
                   </tbody> 
                 </table>

             </div>
         </div>
     </div>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
 <script>
    $(document).ready( function () {
        $('#school_table').DataTable();
    } );
</script>
 <script type="text/javascript">
    function myFunction()
    {
       
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
          window.location.href = "<?php echo site_url('school/remove/' . $s['id']) ?>"
      
  });
}
</script>