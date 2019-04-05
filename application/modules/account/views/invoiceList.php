<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">INVOICE LISt</h3>
        <div class="card-tools pull-right">
        <a href="<?php echo site_url('account/add_invoice'); ?>" class="btn btn-success">Add</a>
        </div>
      </div>
      <div class="card-body">


        <div class="table-responsive">
<table id="invoice_table" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Invoice Number</th>
        <th>Student Name</th>
        <th>Total Amount</th>
        <th>Date</th>
        <th>status</th>
       
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
     <?php   $count=1; ?>
    <?php foreach ($invoice as $row) { ?>
        <tr>
            <td><?=$count++ ?></td>
            <td><?= $invoice_prefix ?><?=$row['invoice_id'] ?> </td>
            <td data-toggle="tooltip" data-placement="top" title="click to view" ><a href="<?=base_url()?>student/getFullDetails?student_id=<?=  $row['student_id'] ?>"><?=$row['customer_name'] ?></a> </td>
             <td><?=$row['total_amount'] ?></td>
             <td><?=$row['date'] ?></td>
             <td><?= $row['status'] ?></td>
             <td><a href="<?= site_url('account/getpdf/'.$row['invoice_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

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
</div>
</div>
</div>
</div>
</div>


<script>
    $(document).ready( function () {
        $('#invoice_table').DataTable();
    } );
</script>
<script type="text/javascript">

   function showView(student_id) {     
     $.ajax({  
      url:"<?= base_url()?>student/fetchStudentView",  
      method:"post",  
      data:{id:student_id},  
      success:function(data){  
       
        var obj=JSON.parse(data);
   
          if(obj.parent_id)
          {
            var parent_name=obj.parent_name;
          }
          else
          {
            
            var parent_name='<form method="post" action="<?= base_url() ?>parents/add_parent"><button>add </button><input type="hidden" name="studentId" value='+student_id+' ></form>';
          

          }
        $('#student_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Student name</th><th>classes</th><th>Email</th><th>Mobile</th><th>Parent Name</th><th>Permanent Address</th><th>Corresponding Address</th></tr><tr><td>'+obj.name+'</td><td>'+obj.classes+'</td><td>'+obj.email+'</td><td>'+obj.mobile+'</td><td>'+parent_name+'</td><td>'+obj.permanent_address+'</td><td>'+obj.temporary_address+'</td><table>');  
        $('#dataModal').modal("show");  
      }  
    });  
   }



 
</script>