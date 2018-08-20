 <div class="container-fluid">
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
                <div class="chart res"   >
                  <!-- Sales Chart Canvas -->
                  <!--  <canvas id="salesChart" height="180" style="height: 180px;"></canvas> -->
                  <canvas id="line-charts" width="600" height="320" style="min-height: 110px;"></canvas>
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
        responsive:true,
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
<!-- <script type="text/javascript">
  $(document).ready(function()
  {
    init();
    window.addEventListener('resize',init,false);

  
function init()
{
  var itpc=document.getElementById("line-charts");
  var context=itpc.getContext('2d');
  var myWidth=window.innerWidth-10 ;
  var myHeight=window.innerHeight-10;
  context.canvas.width=myWidth;
  context.canvas.height=myHeight;
 
}
});

</script> -->