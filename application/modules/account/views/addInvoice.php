
<?= form_open('account/generate_invoice') ?>

<div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-12">
                        <label for="uname" class="control-label"><span class="text-danger">*</span>Enter Username</label>
                        <div class="form-group">
                            <input type="text" name="uname" value="<?= $this->input->post('uname') ?>"
                            class="form-control" id="uname" onkeyup="getStudentDetails()" />
                            <span class="text-danger"><?= form_error('uname') ?></span>
                        </div>
                    </div>





                    <div class="col-md-5 col-sm-12">
                        <label for="email" class="control-label"><span class="text-danger">*</span>Student Name</label>
                        <div class="form-group">
                            <input type="text" name="stuName" value="<?= $this->input->post('stuName') ?>"
                            class="form-control" id="stuname" autofocus onkeyup=getStudentDetails() />
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
                    <div class="col-md-5 col-sm-12">
                        <label for="contact_pri" class="control-label"><span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="text" name="contact" maxlength="13" value="<?= $this->input->post('contact_pri') ?>"
                            class="form-control" id="contact_pri" data-toggle="tooltip" data-placement="top" title="+919393939999 or 919393939999 "/>
                            <span class="text-danger"><?= form_error('contact_pri') ?></span>
                        </div>
                    </div>
                  
                    
                   
                  
                     <div class="col-md-5 col-sm-12">
                        <label for="class" class="control-label"><span class="text-danger">*</span>class assign</label>
                        <div class="form-group">
                            <input type="text" name="class" value="<?= $this->input->post('class') ?>"
                            class="form-control" id="class"/>
                            <span class="text-danger"><?= form_error('class') ?></span>
                        </div>
                    </div>
                     <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn" id="addrow" value="Add Row" onclick="addRow()" />
            </td>
        </tr>
                </div>
                    <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <?= form_close() ?>
<script type="text/javascript">
  function  getStudentDetailsss(){
   $(document).ready(function() {
     var min_length = 3;
        var keyword = $('#stuname').val();
        // console.log(keyword);
     if (keyword.length >= min_length) {
        $.ajax({
            method: "GET",
            url:" <?= base_url() ?>account/fetchRecordStudent", 
            data: {
                keyword: keyword
            },
            success: function( responseObject ) {
                // alert('success');
                 // console.log(responseObject.email);
                var data=JSON.parse(responseObject);
                //  var d=data[].email;
                console.log(data);
                $('#email').val(data.email);
                $('#name').val(data[0].username);
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
    }
    });

    $('ul.txtcountry').on('click', 'li a', function () {
        $('#stuname').val($(this).text());
    });
        
            }
          
  
</script>
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
                 console.log(data);
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
<script type="text/javascript">
    
    function addRow()
{
    $(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

       
        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
}
</script>