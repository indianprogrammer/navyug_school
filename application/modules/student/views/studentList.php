<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Student List</h3>
        <div class="card-tools pull-right">
          <a href="<?= site_url('student/add'); ?>" class="btn btn-success ">Add</a>
        </div>
      </div>
      <div class="card-body">
      <div id="page">
        <div class="table-responsive">
        <table id="student_table" class="table  table-bordered table-hover">
          <thead>
            <tr>
              <th>S no</th>

              <th>Student Name</th>
              <th>Email</th>
              <!-- <th>classes</th> -->
              <th >Mobile</th>
              <th>Permanent Address</th>
              <th>Corresponding Address</th>
              <th>Profile Image</th>
              <th>Aadhar No.</th>
              <!-- <th>Balance</th> -->
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $count=1; ?>
            <?php foreach($student as $row){ ?>
              <tr>
                <td><?= $count++  ?></td>

                <td ><?= $row['name']; ?></td>
                <td ><?= $row['email']; ?></td>


<td><?= $row['mobile']; ?></td>

<td data-toggle="tooltip" data-placement="top" title="<?= $row['permanent_address']?>" ><?php echo substr($row['permanent_address'],0,10).'....' ?></td>
<td data-toggle="tooltip" data-placement="top" title="<?= $row['temporary_address']?>" ><?php echo substr($row['temporary_address'],0,10).'....' ?></td>




<td> <img src="<?=base_url()."uploads/".$row['profile_image']; ?>" alt="" class="zoom" style="width:50px;height:50px";></td>
<td><?= $row['aadhar']; ?></td>


<td>



  <div class="btn-group" >
   <!-- <a href="<?= base_url() ?>student/edit/<?= $row['id'] ?>"  class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> -->
    <button type="button" class="btn btn-danger" onclick="delFunction(<?php echo $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
    
    <a href="#" id="<?= $row['id']?>"  class="btn btn-info view_data" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>

    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
      <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="<?=base_url() ?>account/invoice_list?student_id=<?= $row['id'] ?>" >Invoice Report</a>
      <a class="dropdown-item" href="<?=base_url() ?>account/reciept_list?student_id=<?= $row['id'] ?>">Reciept Report</a>
      <a class="dropdown-item" href="<?=base_url() ?>account/getLedger?student_id=<?= $row['id'] ?>">Ledger Report</a>
      <a class="dropdown-item" href="<?=base_url() ?>account/add_invoice?student_id=<?= $row['id'] ?>">Generate Invoice</a>
      <a class="dropdown-item" href="<?=base_url() ?>account/add_reciept?student_id=<?= $row['id'] ?>">Generate Reciept</a>
    </div>
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
  <div id="dataModalinvoice" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" >

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Invoice Information</h4> -->
        </div>
        <div class="modal-body" id="invoice_information">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</tr>

<?php } ?>
</tbody>
</table>
</div>
<div class="invoice_information"></div>
</div>
</div>
</div>
</div>
</div>

</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootcard.js/4.4.0/bootcard.js"></script> -->
<script src="<?= base_url() ?>assets/admin/plugins/sweetalert/sweetalert.min.js"></script>
  
     <script type="text/javascript">
        function delFunction(id)
        {
     swal({
      title: "Are you sure?", 
      text: "Are you sure that you want to delete this id?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
      $.ajax({
        url: "<?= base_url() ?>student/soft_delete_student/"+id,
        type: "DELETE"
      })
      .done(function(data) {
        swal("Deleted!", "Your file was successfully deleted!", "success");
         // $('#'+id+'').fadeOut(300);
      })
      .error(function(data) {
        swal("Oops", "We couldn't connect to the server!", "error");
      });
    });
  }

  $(document).ready( function () {
    $('#student_table').DataTable();
  } );



  var url="<?php echo base_url();?>";
//   function delFunction(id)
//   {

//     bootcard.confirm("Are you sure to delete  record ?", function(result) {
//   if(result)
//     window.location.href = url+'student/remove/'+id
// });
// }
 

  $('.view_data').click(function()
  {  
    var student_id = $(this).attr("id");  
    console.log(student_id);
    viewStudent();
    function viewStudent() {     
      $.ajax({  
        url:"<?= base_url()?>student/fetchStudentView",  
        method:"post",  
        data:{id:student_id},  
        success:function(data){  
// console.log(data);
var obj=JSON.parse(data);

if(obj.parent_id)
{
  var parent_name=obj.parent_name;
}
else
{
// var session_student_id='<?= $this->session->student_id ?>';
var parent_name='<form method="post" action="<?= base_url() ?>parents/add_parent"><button>add </button><input type="hidden" name="studentId" value='+student_id+' ></form>';
// console.log(session_student_id);

}
$('#student_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Student name</th><th>classes</th><th>Email</th><th>Mobile</th><th>Parent Name</th><th>Permanent Address</th><th>Corresponding Address</th></tr><tr><td>'+obj.name+'</td><td>'+obj.classes+'</td><td>'+obj.email+'</td><td>'+obj.mobile+'</td><td>'+parent_name+'</td><td>'+obj.permanent_address+'</td><td>'+obj.temporary_address+'</td><table><button class="btn btn-info"><a href="<?=base_url()?>student/getFullDetails?student_id='+student_id+'">FULL DETAILS</button>');  
$('#dataModal').modal("show");  
}  
});  
    }



  });  



  function getBalence($id)
  {


    $.ajax({
      method: "POST",
      url:" <?= base_url() ?>account/checkBalance", 
      data: {
        keyword: $id
      },
      success: function( responseObject ) {
// console.log(responseObject);

// $('#invoice_information').html('<h4>Your Current Balance Is '+responseObject+'' );
$('#balance').html(responseObject);
// $('#dataModalinvoice').modal("show");  
}

});

  }


/* ##query search*/

  $(document).ready( function () {
    var url = window.location.search;
url = url.replace("?id=", ''); // remove the ?
// console.log(url);
$.ajax({  
  url:"<?= base_url()?>student/filterStudent",  
  method:"post",  
  data:{id:url},  
  success:function(data){  
    // console.log(data);
    var obj=JSON.parse(data);
    if(obj){
// $('#page').hide();
$('#page').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Student name</th><th>classes</th><th>Email</th><th>Mobile</th><th>Permanent Address</th><th>Corresponding Address</th></tr><tr><td>'+obj.name+'</td><td>'+obj.classes+'</td><td>'+obj.email+'</td><td>'+obj.mobile+'</td><td>'+obj.permanent_address+'</td><td>'+obj.temporary_address+'</td><table>'); 
}
}
});
});
</script>
<!-- <script type="text/javascript">
   $(document).ready( function () {
   $('button .dropdown').click(function(){
    $('.dropdown-toggle').addClass('show');
   });
 });
</script> -->