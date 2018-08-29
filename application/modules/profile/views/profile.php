 <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/dist/css/adminlte.min.css">
 <script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script>
 <?php $this->session->auth_id=$userdata->auth_id ?>
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
             <?php  if(isset($userdata->profile_image)) { ?>
              <img class="profile-user-img img-fluid img-circle"
              src="<?= base_url() ?>/uploads/<?= $userdata->profile_image ?>"
              alt="">
            <?php } 
            else  { ?>
              <img src="<?= base_url() ?>/uploads/model2.png" alt="">
            <?php  } ?>
          </div>

          <h3 class="profile-username text-center">
            <?php 
            if(isset($userdata->student_name)) {
              echo $userdata->student_name;
            }
            else
            {



            echo $userdata->name ;

                }
             ?>



         </h3>
         <!-- <p class="text-muted text-center">Software Engineer</p> -->




       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->

     <!-- About Me Box -->
     <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">About Me</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <?php if(isset($userdata->qualification))
         { ?>
        <strong><i class="fa fa-book mr-1"></i> Education</strong>
        <p class="text-muted">
         <?= $userdata->qualification

          ?>
          <!-- B.S. in Computer Science from the University of Tennessee at Knoxville -->
        </p>
        <hr>
        
<?php } else { }?>


        <strong><i class="fa fa-map-marker mr-1"></i>Email</strong>

        <p class="text-muted"><?php echo isset($userdata->email) ? $userdata->email : ' ' ; ?></p>

        <hr>
        
        <strong><i class="fa fa-map-marker mr-1"></i>Mobile</strong>

        <p class="text-muted"><?php echo isset($userdata->mobile) ? $userdata->mobile : ' ' ; ?></p>

        <hr>
        <strong><i class="fa fa-map-marker mr-1"></i>Temporary Location</strong>

        <p class="text-muted"><?php echo isset($userdata->temporary_address) ? $userdata->temporary_address : ' ' ; ?></p>

        <hr>
        <strong><i class="fa fa-map-marker mr-1"></i>Permanent Location</strong>

        <p class="text-muted"><?php echo isset($userdata->permanent_address) ? $userdata->permanent_address : ' ' ; ?></p>

        

               <!--  <strong><i class="fa fa-pencil mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Change Password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Username</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
<!-- action="<?= base_url() ?>profile/changePassword" -->
                      <form role="form"  id="form" onsubmit="return changePassword()">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Enter Password</label>
                            <input type="password" class="form-control" id="password"  placeholder="Enter current password" >
                          </div>
                          <div id="error"></div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
                          </div>
                          <div id="error"></div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password">
                          </div>
                          <div id="error"></div>
                          <!-- <input type="hidden" name="user_id" value="<?= $userdata->auth_id ?>"> -->
                          
                          
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>


                      
                    </div>
                    <!-- /.post -->

                    
                    
                    <!-- Post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                   <div class="post">
<!-- action="<?= base_url() ?>profile/changePassword" -->
                      <form >
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Enter Username</label>
                            <input type="text" class="form-control" id="username"  placeholder="Enter current Username" >
                          </div>
                          <div id="error_username" style="color:red"></div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">New Username</label>
                            <input type="text" class="form-control" id="newusername" name="newpassword" placeholder="New Username">
                          </div>
                          <div id="error"></div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Username</label>
                            <input type="ctext" class="form-control" id="cusername" placeholder="Confirm Username">
                          </div>
                          <div id="error_match" style="color:red"></div>
                          <!-- <input type="hidden" name="user_id" value="<?= $userdata->auth_id ?>"> -->
                          
                          
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                      </form>
                        <div id="success" style="color:green"></div>

                      
                    </div>
                     
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script src="<?= base_url() ;?>assets/admin/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- AdminLTE App -->

    <script src="<?= base_url() ;?>assets/admin/dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
      function changePassword()
      {
        var password = $('#password').val();
        var newpassword = $('#newpassword').val();
        var cpassword = $('#cpassword').val();
        // console.log(newpassword);
        // if(password==' ' || newpassword==null || cpassword==null )
        // {
        //   var msg="please fill all the field";
        //   $('#error').html(msg);
        // }
        if ($('#password').val()=="vivek")
        {
          var msg="please fill all the field";
          $('#error_username').html(msg);
          $('#error_username').show();
        
        }
      }

    
    </script>
    <script>
     
$(".submit").click(function(event) {
event.preventDefault();
var user_name = $("input#username").val();
var nuser_name = $("input#newusername").val();
var cuser_name = $("input#cusername").val();
var user_name_current= "<?= $this->session->username ?>";
if(user_name_current!=user_name)
{
  $('#error_username').html("please enter your current username");
}
else if(nuser_name!=cuser_name)
{
  $('#error_match').html("new username and confirm username is not matched");
}
//  $.ajax({
//     method: "POST",
//     url:" <?= base_url() ?>profile/checkUserName", 
//     data: {
//       username:user_name
//     },
//     success: function(responseObject) {

       
//       var obj=JSON.parse(responseObject);
      
//       if(obj==null)
//      {
//        $('#error_username').html("username not in database");
//      }

//     }
// });
else
{
$.ajax({
    method: "POST",
    url:" <?= base_url() ?>profile/changeUserName", 
    data: {
      username:nuser_name,auth_id:<?= $this->session->auth_id ?>
    },
    success: function(responseObject) {
      
       $('#success').html("username successfully changed");
       $('#error_username').hide();
       $('#error_match').hide();
       // <?php $this->session->username=
     }

    
      
    

    });
}
});


    </script>