<?php 
// tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $obj_pdf->SetCreator(PDF_CREATOR);
// $title = "PDF Report";
$obj_pdf->SetTitle("reciept");
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $school_name, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
    
   echo ' <section class="content">
      <div class="container-fluid">
        
          
            
              <!-- title row -->
             
              <!-- info row -->
              <div class="row invoice-info">
                
                <!-- /.col -->
                <div class="col-sm-3 col-md-3 invoice-col" >
                  RECIEVED BY
                  <address>
                    <strong>'.$student_name.'</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: '.$contact.'<br>
                    Email:'.$email.'
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Reciept '.$reciepteId.'</b><br>
                  <br>
                
                  // <b>Payment Due:</b> '.$date.'<br>
                  // <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
             
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <p>'.$payment_method.'</p>
                  

                 
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td></td>
                      </tr>
                      
                      <tr>
                        <th>Total:</th>
                        <td>'.$paid.'</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
             
            
      </div><!-- /.container-fluid -->
    </section>';
 

    $content = ob_get_contents();
 
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');
?>