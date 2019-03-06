

<div class="card">
    <div class="card-header">
        <h3 class="card-title">ADD RECIEPT</h3>


      </div>
<div class="card-body">
  <div class="row clearfix">
    <div class="col-md-5 col-sm-12">
      <label for="serch" class="control-label">Search</label>
      <div class="form-group">
        <input type="text" name="search" 
        class="form-control dropdown-toggle" id="search"  onkeypress="enterEvent(event)" autofocus  autocomplete="off"  data-toggle="dropdown" placeholder="search result by press enter"  />

      </div>


      <div id="table_dropdown" class="dropdown-menu customtable"></div> 
    </div>
    <div class="col-md-4 col-sm-12" id="balance" style="font-size: 22px;">
    </div>     










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
          <span class="text-danger message"></span>

        </select>
      </div>
    </div>
    <br>
    <div class="col-md-5 col-sm-12">
      <label for="pay" class="control-label"><span class="text-danger">*</span>Pay</label>
      <div class="form-group">
        <input type="text" name="pay" value="<?= $this->input->post('pay') ?>"
        class="form-control" id="pay"  />
        <span class="text-danger"><?= form_error('pay') ?></span>
      </div>
      <!-- <button class="btn">same</button>   -->
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
  <div class="card-footer" >
    <button type="button" class="btn btn-success" onclick="submitReciept()">
      Generate Reciept
    </button>
     <div class="ajax_loading" style="margin-left:50px;z-index: 200;"  >         


        <div class="overlay"  style="z-index: 200">
          <i class="fa fa-refresh fa-spin"></i>
        </div>

      </div>
  </div>
  
<?php if($this->input->get('student_id'))
{
   $id=$this->input->get('student_id');
 ?>

  <body onload="getRow(<?= $id ?>);" >
<?php  }

 ?>
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
  var searchkeyword = $('#search').val();
// console.log(keyword);
// var keyword = $('#search').val();
// console.log(keyword);
if (e.keyCode == 13) {
  $.ajax({
    type: "POST",
    url: "<?= base_url() ?>account/autosuggest",
    data: {
      keyword: searchkeyword
    },

    success: function (data) {
// console.log()

var obj=JSON.parse(data);
var i,tabledata;
if(obj.length==0)
{
  $('#table_dropdown').hide();
}
else
{
// console.log(obj[0].student_name);
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
      var obj=JSON.parse(data);
      // console.log(obj);
      $('#stuid').val( obj.autofill.username );
       $('#balance').html("Balance : "+obj.balance.balance);

      $('#search').val("");
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
  

   if(method && username && pay)
        {
          bootcard.confirm("click ok to generate invoice  ?", function(result) {
        if(result)
        {
  $.ajax({
    url:"<?= base_url() ?>account/generate_reciept",
    method:"POST",
    data:{method:method,payer_name:payer_name,payer_mobile:payer_mobile,username:username,pay:pay},
// console.log(data);
 beforeSend: function(){
// Show image container
$(".ajax_loading").show();
},
success:function(data){
// alert(data);
// console.log(data);
$(".ajax_loading").show();
window.location = "<?= base_url() ?>account/reciept_list";

},
complete:function(data){
// Hide image container
$(".ajax_loading").hide();
}

});
}
});
}
}


</script>
<script type="text/javascript">
  $(document).click(function(){
    $("#table_dropdown").hide();
    
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
  
    $(".ajax_loading").hide();
  });
</script>