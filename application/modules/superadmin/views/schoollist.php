<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Organization List</h3>
                <div class="box-tools pull-right">
                    <a href="<?= site_url('superadmin/add_school'); ?>" class="btn btn-success btn-sm right">Add</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="school_table" class="table table-striped table-responsive table-sm table-hover">
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
                    <?php  $count=1; ?>
                    <?php foreach ($school as $row) { ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $row['organization_name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['contact_pri']; ?></td>
                            <td><?= $row['contact_sec']; ?></td>
                            <td><?= $row['country_name']; ?></td>
                            <td><?= $row['state_name']; ?></td>
                            <td><?= $row['city_name']; ?></td>
                            <td data-toggle="tooltip" data-placement="top" title="<?=$row['address']?>"><?= substr($row['address'],0,10).'....' ?></td>
                            <td data-toggle="tooltip" data-placement="top" title="<?=$row['latlong']?>"><?= substr($row['latlong'],0,10).'....'; ?></td>
                            <td><img src="<?= base_url()."uploads/".$row['logo']; ?>" alt="" style="width:50px;height:50px"></td>
                            <td><img src="<?= base_url()."uploads/".$row['banner']; ?>" alt="" style="width:50px;height:50px"></td>
                         
                            <td>
                               
                                
                                  <div class="btn-group">
                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?=  site_url('superadmin/edit/' . $row['id']); ?>" ><i class="fa fa-pencil"></a></i></button>
                        <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= site_url('superadmin/getCredentialAdmin/'.$row['id']); ?>"  target="_blank" >Enter Admin Panel</a>
                            <a class="dropdown-item" href="javascript:void(0)" class="view_ledger" onclick="ledger(<?= $row['id']?>)" id="<?= $row['id']?>" >Ledger</a>
                            <a class="dropdown-item" href="" >Disable</a>
                           
                          </div>
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
                            <div class="modal-body" id="school_detail">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </div> -->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
 <script>
    $(document).ready( function () {
        $('#school_table').DataTable();
    } );
</script>
 <script type="text/javascript">
   var url="<?php echo base_url();?>";
    function delFunction(id)
    {
       
    // var id = $(this).data('id');
    bootbox.confirm("Are you sure to delete <?= $row['organization_name'] ?> ?", function(result) {
      if(result)
          
         window.location = url+'school/remove/'+id ;

      
  });
}
</script>

<script>   
 
  $('.view_data').click(function(){  
   var school_id = $(this).attr("id");  
           
            viewSchool();
      function viewSchool() {     
           $.ajax({  
            url:"<?= base_url()?>superadmin/fetchschoolView",  
            method:"post",  
            data:{id:school_id},  
            success:function(data){  

               
                var obj=JSON.parse(data);
                console.log(obj);
                $('#school_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>school name</th><th>Email</th><th>country</th><th>state</th><th>city</th><th>Primary contact</th><th>Secondry Contact</th><th> Address</th></tr><tr><td>'+obj.organization_name+'</td><td>'+obj.email+'</td><td>'+obj.country_name+'</td><td>'+obj.state_name+'</td><td>'+obj.city_name+'</td><td>'+obj.contact_pri+'</td><td>'+obj.contact_sec+'</td><td>'+obj.address+'</td><table>');  

                $('#dataModal').modal("show");  
            }  
        });  
         }

            

       
      
   });  
  function ledger($id)
  {

    $.ajax({  
            url:"<?= base_url()?>superadmin/getLedgerSchool",  
            method:"post",  
            data:{id:$id},  
            success:function(data){  

               
                var obj=JSON.parse(data);
                console.log(obj);

                $('#school_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Debit</th><th>Credit</th><th>Date</th><th>state</th><th>city</th><th>Primary contact</th><th>Secondry Contact</th><th> Address</th></tr><tr><td>'+obj.organization_name+'</td><td>'+obj.email+'</td><td>'+obj.country_name+'</td><td>'+obj.state_name+'</td><td>'+obj.city_name+'</td><td>'+obj.contact_pri+'</td><td>'+obj.contact_sec+'</td><td>'+obj.address+'</td><table>');  

                // $('#dataModal').modal("show");  
            }  
        });  
  }
 
 </script>
 <script type="text/javascript">
   $('.view_ledger').click(function(){  
   var school_id = $(this).attr("id");  
// var school_id = $(this).attr("id"); 
console.log("ff");
 });
 </script>