<style type="text/css">
  .TFtable{
    width:100%; 
    border-collapse:collapse; 
    position: relative;
    z-index:1000;
        
  }
  .TFtable td{ 
    padding:17px; border:#e5e5e5 1px solid;
  }
  /* provide some minimal visual accomodation for IE8 and below */
  .TFtable tr{
    background: #f8f8f8;
    

  }
  /*  Define the background color for all the ODD background rows  */
  .TFtable tr:nth-child(odd){ 
    background: #f8f8f8;
    
  }
  /*  Define the background color for all the EVEN background rows  */
  .TFtable tr:nth-child(even){
    background: #ffffff;
    

  }

    .TFtable1{
        width:100%; 
        border-collapse:collapse; 
        position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
    }
    .TFtable1 td{ 
        padding:7px; border:#e5e5e5 1px solid;
    }
    /* provide some minimal visual accomodation for IE8 and below */
    .TFtable1 tr{
        background: #f8f8f8;
        

    }
    /*  Define the background color for all the ODD background rows  */
    .TFtable1 tr:nth-child(odd){ 
        background: #f8f8f8;
        
    }
    /*  Define the background color for all the EVEN background rows  */
    .TFtable1 tr:nth-child(even){
        background: #ffffff;
        

    }

</style>
<form id="formEnquiry" class="horizontal-form" method="post">

<h3 align="center"> ENQUIRY FORM </h3>
<div class="row">
   <div class="col-md-7 col-lg-10">
        <label for="search" class="col-md-4 control-label"> Search</label>
        <div class="form-group">
            <input type="text" name="search" value="<?=$this->input->post('search'); ?>" onkeypress="enterEvent()" class="form-control" id="search"  autofocus   autocomplete="off"/>
            <span class="text-danger"><?=form_error('search');?></span>
        </div>
     <table id="table_dropdown" class="Tftable" ></table> 
    </div>
    <div class="col-md-5 col-lg-4">
        <label for="username" class="col-md-4 control-label"><span class="text-danger">*</span> User Name</label>
        <div class="form-group">
            <input type="text" name="username" value="<?=$this->input->post('username'); ?>" class="form-control" id="username"  autofocus />
            <span class="text-danger"><?=form_error('username');?></span>
        </div>
    </div>
    <div class="col-md-5 col-lg-4">
        <label for="trainer_Name" class="col-md-4 control-label"><span class="text-danger">*</span> Name</label>
        <div class="form-group">
         <input type="text" name="name" value="<?=$this->input->post('name'); ?>" class="form-control" id="name"  autofocus />
         <span class="text-danger"><?=form_error('name');?></span>
     </div>
 </div>


 <div class="col-md-5 col-lg-4">
    <div class="form-group">
        <label for="mobile" class="col-md-4 control-label"><span class="text-danger">*</span>Mobile</label>
        <input type="text" name="mobile" maxlength="13" value="<?=$this->input->post('mobile'); ?>" class="form-control" id="mobile" />
        <span class="text-danger"><?=form_error('mobile');?></span>
    </div>
</div>

<div class="col-md-5 col-lg-4">
    <label for="email" class="col-md-4 control-label">Email</label>
    <div class="form-group">
     <input type="text" name="email" value="<?=$this->input->post('email'); ?>" class="form-control" id="email" />
     <span class="text-danger"><?=form_error('email');?></span>
 </div>
</div>
<div class="col-md-5 col-lg-4">
    <label for="purpose" class="col-md-4 control-label"><span class="text-danger">*</span>Purpose</label>
    <div class="form-group">

        <select name="type" id="type" class="form-control" >
            <option value="">---select---</option>
            <?php   foreach($type as $row){ ?>
                <option value="<?= $row->id ?>"><?= $row->name ?></option>
            <?php } ?>
        </select>
        <span class="text-danger"><?= form_error('type');?></span>

        
    </div>
