



<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard </h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                 <a href="<?= base_url() ?>subject/subject_list">  
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text ">Subject</span>
                            <span class="info-box-number subject">
                                <div class="ajax_loading">         
                                    <div class="col-md-3">
                                       
                                       
                                      <!-- Loading (remove the following to stop the loading)-->
                                      <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                    <!-- end loading -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- <small>%</small> -->
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url() ?>student/student_list">  
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-child"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text ">Student</span>
                    <span class="info-box-number student">
                        <div class="ajax_loading">         
                            <div class="col-md-3">
                               
                               
                              <!-- Loading (remove the following to stop the loading)-->
                              <div class="overlay">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>
                            <!-- end loading -->
                        </div>
                        <!-- /.card -->
                    </div></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
     <a href="<?= base_url() ?>classes/class_list">  
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Classes</span>
                <span class="info-box-number class">
                    <div class="ajax_loading">         
                        <div class="col-md-3">
                           
                           
                          <!-- Loading (remove the following to stop the loading)-->
                          <div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                        <!-- end loading -->
                    </div>
                    <!-- /.card -->
                </div>
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</a>
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
 <a href="<?= base_url() ?>employee/employee_list">  
    <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Employee</span>
            <span class="info-box-number employee">
                <div class="ajax_loading">         
                    <div class="col-md-3">
                       
                       
                      <!-- Loading (remove the following to stop the loading)-->
                      <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <!-- end loading -->
                </div>
                <!-- /.card -->
            </div>
        </span>
    </div>
    <!-- /.info-box-content -->
</div>
</a>
<!-- /.info-box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->


<!-- /.col -->
</div>
<!-- /.row -->
<!--/. container-fluid -->
</section>
<!-- /.content -->



<!-- /.content-wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- /.control-sidebar -->

<script type="text/javascript">
   $(document).ready(function(){
     $('.ajax_loading').show();
     $.ajax({url: "<?= base_url()?>admin/dashboardCounting",method:"get", success: function(result){
       $('.ajax_loading').hide();
       var obj=JSON.parse(result);

       $('.subject').html(obj.subject);
       $('.employee').html(obj.employee);
       $('.class').html(obj.class);
       $('.student').html(obj.students);
   }});
     
 });
</script>
