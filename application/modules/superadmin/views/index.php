<?php include_once "header.php" ?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url(); ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" 
             style="opacity: .8" >
        <span class="brand-text font-weight-light">9yug</span>
    </a>

    <!-- Sidebar <-->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('uploads/') . $this->session->profileImage; ?>" class="img-circle elevation-2"
                     alt="<?= $this->session->name ?>">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?= $this->session->superusername ?></a>
            </div>
        </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <!--  <li class="nav-item has-treeview menu-open">
                       <a href="#" class="nav-link active">
                         <i class="nav-icon fa fa-dashboard"></i>
                         <p>
                           Dashboard
                           <i class="right fa fa-angle-left"></i>
                         </p>
                       </a>
                       <ul class="nav nav-treeview"> -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="<?= site_url() ?>superadmin/admin_index" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!--  </ul>
                    </li> -->


                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                SCHOOL
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>superadmin/add_school" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD SCHOOL
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>superadmin/school_list" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        SCHOOL LIST

                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li> 
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                ACCOUNT
                                <i class="fa fa-angle-left right"></i>
                            </p>    
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>superadmin/invoice" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD INVOICE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>superadmin/reciept" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD RECIEPT

                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url() ?>superadmin/createAdmin" class="nav-link">
                            <i class="fa fa-male nav-icon"></i>
                            <p>CREATE ADMIN</p>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="<?= site_url() ?>login/logout" class="nav-link">
                            <i class="fa fa-sign-out nav-icon"></i>
                            <p>LOGOUT</p>
                        </a>
                    </li>

</ul>
</nav>

        </div>
        <!-- /.sidebar -->
    </aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">

                


                    <?php if (isset($this->session->alerts)) {
                        $alert = $this->session->alerts; ?>
                        <div class="alert alert-<?= $this->session->alerts['severity'] ?> alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fa fa-check"></i> <?= $this->session->alerts['title'] ?>!</h5>
                            <?= $this->session->alerts['description'] ?>
                        </div>
                    <?php $this->session->alerts = null; } ?>


                    <?php if (isset($_view) && $_view)
                    $this->load->view($_view);
                    ?>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- Main Footer -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<?php include_once "footer.php"; ?>