</div>

               <!--  <div class="col-md-5 col-lg-4">
                <label for="remarks" class="col-md-4 control-label">Remarks</label>
		      <div class="form-group">
					<input type="text" name="remarks" value="<?=$this->input->post('remarks'); ?>" class="form-control" id="remarks" />
					<span class="text-danger"><?=form_error('remarks');?></span>
				</div>
			</div>   -->    
      <!--   <div class="col-md-5 col-lg-4"> 
        <label for="address" class="col-md-4 control-label">Address</label>
    <div class="form-group">
            <textarea name="address" class="form-control" id="address"><?=$this->input->post('address'); ?></textarea>
            <span class="text-danger"><?=form_error('address');?></span>
        </div>
    </div> -->
    <div class="col-md-5 col-lg-4">
        <label for="assign" class="col-md-4 control-label">Assign to</label>
        <div class="form-group">

            <select name="assign" id="assign" class="form-control" >
                <option value="">---select---</option>
                <option value="0">No one</option>
                <?php   foreach($assign as $row){ ?>
                    <option value="<?= $row->id ?>" > <?= $row->type ?></option>
                <?php } ?>
            </select>
            <span class="text-danger"><?= form_error('type');?></span>


        </div>
    </div>     
    <div class="col-md-5 col-lg-4">
        <label for="purpose" class="col-md-4 control-label"><span class="text-danger">*</span>Attend Type</label>
        <div class="form-group">

            <select name="attend_type" id="type" class="form-control" >
                <option value="">---select---</option>

                    <option value="sms">Sms</option>
                    <option value="call">Call</option>
                    <option value="email">Email</option>
                    <option value="office">Office</option>
               
            </select>
            <span class="text-danger"><?= form_error('attend_type');?></span>


        </div>
    </div>               
    <div class="col-md-5 col-lg-4">
        <label for="comments" class="col-md-4 control-label"><span class="text-danger">*</span>comments</label>
        <div class="form-group">
            <textarea name="comments" class="form-control" id="comments"><?=$this->input->post('comments'); ?></textarea>
            <span class="text-danger"><?=form_error('comments');?></span>
        </div>
    </div>
           <!--  <div class="form-group" >
                   <label for="latlong" class="control-label col-md-4 col-sm-12"><span class="text-danger">*</span>Location</label>
                         <div class="col-md-5 col-lg-4" id="showlat">
                            <input type="text" name="latlong" class="form-control" id="latlong" onclick="latMap();"  />
                            <span class="text-danger"><?= form_error('latlong') ?></span>
                         <div class="col-md-2" id="dvMap" style="height: 100px;" > </div>
                        </div>
                    </div> -->

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn btn-success"  onclick="submitForm('<?= base_url() ?>enquiry/add')">Add New</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn btn-success"  onclick="submitForm('<?= base_url() ?>enquiry/existing_add')">Update Existing</button>
                    </div>
                </div>
               </form>
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
                <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->

             <script type="text/javascript">
              function submitForm(action) {
                var form = document.getElementById('formEnquiry');
                form.action = action;
                form.submit();
              }
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#mobile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [45, 5, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
             (e.keyCode == 55 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
             (e.keyCode == 57 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
             (e.keyCode == 55 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 45 || e.keyCode > 57)) && (e.keyCode < 95 || e.keyCode > 107)  ) {
            e.preventDefault();
        }
    });
                });
                 function enterEvent() {
    // $("#country").keyup(function () {
      var seachkeyword = $('#search').val();
         // console.log(keyword);
         // var keyword = $('#search').val();
         // console.log(keyword);
         // if (e.keyCode == 13) {
          $.ajax({
            type: "POST",
            url: "<?= base_url() ?>enquiry/autosuggest",
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
                tabledata+='<tr onclick="getRow('+obj[i].enquiry_id+')"><td>'+obj[i].customer_name+'</td><td>'+obj[i].username+'</td><td>'+obj[i].mobile+'</td><td>'+obj[i].comments+'</td></tr>'
              }
              $('#table_dropdown').show();
              $('#table_dropdown').html(tabledata);
              


             }
          });
        }
              function getRow($id) {
       $.ajax({
        type: "POST",
        url: "<?= base_url() ?>enquiry/autofill",
        data: {
          id: $id
        },

        success: function (data) {
          var obj=JSON.parse(data);
         
        $('#name').val( obj.customer_name );
          $('#username').val( obj.username );
          $('#mobile').val( obj.mobile );
          $('#email').val( obj.email );
          $('#search').val( " " );
          $('#table_dropdown').hide();
        }

      });
     }
            </script>