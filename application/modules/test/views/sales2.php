<div class="container">
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
             <div class="row"> 
              <div class="col-sm-12 col-12">
               <!--  <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p>
 -->
                <div class="chart res" >
                  <!-- Sales Chart Canvas -->
                  <!--  <canvas id="salesChart" height="180" style="height: 180px;"></canvas> -->
                  <canvas id="speedChart"   width="600" height="320" ></canvas>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->

              <!-- /.col -->
             </div> 
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
    
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

</div>


<script>
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
var speedCanvas = document.getElementById("speedChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;
var dataFirst = {
    label: "Car A - Speed (mph)",
    data: debit,
    lineTension: 0.3,
    fill: false,
    borderColor: 'red',
    backgroundColor: 'transparent',
    pointBorderColor: 'red',
    pointBackgroundColor: 'lightgreen',
    pointRadius: 5,
    pointHoverRadius: 15,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rect'
  };

var dataSecond = {
    label: "Car B - Speed (mph)",
    data: credit,
    lineTension: 0.3,
    fill: false,
    borderColor: 'purple',
    backgroundColor: 'transparent',
    pointBorderColor: 'purple',
    pointBackgroundColor: 'lightgreen',
    pointRadius: 5,
    pointHoverRadius: 15,
    pointHitRadius: 30,
    pointBorderWidth: 2
  };

var speedData = {
  labels: month,
  datasets: [dataFirst, dataSecond]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});
}
});
}
});
</script>
 