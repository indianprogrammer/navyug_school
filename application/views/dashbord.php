



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
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text ">Subject</span>
                            <span class="info-box-number subject">
                
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
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text ">Student</span>
                            <span class="info-box-number student"></span>
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
                            <span class="info-box-number class"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </a>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                     <a href="<?= base_url() ?>employee/employee_list">  
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Employee</span>
                            <span class="info-box-number employee"></span>
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
</div>
<!-- /.content-wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- /.control-sidebar -->

<script type="text/javascript">
   $(document).ready(function(){
    
        $.ajax({url: "<?= base_url()?>school/dashboardCounting", success: function(result){
            // $("#div1").html(result);
    // console.log(result);
    var obj=JSON.parse(result);
    // console.log(obj);
    $('.subject').html(obj.subject);
    $('.employee').html(obj.employee);
    $('.class').html(obj.class);
    $('.student').html(obj.students);
        }});
   
});
</script>
