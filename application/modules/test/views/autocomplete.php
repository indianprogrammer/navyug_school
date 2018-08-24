<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
            <!-- Latest compiled and minified JavaScript -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/custom.js"></script> -->
    </head>
    <body style="background-color: #000000;">
        <div class="row">
        <center><h2 style="color: #fff;">AUTOCOMPLETE FORM FROM DATABASE USING CODEIGNITER AND AJAX</h2></center>
            <div class="col-md-4 col-md-offset-4" style="margin-top: 200px;">
                
                    <label class="control-lable" style="color: #fff;">Country Name</label>
                    <input style="height:70px" type="text" id="country" autocomplete="off" name="country" class="form-control" placeholder="Type to get an Ajax call of Countries" onkeypress="return enterEvent(event)">        
                    <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
                    <input type="text" name="sname" id="sname">
</div>
        </div>
    </body>
</html>
<script type="text/javascript">
   function enterEvent(e) {
    // $("#country").keyup(function () {
         var keyword = $('#country').val();
         if (e.keyCode == 13) {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>test/autocomplete",
            data: {
                keyword: $("#country").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#country').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#country').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length > 0)
                        $('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['student_name'] + ' &nbsp ' + value['username'] + '</a></li>');
                    console.log(value['student_name']);
                        $('#sname').val(value['student_name']);
                });
            }
        });
    }
    }
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#country').val($(this).text());
    });

</script>