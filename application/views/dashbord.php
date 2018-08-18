



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
 
    <!-- <div class="container-fluid"> -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
         <a href="<?= base_url() ?>subject" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
        <a href="<?= base_url() ?>student" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
         <a href="<?= base_url() ?>classes" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
       <a href="<?= base_url() ?>employee" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
  </div>
    <!-- /.col -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Monthly Recap Report</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" onclick="" class="dropdown-item">Previous One Month</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
              <button type="button" class="btn btn-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
             <!-- <div class="row">  -->
              <!-- <div class="col-sm-12 col-12"> -->
               <!--  <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p>
 -->
                <div class="chart res">
                  <!-- Sales Chart Canvas -->
                  <!--  <canvas id="salesChart" height="180" style="height: 180px;"></canvas> -->
                  <canvas id="line-charts" height="130" style="height:200px;" ></canvas>
                </div>
                <!-- /.chart-responsive -->
              <!-- </div> -->
              <!-- /.col -->

              <!-- /.col -->
             <!-- </div>  -->
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 col-4">
                <div class="description-block border-right">
                  <!-- <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 17%</span> -->
                  <h5 class="description-header">30,210.43</h5>
                  <span class="description-text">TOTAL REVENUE</span>
                </div>
                
              </div>
              
              <div class="col-sm-4 col-4">
                <div class="description-block border-right">
                  <!-- <span class="description-percentage text-warning"><i class="fa fa-caret-left"></i> 0%</span> -->
                  <h5 class="description-header">10,390.90</h5>
                  <span class="description-text">TOTAL COST</span>
                </div>
                
              </div>

              <div class="col-sm-4 col-4">
                <div class="description-block border-right">
                  <!-- <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 20%</span> -->
                  <h5 class="description-header">10,813.53</h5>
                  <span class="description-text">TOTAL PROFIT</span>
                </div>
                
              </div>

              <!-- <div class="col-sm-3 col-6">
                <div class="description-block">
                  <span class="description-percentage text-danger"><i class="fa fa-caret-down"></i> 18%</span>
                  <h5 class="description-header">1200</h5>
                  <span class="description-text">GOAL COMPLETIONS</span>
                </div>
                
              </div> -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header">
            <h3 class="card-title">Invoice information per month </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
               <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="java:void(0)" onclick="invoiceByMonth()" class="dropdown-item">Previous One Month</a>
                      <!-- <a href="#" class="dropdown-item">Another action</a> -->
                      <!-- <a href="#" class="dropdown-item">Something else here</a> -->
                      <!-- <a class="dropdown-divider"></a> -->
                      <!-- <a href="#" class="dropdown-item">Separated link</a> -->
                    </div>
                  </div>
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
              <canvas id="densityChart"  style="height: 250px"></canvas>
              <!-- <span>Remaning <div id="amount_remaning"></div></span> -->
            </div>
          </div>

          <!-- /.card-body -->
        </div>
      </div>
       <div class="col-md-6">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Student Addmission per month</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
       <!--  <div class="ajax_loading">         
          <div class="col-md-3">



            <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
            
          </div>
         
        </div> -->
        <div class="card-body">
          <div class="chart">
            <canvas id="myChartStudent"   style="height: 250px"></canvas>
            <!-- <span>Remaning <div id="amount_remaning"></div></span> -->
          </div>
        </div>

        <!-- /.card-body -->
      </div>
    </div>
    </div>


  <!-- </div> -->
  <!-- /.row -->
  <!--/. container-fluid -->

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
<!-- <script type="text/javascript">

  $(document).ready(function(){
    $('.ajax_loading').show();
    $.ajax({url: "<?= base_url()?>admin/totalAmount",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);

     $loss=obj.debit-obj.credit;
     console.log($loss);
     $('#amount_remaning').html($loss);


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



</script> -->
<script type="text/javascript">

  $(document).ready(function(){

    $('.ajax_loading').show();
    studentAdd();
    function studentAdd(){
    $.ajax({url: "<?= base_url()?>admin/studentAdd",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);


     // console.log(obj);
     var count=[];
     var month =[];
     for (var i in obj)
     {
      count.push(obj[i].count);
      month.push(obj[i].month);

    }
    // console.log(count);
        Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 16;
    var canvas = document.getElementById('myChartStudent');
    var data = {
      labels: month,
      datasets: [
      {
        label: "Student Admission in month",
        backgroundColor: "#3c8dbc",
        // borderColor: "rgba(255,99,132,1)",
        borderWidth: 1,
            // xAxisID:"10",
            hoverBackgroundColor: "black",
            hoverBorderColor: "black",
            data: count,
            // backgroundColor:[
            // "rgba(255,99,132,0.2)","rgba(255,99,116,0.2)"
            // ]
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
                barPercentage:.7 }]
              }
            }

          });
      }
    });
  }
  });



