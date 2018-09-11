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
            <!-- <td><?=$row['name'] ?> </td> -->
            <td data-toggle="tooltip" data-placement="top" title="click to view" ><a href="<?=base_url()?>student/getFullDetails?student_id=<?= $row['student_id'] ?>"><?= $row['name'] ?> </a> </td>
            <td><?=$row['total_amount'] ?> </td>
             <td><?=$row['date'] ?></td>
             <td><a href="<?= site_url('account/getPdfreciept/'.$row['reciept_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>




<script>
    $(document).ready( function () {
        $('#reciept_table').DataTable();
    } );
</script>
