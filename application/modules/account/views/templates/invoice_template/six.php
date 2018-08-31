  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">
  <script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script>
  <style type="text/css">
    @page {
   size: 8.27in 11.69in;
   margin: 12mm 3mm 10mm 3mm;
}
.rectanglespace
{
  height:100px;
  width:100%;
  background-color:#e8eaed;

}
.text_main
{
  /*text-align:center;*/
  font-weight: 900;
font-style: bold;
  font-size: 20px;
  position: relative;
  top: 40%;
  left:50%;
  l
}
  </style>
  </head>
  <body>
 



 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="rectanglespace">
              <div class="text_main">INVOICE</div>
            </div>
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <!-- <i class="fa fa-globe"></i> AdminLTE, Inc. -->
                    <!-- <small class="float-right">Date: 2/10/2014</small> -->
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?= $school_name ?></strong><br>
                    <?= $institute_address ?>
                    <br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?= $student_name ?></strong><br>
                    <?= $permanent_address ?><br>
                    Phone:  <?= $contact ?><br>
                    Email: <?= $email ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 invoice-col">
                  <b>Invoice <?= $invoice_id ?></b><br>
                  <br>
                  <!-- <b>Order ID:</b> 4F3S8J<br> -->
                  <!-- <b>Payment Due:</b> 2/22/2014<br> -->
                  <!-- <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Particulars</th>
                      <th>price</th>
                      <!-- <th>Description</th>
                      <th>Subtotal</th> -->
                    </tr>
                    </thead>
                    <tbody>
                   <?= $price ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="<?= base_url() ?>assets/admin/dist/img/credit/visa.png" alt="Visa">
                  <img src="<?= base_url() ?>assets/admin/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="<?= base_url() ?>assets/admin/dist/img/credit/american-express.png" alt="American Express">
                  <img src="<?= base_url() ?>assets/admin/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    This payment option are avilable here
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?= $subtotal ?></td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td><?= $tax ?></td>
                      </tr>
                      
                      <tr>
                        <th>Total:</th>
                        <td><?= $total ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!-- <a onclick="printFunction()" id="printpagebutton" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
                 <!--  <button type="button" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Submit
                    Payment
                  </button> -->
                  <button type="button" class="btn btn-primary float-right" onclick="printFunction()" id="printpagebutton" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>

 
            <script type="text/javascript">
              function printFunction()
              {
                var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
             printButton.style.visibility = 'hidden';
                window.print();
                 printButton.style.visibility = 'visible';
              }


            </script>
             </body>
  </html>