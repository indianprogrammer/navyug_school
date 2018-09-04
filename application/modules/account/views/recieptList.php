<div class="pull-right">
    <a href="<?php echo site_url('account/add_reciept'); ?>" class="btn btn-success">Add</a>
</div>

<table id="reciept_table" class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Reciept Number</th>
        <th>Customer name</th>
        <th>Paid</th>
        <th>Date</th>
       
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
     <?php   $count=1; ?>
    <?php foreach ($reciept as $row) { ?>
        <tr>
            <td><?=$count++ ?></td>
            <td><?=$row['reciept_id'] ?> </td>
            <td><?=$row['name'] ?> </td>
            <td><?=$row['total_amount'] ?> </td>
             <td><?=$row['date'] ?></td>
             <td><a href="<?= site_url('account/getPdfreciept/'.$row['reciept_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>


<script>
    $(document).ready( function () {
        $('#reciept_table').DataTable();
    } );
</script>
