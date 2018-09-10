<div class="row">
          <div class="col-md-4">

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
            <div class="col-md-5"><table id="ledger" class="table table-border" style="background-color: white"><?php str_replace('null','-','null'); ?></table></div>
            
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