</script>

<!-- /* for invoice */ -->
<script type="text/javascript">
  $(document).ready(function(){
    invoiceReport();
    function invoiceReport(){
    $.ajax({url: "<?= base_url()?>admin/invoiceReport",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);


     // console.log(obj);
     var count=[];
     var month =[];
     var total =[];
     for (var i in obj)
     {
      count.push(obj[i].count);
      month.push(obj[i].month);
      total.push(obj[i].total);

    }
    var densityCanvas = document.getElementById("densityChart");


    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var densityData = {
      label: 'Amount in month',
      data: total,
      backgroundColor: 'rgba(0, 99, 132, 0.6)',
      borderWidth: 0,
      yAxisID: "y-axis-density"
    };

    var gravityData = {
      label: 'No of invoice generated',
      data:count,
      backgroundColor: 'rgba(99, 132, 0, 0.6)',
      borderWidth: 0,
      yAxisID: "y-axis-gravity"
    };

    var planetData = {
      labels: month,
      datasets: [densityData, gravityData]
    };

    var chartOptions = {
      scales: {
        xAxes: [{
          barPercentage: 1,
          categoryPercentage: 0.6
        }],
        yAxes: [{
          id: "y-axis-density"
        }, {
          id: "y-axis-gravity"
        }]
      }
    };

    var barChart = new Chart(densityCanvas, {
      type: 'bar',
      data: planetData,
      options: chartOptions
    });
  }
});
  }
  });
  function invoiceByMonth()
  {
     $.ajax({url: "<?= base_url()?>admin/getDataPreviousMonth",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);


     console.log(obj);
     var count=[];
     var date =[];
     var total =[];
     for (var i in obj)
     {
      count.push(obj[i].count);
      date.push(obj[i].date);
      total.push(obj[i].total);

    }
    var densityCanvas = document.getElementById("densityChart");


    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var densityData = {
      label: 'Amount in month',
      data: total,
      backgroundColor: 'rgba(0, 99, 132, 0.6)',
      borderWidth: 0,
      yAxisID: "y-axis-density"
    };

    var gravityData = {
      label: 'No of invoice generated',
      data:count,
      backgroundColor: 'rgba(99, 132, 0, 0.6)',
      borderWidth: 0,
      yAxisID: "y-axis-gravity"
    };

    var planetData = { 

      labels: date,
      datasets: [densityData, gravityData]
    };

    var chartOptions = {
      scales: {
        xAxes: [{
          barPercentage: 1,
          categoryPercentage: 0.6
        }],
        yAxes: [{
          id: "y-axis-density"
        }, {
          id: "y-axis-gravity"
        }]
      }
    };

    var barChart = new Chart(densityCanvas, {
      type: 'bar',
      data: planetData,
      options: chartOptions
    });
  }
});
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    salesChart();
    function salesChart()
    {
    $.ajax({url: "<?= base_url()?>admin/salesChart",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);


     console.log(obj);
     var credit=[];
     var month =[];
     var debit =[];
     for (var i in obj)
     {
      debit.push(obj[i].debit);
      month.push(obj[i].month);
      credit.push(obj[i].credit);

    }
    new Chart(document.getElementById("line-charts"), {
      type: 'line',
      data: {
        labels: month,
        datasets: [{ 
          data: debit,
          label: "spend",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: credit,
          label: "recieve",
          borderColor: "#8e5ea2",
          fill: false
        }, 
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Sales month wise'
        }
      }
    });
  }
});
  }
  });
</script>