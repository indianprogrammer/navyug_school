
<?= form_open('account/generate_invoice') ?>

<div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-12">
                        <label for="uname" class="control-label"><span class="text-danger">*</span>Enter Username</label>
                        <div class="form-group">
                            <input type="text" name="uname" value="<?= $this->input->post('uname') ?>"
                            class="form-control" id="uname" onkeyup="getStudentDetails()" autofocus  autocomplete="off" />
                            <span class="text-danger"><?= form_error('uname') ?></span>
                        </div>
                    </div>





                    <div class="col-md-5 col-sm-12">
                        <label for="email" class="control-label"><span class="text-danger">*</span>Student Name</label>
                        <div class="form-group">
                            <input type="text" name="stuName" value="<?= $this->input->post('stuName') ?>"
                            class="form-control" id="stuname"  onkeyup=getStudentDetails() />
                            <span class="text-danger"><?= form_error('stuName') ?></span>
                             <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
                        <div class="form-group">
                            <input type="text" name="email" value="<?= $this->input->post('email') ?>"
                            class="form-control" id="email"/>
                            <span class="text-danger"><?= form_error('email') ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="contact_pri" class="control-label"><span class="text-danger">*</span>Contact Number</label>
                        <div class="form-group">
                            <input type="text" name="contact" maxlength="13" value="<?= $this->input->post('contact') ?>"
                            class="form-control" id="contact" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_pri') ?></span>
                        </div>
                    </div>
                   <!--  <div class="col-md-5 col-sm-12">
                        <label for="contact_pri" class="control-label"><span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="text" name="contact" maxlength="13" value="<?= $this->input->post('contact_pri') ?>"
                            class="form-control" id="contact_pri" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_pri') ?></span>
                        </div>
                    </div> -->
                  
                    
                   
                  
                    <!--  <div class="col-md-5 col-sm-12">
                        <label for="class" class="control-label"><span class="text-danger">*</span>class assign</label>
                        <div class="form-group">
                            <input type="text" name="class" value="<?= $this->input->post('class') ?>"
                            class="form-control" id="class"/>
                            <span class="text-danger"><?= form_error('class') ?></span>
                        </div>
                    </div> -->
                     <tr>
                        <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="10%">Particular</th>
      <th width="10%">amount</th>
     
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="item_name" placeholder="Enter name"></td>
      
      <td contenteditable="true" class="item_price"></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
           
       
                </div>
                    <div class="box-footer">
                <button type="submit" class="btn btn-success" name="save" id="save">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <?= form_close() ?>

          
  

<script type="text/javascript">
  function  getStudentDetails(){
   $(document).ready(function() {
     // var min_length = 3;
        var keyword = $('#uname').val();
         console.log(keyword);
    
        $.ajax({
            method: "POST",
            url:" <?= base_url() ?>account/fetchRecordStudent", 
            data: {
                keyword: keyword
            },
            success: function( responseObject ) {
                // alert('success');
                 // console.log(responseObject);
                var data=JSON.parse(responseObject);
                //  var d=data[].email;
                 // console.log(data);
                $('#email').val(data.email);
                $('#stuname').val(data.student_name);
                // $('#stuname').val(data.student_name);
                 $('#contact').val(data.mobile);
               if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#stuname').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#stuname').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['name'] + '</a></li>');
                });
            }
        });
    
    });

    $('ul.txtcountry').on('click', 'li a', function () {
        $('#stuname').val($(this).text());
    });
        
            }
          
  
</script>

<script>
$(document).ready(function(){
 var count = 1;

 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='item_name'></td>";
   
   html_code += "<td contenteditable='true' class='item_price' ></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var item_name = [];
 
  var item_price = [];
  $('.item_name').each(function(){
   item_name.push($(this).text());
  });
 
  $('.item_price').each(function(){
   item_price.push($(this).text());
  });
  var keyword = $('#uname').val();
  $.ajax({
   url:"<?= base_url() ?>account/addMultiple",
   method:"POST",
   data:{item_name:item_name,item_price:item_price,keyword:keyword},
   success:function(data){
    // alert(data);
     // console.log(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    window.location = "<?= base_url() ?>account/invoice_list";
    // fetch_item_data();
   }
  });
 });
});
 </script>
