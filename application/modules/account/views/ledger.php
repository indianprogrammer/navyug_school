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

<table id="invoice_table" class="table table-responsive">
    <thead>
    <tr>
        <th>S. no.</th>
        <th>Invoice Number</th>
        <th>Reciept Number</th>
        <th>Debit</th>
        <th>Credit</th>
        <th>Date</th>
       
        <!-- <th>Actions</th> -->
    </tr>
    </thead>
    <tbody>
     <?php   $count=1; 
     $debit=0;
     $credit=0;
     ?>
    <?php foreach ($ledger as $row) { ?>
        <tr>
            <td><?=$count++ ?></td>
            <td><?=$row['invoice_id'] ?> </td>
            <td><?=$row['reciept_id'] ?> </td>
             <td><?=$row['debit'] ?></td>
             <td><?=$row['credit'] ?></td>
             <td><?=$row['date'] ?></td>
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
<button onclick="printPage()" id="printpagebutton" target="_blank">Print </button> 



<script>
   
    function printPage()
    {
       var printButton = document.getElementById("printpagebutton");
       var footer = document.getElementById("footer");
        //Set the print button visibility to 'hidden' 
             printButton.style.visibility = 'hidden';
             footer.style.visibility = 'hidden';
                window.print();
                 printButton.style.visibility = 'visible';
    }
</script>
