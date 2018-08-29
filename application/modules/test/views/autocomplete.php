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
                    <input style="height:70px" type="text" id="country" autocomplete="off" name="country" class="form-control dropdown-toggle" placeholder="Type to get an Ajax call of Countries" onkeypress="return enterEvent(event)"   data-toggle="dropdown">        
                    <!-- 
                     -->
                     <!-- <div id="tabled"></div> -->
                   <table class="dropdown-menu tableRow table  table-bordered table-responsive" id="tabled">
                     <!-- <table id="tabled" class="table  table-bordered table-responsive tableRow"></table> -->
                    <input type="text" name="sname" id="city">

                     <table id="tabled" class="table  table-bordered table-responsive"></table>
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
            // dataType: "json",
            success: function (data) {
              // console.log(data);
              var obj=JSON.parse(data);
              var i,tabledata;
              console.log(obj[0].student_name);
              for(i=0;i<obj.length;i++)
              {
                tabledata+='<tr><td>'+obj[i].student_name+'</td><td>'+obj[i].username+'</td></tr>'
              }
              $('#tabled').show();
              $('#tabled').html(tabledata);
            }
        });
    }
    }
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#country').val($(this).text());
    });


</script>
<script>
$(document).ready(function() {
    $('.tableRow').click(function() {
        $('#city').val( $(this).find('td:nth-child(1)').html() );
        // $('#stateCode').val( $(this).find('td:nth-child(2)').html() );
        // $('#postalCode').val( $(this).find('td:nth-child(3)').html() );
    });
 });

</script>