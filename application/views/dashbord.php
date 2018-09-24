



<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
 
    <!-- <div class="container-fluid"> -->
      <!-- Info boxes -->
     <div class="container-fluid"> 
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
              <span class="info-box-text">Student</span>
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
                </div>
              </span>
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
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Monthly Sales Report</h5>

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
              <!-- <div class="col-md-6"> -->
               <!--  <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p>
 -->
                <div class="chart res" >
                  <!-- Sales Chart Canvas -->
                  <!--  <canvas id="salesChart" height="180" style="height: 180px;"></canvas> -->
                  <canvas id="line-charts" style="height:250px"></canvas>
                   <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fa fa-square text-primary"></i> Credit
                  </span>

                  <span>
                    <i class="fa fa-square text-secondary"></i> Debit
                  </span>
                </div>
                </div>
                <!-- /.chart-responsive -->
              <!-- </div> -->
              <!-- /.col -->

              <!-- /.col -->
             <!-- </div>  -->
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
         </div>
       </div>
     
  
    <!-- /.row -->
    
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
            <!-- <div class="col-md-3"> -->



              <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
              </div>
              <!-- end loading -->
            <!-- </div> -->
            <!-- /.card -->
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="invoiceChart"  height="auto" style="min-height: 140px"></canvas>
               <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fa fa-square text-secondary"></i> Invoice 
                  </span>

                  <span>
                    <i class="fa fa-square text-success"></i> Count
                  </span>
                </div>
              <!-- <span>Remaning <div id="amount_remaning"></div></span> -->
            </div>
          </div>

          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <div class="row">
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
            <canvas id="barChart"  height="auto" style="min-height: 120px"></canvas>
            <!-- <span>Remaning <div id="amount_remaning"></div></span> -->
          </div>
        </div>

        <!-- /.card-body -->
      </div>
    </div>
    </div>
</div>
 </div>
  <!-- </div> -->
  <!-- /.row -->
  <!--/. container-fluid -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



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

<script src="<?= base_url() ;?>assets/admin/plugins/chartjs-old/Chart.min.js"></script>

 <script>
  
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
     var areaChartData = {
      labels  : month,
      datasets: [
   
        {
          label               : 'Number Of student',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : count
        },
      ]
    }
  var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    // barChartData.datasets[1].fillColor   = '#00a65a'
    // barChartData.datasets[1].strokeColor = '#00a65a'
    // barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
 }
});
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
    var InvoiceChartData = {
      labels  : month,
      datasets: [
          {
          label               : 'Total Rupess',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : total
        },
        {
          label               : 'Number Of Invoice',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : count
        }
      ]
    }
     var barChartCanvas                   = $('#invoiceChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = InvoiceChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
     barChartData.datasets[1].strokeColor = '#00a65a'
     barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
 }
});


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
console.log(debit);
console.log(month);
console.log(credit);
    var areaChartCanvas = $('#line-charts').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : month,
      datasets: [
        {
          label               : 'Debit',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : debit
        },
        {
          label               : 'Credit',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : credit
        }
      ]
    }
 
    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)
    }
});
</script>