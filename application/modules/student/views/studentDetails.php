<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">

      <div class="card-body box-profile">
        <div class="text-center">
          <img class=" img-fluid img-circle"
          src="<?= base_url()?>uploads/<?= $student_info['profile_image'] ?>"
          style="height:50px;width:50px;" alt="">
        </div>

        <h3 class="profile-username text-center"><?= $student_info['name'] ?></h3>

        <!-- <p class="text-muted text-center">Software Engineer</p> -->

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Email</b> <a class="float-right"><?= $student_info['email'] ?></a>
          </li>
          <li class="list-group-item">
            <b>Mobile</b> <a class="float-right"><?= $student_info['mobile'] ?></a>
          </li>
           <li class="list-group-item">
            <b>Blood group</b> <a class="float-right"><?= $student_info['blood_group'] ?></a>
          </li>
           <li class="list-group-item">
            <b>Dob</b> <a class="float-right"><?= $student_info['dob'] ?></a>
          </li>
          <li class="list-group-item">
            <b>Aadhar no</b> <a class="float-right"><?= $student_info['aadhar'] ?></a>
          </li>
          <li class="list-group-item">
            <b>Username</b> <a class="float-right"><?= $student_info['username'] ?></a>
          </li>
          <li class="list-group-item">
            <b>Password</b> <a class="float-right"><?= $student_info['clear_text'] ?></a>
          </li>

          <li class="list-group-item">
            <b>classes Join</b> <a class="float-right">
              <?php  $studentClasses = explode(',', $student_info['classes']);

              foreach ($studentClasses as $studentClass) {
               $subject=($classes[$studentClass]['name']. "&nbsp&nbsp&nbsp");
               echo ($subject);
             }  ?> 

           </a>
         </li>

         <li class="list-group-item">
          <b>Permanent Location</b> <a class="float-right"><?= $student_info['permanent_address'] ?></a>
        </li>
        <li class="list-group-item">
          <b>Temporary Location</b> <a class="float-right"><?= $student_info['temporary_address'] ?></a>
        </li>
        <li class="list-group-item">
          <b>Joining Date</b> <a class="float-right"><?= $student_info['date'] ?></a>
        </li>
      </ul>

      <a href="javascript:void(0)"  onclick="getLedger()" class="btn btn-primary btn-block"><b>Ledger Report</b></a>
    </div>
    <!-- /.card-body -->
  </div>
</div>
<!-- /.card -->
<div class="col-md-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-info card-outline">
        <div class="card-header">
          <h3 class="card-title">Batch and Cources</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
         <table class="table">
          <thead>
            <tr>
              <th>Course name</th>
              <th>Batch  name</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach($student_batch as $row)
            { ?>

              <tr>
                <td><?= $row['course_name'] ?></td>
                <td><?= $row['batch_name'] ?></td>
              </tr>


            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <div class="col-md-12">
    <div class="card card-info card-outline">
      <div class="card-header">
        <h3 class="card-title">Book Issue</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body" style="display: block;">
       <table class="table">
        <thead>
          <tr>
            <th>title</th>
            <th>issue date</th>
            <th>due date</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach($current_issue_book as $row)
          { ?>

            <tr  data-toggle="tooltip" title="Author-  <?=$row['author'] ?>,  Edition - <?= $row['edition'] ?>">
              <td><?= $row['title'] ?></td>
              <td><?= $row['issue_date'] ?></td>
              <td><?= $row['due_date'] ?></td>
            </tr>


          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

</div>
</div>
</div>
<div class="col-md-5">

 <div class="card card-info card-outline">
  <div class="card-header">
    <h3 class="card-title">Ledger</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body" style="display: block;">
    <table id="ledger" class="table table-borderd" style="background-color: white"><?php str_replace('null','-','null'); ?></table>
  </div>
</div>
</div>

</div>

<script type="text/javascript">
  function getLedger()
  {
    var id="<?= $student_info['id'] ?>";
    console.log(id);
    $.ajax({  
      url:"<?= base_url()?>account/ledgerReportJson",  
      method:"post",  
      data:{id:id},  
      success:function(data){
// console.log(data);
var obj=JSON.parse(data);
console.log(obj);
// $('#page').hide();
var tabledata,i,count=1;
for(i=0;i<obj.length;i++)
{
                  // if(obj[i].invoice_id==null )
                  // {
                  //   obj[i].invoice_id="-";
                  tabledata+='<tr><td>'+count+'</td><td>'+obj[i].invoice_id+'</td><td>'+obj[i].reciept_id+'</td><td>'+obj[i].debit+'</td><td>'+obj[i].credit+'</td><td>'+obj[i].date+'</td></tr>';
                  count ++;
                }
                
                $('#ledger').html('<tr><th>S. no.</th><th>Invoice Number</th><th>Reciept Number</th><th>Debit</th><th>Credit</th><th>Date</th>'+tabledata+'');
              }




            });

  }





</script>