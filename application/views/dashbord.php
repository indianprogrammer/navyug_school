



<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Dashboard </h1> -->
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
                 <a href="<?= base_url() ?>subject/subject_list" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
          <a href="<?= base_url() ?>student/student_list" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
     <a href="<?= base_url() ?>classes/class_list" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
 <a href="<?= base_url() ?>employee/employee_list" data-toggle="tooltip" data-placement="top" title="click here for more information">  
    <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Employee</span>
            <span class="info-box-number employee">
                <div class="ajax_loading">         
                    <div class="col-md-3">



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
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Total Income</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="ajax_loading">         
    <div class="col-md-3">



      <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
    <!-- end loading -->
</div>
<!-- /.card -->
</div>
<div class="card-body">
    <div class="chart">
      <canvas id="myChart" width="400" height="300" style="width:400px;height: 300px"></canvas>
     <span>Remaning <div id="amount_remaning"></div></span>
  </div>
</div>
<!-- /.card-body -->
</div>

<!-- <div class="col-md-6">
           
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                  Bar Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>

              </div>
            
            </div>
</div> -->
<!-- <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                   
                  </div>
                 
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fa fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                  
                  </div>
                 
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                                     </div>
              
                  
                </div>
              
              </div> -->
           
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
<script type="text/javascript">

    $(document).ready(function(){
      $('.ajax_loading').show();
      $.ajax({url: "<?= base_url()?>admin/totalAmount",method:"get", success: function(result){
         $('.ajax_loading').hide();
         var obj=JSON.parse(result);

         $loss=obj.debit-obj.credit;
         console.log($loss);
         $('#amount_remaning').html($loss);

    // console.log(debit);
    var canvas = document.getElementById('myChart');
    var data = {
        labels: ["DEBIT","CREDIT"],
        datasets: [
        {
            label: "Amount",
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            borderWidth: 1,
            // xAxisID:"10",
            hoverBackgroundColor: "rgba(255,99,132,0.4)",
            hoverBorderColor: "rgba(255,99,132,1)",
            data: [obj.debit,obj.credit],
            backgroundColor:[
            "rgba(255,99,132,0.2)","rgba(255,99,116,0.2)"
            ]
        }
        ]
    };
    var option = {
        animation: {
            duration:2000
        }
    }
    var myBarChart = Chart.Bar(canvas,{
        data:data,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }],
                  xAxes: [{
                  barPercentage:.3 }]
            }
        }

    });
}
});
  });



</script>
