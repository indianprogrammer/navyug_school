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
<?php 
$output.='<table id="invoice_table" class="table table-responsive table-bordered ">
    <thead>
        <tr>
            <th>S. no.</th>
            <th>Invoice Number</th>
            <th>Reciept Number</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Date</th>
            
            
        </tr>
    </thead>
    <tbody>'; ?>
       <?php   $count=1; 
       $debit=0;
       $credit=0;
       ?>
       <?php foreach ($ledger as $row) { ?>
     <?php   $balance=' <tr>
            <td><?=$count++ ?></td>
            <td  data-toggle="tooltip" data-placement="top" title="click to get invoice"><a href="<?= base_url("account/getpdf/".$row['invoice_id']); ?>"  target="_blank"><?=$row['invoice_id'] ?></a> </td>
            <td  data-toggle="tooltip" data-placement="top" title="click to get reciept"><a href="<?= site_url('account/getPdfreciept/'.$row['reciept_id']); ?>" target="_blank"> <?=$row['reciept_id'] ?> </a></td>
            <td><?php if($row['debit']==0){echo " - ";} else {echo $row['debit']; } ?></td>
            <td><?php if($row['credit']==0){echo " - ";} else {echo $row['credit']; } ?></td>
            <td><?=$row['date'] ?></td>'; ?>
             <!-- <td><a href="<?= site_url('account/getpdf/'.$row['invoice_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
             </td> -->
             <?php  $debit+=$row['debit'];
             $credit+=$row['credit'];
             


             ?>
         </tr>
     <?php } ?>
 </tbody>
</table>
<hr>
<div class="balance">
    <div class="balance-text">
        Balance -&nbsp
        <?php
        $balance=$debit-$credit;
        echo $balance ?>
    </div>
</div>
