
<h4>Employee List</h4>
<div class="pull-right">
    <a href="<?= site_url('employee/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table id="employee_table" class="table display table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <!-- <th>Password</th> -->
        <th>Employee Name</th>
        <!-- <th>Employee Type</th> -->
        <th>Qualification</th> 
       <th>Email</th>
        <th>Mobile</th>
        <th>Permanent Address</th>
        <th>Temperory Address</th>
        <th>Profile Image</th>
        <th>Actions</th>
    </tr>
    </thead>
        <tbody>
          <?php $count=1; ?>
    <?php foreach($employees as $row){ ?>
    <tr>
        <td><?= $count++ ?></td>
        <td><?= $row['name']; ?></td>
        
       
        <td><?= $row['qualification']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['mobile']; ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$row['permanent_address']?>"><?= substr($row['permanent_address'],0,10).'...' ?></td>
        <td data-toggle="tooltip" data-placement="top" title="<?=$row['temporary_address']?>"><?= substr($row['temporary_address'],0,10).'...' ?></td>
        <td><img src="<?= base_url()."uploads/". $row['profile_image'];?>" alt="" class="zoom" style="width:50px;height:50px" ></td>
        <td>
          
               
                          <div class="btn-group" >
                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= base_url() ?>/employee/edit/<?= $row['id'] ?>" ><i class="fa fa-pencil"></i></a></button>
                        <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button>
                    </div>
        </td>
         <!-- modal class start -->
                      <!-- <div class="container"> -->
                        <div id="dataModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg" >

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!-- <h4 class="modal-title">Modal Header</h4> -->
                            </div>
                            <div class="modal-body" id="employee_detail">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </div> -->
                <!-- modal class end -->
    </tr>
    <?php } ?>
</tbody>    
</table>



  
<script>
    $(document).ready( function () {
        $('#employee_table').DataTable();
    } );
</script>


<script type="text/javascript">
   var url="<?php echo base_url();?>";
    function delFunction(id)
    {
     
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure to delete  record ?", function(result) {
      if(result)
         
        window.location = url+'employee/remove/'+id ;
   
  });
    }
</script>
<script>   
 
  $('.view_data').click(function(){  
   var employee_id = $(this).attr("id");  
            // console.log(student_id);
            viewEmployee();
      function viewEmployee() {     
           $.ajax({  
            url:"<?= base_url()?>employee/fetchEmployeeView",  
            method:"post",  
            data:{id:employee_id},  
            success:function(data){  
                var obj=JSON.parse(data);
                // console.log(obj);
                
                $('#employee_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Name</th><th>Qualification</th><th>Email</th><th>Mobile</th><th>Permanent Address</th><th>Corresponding Address</th></tr><tr><td>'+obj.name+'</td><td>'+obj.qualification+'</td><td>'+obj.email+'</td><td>'+obj.mobile+'</td><td>'+obj.Permanent_address+'</td><td>'+obj.temporary_address+'</td></table>');  

                $('#dataModal').modal("show");  
            }  
        });  
         }

            

       
      
   });  
 </script>