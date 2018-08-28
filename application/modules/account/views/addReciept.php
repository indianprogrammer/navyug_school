
<?= form_open('account/generate_reciept') ?>

<div class="box-body">
                <div class="row clearfix">
                       <div class="col-md-10 col-sm-12">
                            <label for="serch" class="control-label">Search</label>
                            <div class="form-group">
                              <input type="text" name="search" 
                              class="form-control" id="search"  onkeypress="enterEvent(event)" autofocus  autocomplete="off" />

                            </div>


                          </div>
                          <table id="table_dropdown" class="table table-bordered table-responsive table-hover tableRow" ></table>     










                    <div class="col-md-5 col-sm-12">
                        <label for="name" class="control-label"><span class="text-danger">*</span>Enter Username</label>
                        <div class="form-group">
                            <input type="text" name="stuid" value="<?= $this->input->post('name') ?>"
                            class="form-control" id="stuid" onkeyup="getStudentDetails()" />
                            <span class="text-danger"><?= form_error('name') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 form-group" id="showBalance" style="font-size: 25;">
                     </div>
                    <div class="col-md-5 col-sm-12 ">
                        <label for="method" class="control-label"><span class="text-danger">*</span>Select payment method </label>
                        <div class="form-group">
                            <select name="method" class="form-control" id="method">
                            <option value="">select</option>
                            <option value="cash">cash</option>
                            <option value="online">online</option>
                            <option value="swipe">swipe</option>
                            <span class="text-danger"><?= form_error('method') ?></span>

                        </select>
                    </div>
                    </div>
                     <br>
                     <div class="col-md-5 col-sm-12">
                        <label for="pay" class="control-label"><span class="text-danger">*</span>pay</label>
                        <div class="form-group">
                            <input type="text" name="pay" value="<?= $this->input->post('pay') ?>"
                            class="form-control" id="pay"  />
                            <span class="text-danger"><?= form_error('pay') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="contact_sec" class="control-label">Payer Name</label>
                        <div class="form-group">
                            <input type="text" name="contact_sec"  maxlength="13" value="<?= $this->input->post('contact_sec') ?>"
                            class="form-control" id="payer_name" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_sec') ?></span>
                        </div>
                    </div>
                     <div class="col-md-5 col-sm-12">
                        <label for="contact_sec" class="control-label">Payer Mobile</label>
                        <div class="form-group">
                            <input type="text" name="contact_sec"  maxlength="13" value="<?= $this->input->post('contact_sec') ?>"
                            class="form-control" id="payer_mobile" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_sec') ?></span>
                        </div>
                    </div>
                  
                    
                   
                   
                   </div>
                    <div class="box-footer">
                <button type="button" class="btn btn-success" onclick="submitReciept()">
                    <i class="fa fa-check"></i> Generate Reciept
                </button>
            </div>
            <?= form_close() ?>
           
            <script>
             function  getStudentDetails(){
   
     // var min_length = 3;
        var keyword = $('#stuid').val();
         // console.log(keyword);
    
        $.ajax({
            method: "POST",
            url:" <?= base_url() ?>account/checkBalance", 
            data: {
                keyword: keyword
            },
            success: function( responseObject ) {
                          
                        $("#showBalance").html("your balance = "+responseObject);
                     

            }
        });
    
}
</script>
<script type="text/javascript">
function enterEvent(e) {
    // $("#country").keyup(function () {
      var seachkeyword = $('#search').val();
         // console.log(keyword);
         // var keyword = $('#search').val();
         // console.log(keyword);
         if (e.keyCode == 13) {
          $.ajax({
            type: "POST",
            url: "<?= base_url() ?>account/autosuggest",
            data: {
             keyword: seachkeyword
           },
           
           success: function (data) {
              // console.log()

              var obj=JSON.parse(data);
              var i,tabledata;
              // console.log(obj[0].student_name);
              for(i=0;i<obj.length;i++)
              {
                tabledata+='<tr onclick="getRow('+obj[i].student_id+')"><td>'+obj[i].student_name+'</td><td>'+obj[i].username+'</td><td>'+obj[i].mobile+'</td></tr>'
              }
              $('#table_dropdown').show();
              $('#table_dropdown').html(tabledata);
              


            }
          });
        }
      }         
      function getRow($id) {
       $.ajax({
        type: "POST",
        url: "<?= base_url() ?>account/autofill",
        data: {
          id: $id
        },

        success: function (data) {
          var obj=JSON.parse(data);
         
          $('#stuid').val( obj.username );
        
          $('#search').val( " " );
          $('#table_dropdown').hide();
        }

      });
     }

function submitReciept()
{
     var username = $('#stuid').val();
     var method = $('#method').val();
     var payer_name = $('#payer_name').val();
     var payer_mobile = $('#payer_mobile').val();
     var pay = $('#pay').val();
      $.ajax({
       url:"<?= base_url() ?>account/generate_reciept",
       method:"POST",
       data:{method:method,payer_name:payer_name,payer_mobile:payer_mobile,username:username,pay:pay},
       // console.log(data);
       success:function(data){
    // alert(data);
     // console.log(data);
    
     window.location = "<?= base_url() ?>account/reciept_list";

   }
 });
}


   </script>
