
<style type="text/css">
#crud_table tr td
{
  background-color: white;
  /*border:1px solid;*/
}
</style>




<div class="box-body">
  <div class="row clearfix">
   <div class="col-md-5 col-sm-12">
    <label for="serch" class="control-label">Search</label>
    <div class="form-group">
      <input type="text" name="search" 
      class="form-control dropdown-toggle" id="search"  onkeypress="enterEvent(event)" autofocus  autocomplete="off" data-toggle="dropdown"/>

      <div id="table_dropdown" class=" dropdown-menu customtable" ></div> 
    </div>


  </div>


</div>

<div class="col-md-5 col-sm-12">
  <label for="uname" class="control-label"><span class="text-danger">*</span>Enter Username</label>
  <div class="form-group">
    <input type="text" name="uname" value="<?= $this->input->post('uname') ?>"
    class="form-control" id="uname"  autofocus  autocomplete="off" />
    <span class="text-danger"><?= form_error('uname') ?></span>
  </div>
</div>





<div class="col-md-5 col-sm-12">
  <label for="email" class="control-label"><span class="text-danger">*</span> Name</label>
  <div class="form-group">
    <input type="text" name="stuName" value="<?= $this->input->post('stuName') ?>"
    class="form-control" id="stuname" >
    <span class="text-danger"><?= form_error('stuName') ?></span>

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
  <label for="email" class="control-label">Email</label>
  <div class="form-group">
    <input type="text" name="email" value="<?= $this->input->post('email') ?>"
    class="form-control" id="email"/>
    <span class="text-danger"><?= form_error('email') ?></span>
  </div>
</div>

<div class="col-md-5 col-sm-12">

  <table class="table  table-responsive " id="crud_table">
   <tr>
    <th width="10%">Particular</th>
    <th width="5%">Amount</th>

    <th width="5%"></th>
  </tr>
  <tr>
    <!-- <td ><input type="text" class="item_name" placeholder="Enter name"></td> -->
    <td contenteditable="true" class="item_name" style="border-right:1px solid grey"></td>
    <td contenteditable="true" class="item_price"></td> 
    <!-- <td  ><input type="text" class="item_price" placeholder="Enter price"></td> -->
    <td></td>
  </tr>
</table>
<div align="left">
 <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
</div>
<div align="center">
 <button type="button" name="save" id="save" class="btn btn-info">Generate Invoice</button>
</div>
<br />
<div id="inserted_item_data"></div>

</div>


</div>






<script type="text/javascript">


  function enterEvent(e) {
    // $("#country").keyup(function () {

      var seachkeyword = $('#search').val();
       
         if (e.keyCode == 13) {
          $.ajax({
            type: "POST",
            url: "<?= base_url() ?>account/autosuggest",
            data: {
             keyword: seachkeyword
           },
           
           success: function (data) {

            var obj=JSON.parse(data);
          
            var i,tabledata;
            if(obj.length==0)
            {
              $('#table_dropdown').hide();
            }
            else
            {
              
              for(i=0;i<obj.length;i++)
              {
                tabledata+='<tr onclick="getRow('+obj[i].student_id+')"><td>'+obj[i].name+'</td><td>'+obj[i].username+'</td><td>'+obj[i].mobile+'</td></tr>'
              }
              $('#table_dropdown').show();
              $('#table_dropdown').html(tabledata);
              
            }

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
          console.log(data);
          var obj=JSON.parse(data);
          $('#stuname').val( obj.name );
          $('#uname').val( obj.username );
          $('#contact').val( obj.mobile );
          $('#search').val( " " );
          $('#table_dropdown').hide();
        }

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

      html_code += "<td contenteditable='true' class='item_price'></td>";
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
      console.log(item_name);
      var keyword = $('#uname').val();
      // console.log(keyword);
      $.ajax({
       url:"<?= base_url() ?>account/invoiceGenerate",
       method:"POST",
       data:{particular:item_name,price:item_price,keyword:keyword},
       success:function(data){
    
     $("td[contentEditable='true']").text("");
     for(var i=2; i<= count; i++)
     {
       $('tr#'+i+'').remove();
     }
     window.location = "<?= base_url() ?>account/invoice_list";

   }
 });
    });
   });
 </script>
 <script type="text/javascript">
   $(document).click(function(){
    $("#table_dropdown").hide();
  });
</script>