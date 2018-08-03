<div class="pull-right">
    <a href="<?php echo site_url('account/add_invoice'); ?>" class="btn btn-success">Add</a>
</div>

<table id="invoice_table" class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Invoice Number</th>
        <th>Student Name</th>
        <th>Total Amount</th>
        <th>Date</th>
       
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
     <?php   $count=1; ?>
    <?php foreach ($invoice as $row) { ?>
        <tr>
            <td><?=$count++ ?></td>
            <td><?=$row['invoice_id'] ?> </td>
            <td><?=$row['student_name'] ?> </td>
             <td><?=$row['total_amount'] ?></td>
             <td><?=$row['date'] ?></td>
             <td><a href="<?= site_url('account/getpdf/'.$row['invoice_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>


<script>
    $(document).ready( function () {
        $('#invoice_table').DataTable();
    } );
</script>
