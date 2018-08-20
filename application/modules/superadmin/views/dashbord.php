



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
        <div class="col-12 col-sm-6 col-md-2">
         <a href="<?= base_url() ?>superadmin/school_list" data-toggle="tooltip" data-placement="top" title="click here for more information of schools">  
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text ">SCHOOL</span>
              <span class="info-box-number school">
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
             <div class="col-12 col-sm-6 col-md-2">
         <a href="<?= base_url() ?>superadmin/school_list" data-toggle="tooltip" data-placement="top" title="click here for more information of schools">  
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text ">SALES</span>
              <span class="info-box-number sales">
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
    <div class="col-12 col-sm-6 col-md-2">
         <a href="<?= base_url() ?>superadmin/school_list" data-toggle="tooltip" data-placement="top" title="click here for more information of schools">  
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text ">ORDER</span>
              <span class="info-box-number order">
                <div class="ajax_loading">         
                  <div class="col-md-2">


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

      <div class="col-12 col-sm-6 col-md-2">
         <a href="<?= base_url() ?>superadmin/school_list" data-toggle="tooltip" data-placement="top" title="click here for more information of schools">  
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text ">ENQUIRY</span>
              <span class="info-box-number enquiry">
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
  </div>
</div>
  </section>  
  <div class="row">
    <div class="col-md-6">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Institute Add per month</h3>

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
            <!-- <canvas id="myChartStudent" width="400" height="200" style="width:400px;height: 300px"></canvas> -->
            <!-- <span>Remaning <div id="amount_remaning"></div></span> -->
          </div>
        </div>

        <!-- /.card-body -->
      </div>
    </div>
    </div>
  </div>



<!-- /.content-wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- /.control-sidebar -->

<script type="text/javascript">
 $(document).ready(function(){
   $('.ajax_loading').show();
   $.ajax({url: "<?= base_url()?>superadmin/countSchool",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);

     $('.school').html(obj);
    
   }});

 });
</script>
<script type="text/javascript">

  $(document).ready(function(){

    $('.ajax_loading').show();
    school_details();
    function school_details(){
    $.ajax({url: "<?= base_url()?>superadmin/fetchInstituteByDate",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);


     // console.log(obj);
     var date=[];
     var organization_name  =[];
     for (var i in obj)
     {
      date.push(obj[i].date);
      organization_name.push(obj[i].organization_name);

    }
     // console.log(organization_name);
        
  }
  });
  }
 $.ajax({url: "<?= base_url()?>superadmin/salesChart",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);


     console.log(obj);
     var date=[];
     var organization_name  =[];
     for (var i in obj)
     {
      date.push(obj[i].date);
      organization_name.push(obj[i].organization_name);

    }
     // console.log(organization_name);
        
  }
  });


  });



</script>