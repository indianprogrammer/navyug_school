<div class="pull-right">
    <a href="<?php echo site_url('parents/add'); ?>" class="btn btn-success">Add</a>
</div>

<table id="parent_table" class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Permanent Address</th>
        <th>Temporary Address</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($parents as $t) { ?>
        <tr>
            <td><?=$t['id']?></td>
            <td><?=$t['name']?></td>
            <td><?=$t['username']?></td>
            <td><?=$t['email']?></td>
            <td><?=$t['mobile']?></td>
            <td data-toggle="tooltip" data-placement="top" title="<?=$t['permanent_address']?>"><?php echo substr($t['permanent_address'],0,10).'...' ?></td>
            <td data-toggle="tooltip" data-placement="top" title="<?=$t['temporary_address']?>"><?php echo substr($t['temporary_address'],0,10).'...' ?></td>
            <td>
                <a href="<?php echo site_url('parents/edit/' . $t['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                <a onclick="myFunction();" class="btn btn-danger btn-xs delete-it"><span class="fa fa-trash"></span>
                    Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<!--<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>-->
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
<!--<script src="//datatables.net/download/build/nightly/jquery.dataTables.js?_=0188ba71c41a05452766c8a4627b767f"></script>-->

<script>
    $(document).ready( function () {
        $('#parent_table').DataTable();
    } );
</script>
<script type="text/javascript">
    function myFunction() {

        // var id = $(this).data('id');
        bootbox.confirm("Are you sure?", function (result) {
            if (result)
                window.location.href = "<?php echo site_url('parents/remove/' . $t['id']) ?>"

        });
    }
</script>