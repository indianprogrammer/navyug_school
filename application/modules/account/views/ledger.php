

<table id="invoice_table" class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th>S. NO.</th>
        <th>Invoice Number</th>
        <th>Reciept Number</th>
        <th>debit</th>
        <th>credit</th>
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
<?php
 $balance=$debit-$credit;
echo $balance ?>

<button onclick="printPage()">Print </button>



<script>
   
    function printPage()
    {
        window.print();
    }
</script>
