
<?= form_open('account/generate_reciept') ?>

<div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-12">
                        <label for="name" class="control-label"><span class="text-danger">*</span>Enter Student id</label>
                        <div class="form-group">
                            <input type="text" name="stuid" value="<?= $this->input->post('name') ?>"
                            class="form-control" id="stuid" onkeyup="getStudentDetails()" autofocus/>
                            <span class="text-danger"><?= form_error('name') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 form-group" id="showBalance" style="font-size: 25;">
                     </div>
                    <div class="col-md-5 col-sm-12 ">
                        <label for="method" class="control-label"><span class="text-danger">*</span>Select payment method </label>
                        <div class="form-group">
                            <select name="method" class="form-control">
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
                            class="form-control" id="pay" onkeyup="getStudentDetails()" autofocus/>
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
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Generate Reciept
                </button>
            </div>
            <?= form_close() ?>
            <script type="text/javascript">
                
            </script>
            <script>
             function  getStudentDetails(){
   $(document).ready(function() {
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
                           // console.log(responseObject);
                         
                            // console.log(obj);
                       
                         
                           // console.log(balance);
                     // var s=JSON.stringify(responseObject);
                      // var obj=JSON.parse(JSON.stringify(responseObject));
                     // console.log(obj.debit);

                        $("#showBalance").html("your balance = "+responseObject);
                       // for(var i=1;i<obj.length;i++)
                       // {

                       // }
                     

            }
        });
    });
}
</script>