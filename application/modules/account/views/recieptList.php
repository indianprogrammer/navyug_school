<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ADD EMPLOYEE</h3>
        <div class="card-tools pull-right">
         <a href="<?php echo site_url('account/add_reciept'); ?>" class="btn btn-success">Add</a>
     </div>
 </div>
 <div class="card-body">


    <div class="table-responsive">




        <table id="reciept_table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reciept Number</th>
                    <th>Customer name</th>
                    <th>Paid</th>
                    <th>payment method</th>
                    <th>payer name</th>
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
                    <td><?=$row['payment_method'] ?> </td>
                    <td><?=$row['payer_name'] ?> </td>
                    <td><?=$row['date'] ?></td>
                    <td><a href="<?= site_url('account/getPdfreciept/'.$row['reciept_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
</div>
</div>
</div>
</div>



<script>
    $(document).ready( function () {
        $('#reciept_table').DataTable();
    } );
</script>
