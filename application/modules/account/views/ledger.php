<style type="text/css">
.balance{
    margin-left:350px;
    height: 30px;
    /*background-color: grey;*/
    width:250px;
}
.balance-text
{
    font-size: 18px;

}

}
</style>
<div class="row">
    <div class="col-md-10 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" align="center">LEDGER REPORT</h3>
                
            </div>
<div class="card-body">

    <table class="table table-responsive" style="  border-color: white;">
                <tbody> 
                    <tr style="  border-color: white;">
                        <td width="20%" style="  border-color: white;">
                            <div >
                                &nbsp;&nbsp;<img src="<?= base_url()?>uploads/school/<?= $school_info['logo'] ?>" height="110" width="200" alt="">
                            </div>
                        </td>
                        <td width="40%" style="  border-color: white;">
                            <div align="left" style="-webkit-region-break-inside: avoid;">
                                    <h5 align="center"><b>FROM</b></h5>
                                <h6 align="center"><?= $school_info['organization_name'] ?></h6>
                                <h6 align="center"><?= $school_info['email'] ?></h6>
                                <h6 align="center">Tel: <?= $school_info['contact_pri'] ?></h6>
                             
                            </div>
                        </td>
                        <td width="40%" style="  border-color: white;">
                            <div align="left" style="-webkit-region-break-inside: avoid;">
                                    <h5 align="center"><b>TO</b></h5>
                                <h6 align="center"><?= $customer_info['name'] ?></h6>
                                <h6 align="center"><?= $customer_info['email'] ?></h6>
                                <h6 align="center">Tel: <?= $customer_info['mobile'] ?></h6>
                             
                            </div>
                        </td>
                        <!-- <td width="20%" style="  border-color: white;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> -->

                    </tr>
                </tbody>  
            </table>






    <div class="table-responsive">
<table id="invoice_table" class="table  table-bordered ">
    <thead>
        <tr>
            <!-- <th>S. no.</th> -->
            <th>Date</th>
            <th>Invoice Number</th>
            <th>Reciept Number</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Balance</th>
            
            
        </tr>
    </thead>
    <tbody>
       <?php   $count=1; 
       $debit=0;
       $credit=0;
       ?>
       <?php 
       // foreach ($ledger as $row) 

       for($i=0;$i<count($ledger);$i++) { ?>
        <tr>
            <!-- <td><?=$count++ ?></td> -->
            <td><?= date('Y-m-d',strtotime($ledger[$i]['date'])) ?></td>
            <td  data-toggle="tooltip" data-placement="top" title="click to get invoice"><a href="<?= site_url('account/getpdf/'.$ledger[$i]['invoice_id']); ?>"  target="_blank"><?=  $ledger[$i]['invoice_id'] ?></a> </td>
            <td  data-toggle="tooltip" data-placement="top" title="click to get reciept"><a href="<?= site_url('account/getPdfreciept/'.$ledger[$i]['reciept_id']); ?>" target="_blank"> <?=$ledger[$i]['reciept_id'] ?> </a></td>
            <td><?= $ledger[$i]['debit']  ?><?php    $debit= $debit+$ledger[$i]['debit'] ?></td>
            <td> <?= $ledger[$i]['credit'] ?><?php  $credit= $credit+$ledger[$i]['credit'] ?></td>
            <td><?= $debit-$credit; ?></td>
           
             <!-- <?php  $debit+=$row['debit'];
             $credit+=$row['credit'];
             


             ?> -->
         </tr>
     <?php } ?>
 </tbody>
 <tfoot>
     <tr>
     <td colspan="3"></td>
     <td ><b><?= $debit ?></b></td>
     <td ><b><?= $credit ?></b></td>
     <td colspan="2" ></td>
 </tr>
 <tr>
     <td colspan="5">Closing Balance</td>
     <td colspan="5"><b><?php
        $balance=$debit-$credit;
        echo $balance ?></b></td>
 </tr>
 </tfoot>
</table>
<!-- <hr>
<div class="balance">
    <div class="balance-text">
        Balance -&nbsp
        
    </div>
</div> -->
</div>
</div>
</div>
</div>
</div>

<button onclick="printPage()" id="printpagebutton" class="btn btn-info" target="_blank">Print </button> 
<!-- <button onclick="printPage()" id="exportpagebutton" target="_blank">export in excel </button>  -->



<script>
 
    function printPage()
    {
     var printButton = document.getElementById("printpagebutton");
     var footer = document.getElementById("footer");
        // Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        footer.style.visibility = 'hidden';
        window.print();
        printButton.style.visibility = 'visible';
    }
</script>
