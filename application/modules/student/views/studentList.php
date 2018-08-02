
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                            <td ><?= $row['email']; ?></td>
                            <td width="1%" ><?php 

                            $studentClasses = explode(',', $row['classes']);

                            foreach ($studentClasses as $studentClass) {
                               $subject=($classes[$studentClass-1]['name']. "&nbsp&nbsp&nbsp");
                               echo rtrim($subject);
                           } 


                           ?></td>

                           <td><?= $row['mobile']; ?></td>

                           <td data-toggle="tooltip" data-placement="top" title="<?= $row['permanent_address']?>" ><?php echo substr($row['permanent_address'],0,10).'....' ?></td>
                           <td data-toggle="tooltip" data-placement="top" title="<?= $row['temporary_address']?>" ><?php echo substr($row['temporary_address'],0,10).'....' ?></td>

                           <td> <img src="<?=base_url()."uploads/". $row['profile_image']; ?>" style="width:50px;height:50px" ></td>
                           <td>



                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-flat">Action</button>
                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                  <span class="caret"></span>
                                  <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                  <!-- <li><a href="#">Action</a></li> -->
                                  <li><a href="<?= site_url('student/edit/'.$row['id']); ?>" >Edit</a> </li>
                                  <li><a onclick="delFunction(<?php echo $row['id'] ?>);" href="javascript:void(0);"  class="delete-it"> Delete</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#" id="<?= $row['id']?>" class="view_data">View</a></li>

                              </ul>
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
                            <div class="modal-body" id="student_detail">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </div> -->
                <!-- modal class end -->
            </td>
        </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
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

<script>   
 
  $('.view_data').click(function(){  
   var student_id = $(this).attr("id");  
            console.log(student_id);
           $.ajax({  
            url:"<?= base_url()?>student/fetchStudentView",  
            method:"post",  
            data:{id:student_id},  
            success:function(data){  
                var obj=JSON.parse(data);
                
                $('#student_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Student name</th><th>classes</th><th>Email</th><th>Mobile</th><th>Permanent Address</th><th>Corresponding Address</th></tr><tr><td>'+obj.student_name+'</td><td>'+obj.classes+'</td><td>'+obj.email+'</td><td>'+obj.mobile+'</td><td>'+obj.permanent_address+'</td><td>'+obj.temporary_address+'</td><table><button type="button" class="btn btn-info center full_details" >GET FULL DETAILS</button>');  

                $('#dataModal').modal("show");  
            }  
        });  
           
            $(".full_details").on('click', function(){
                 console.log("uuu");
                // $.ajax({
                //     method: "POST",
                //     url:" <?= base_url() ?>account/checkBalance", 
                //     data: {
                //         keyword: 18 
                //     },
                //     success: function( responseObject ) {
                //         console.log(responseObject);
                //         // $("#showBalance").html("your balance = "+responseObject);


                //     }
                // });
            });

           
            

       
      
   });  

</script>
<script>


</script>