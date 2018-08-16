<?php include_once "header.php" ?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url(); ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" 
             style="opacity: .8" >
        <span class="brand-text font-weight-light" style="font-size: 17px"><?= $this->session->SchoolName ?></span>
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
                <a href="#" class="d-block"><?=  strtoupper($this->session->name) ?> (<?= $this->session->username ?>)</a>
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
                        <a href="<?= site_url() ?>school/dashboard" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>DASHBOARD</p>
                        </a>
                    </li>

                    <!--  </ul>
                    </li> -->


                   <!--  <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                SCHOOL
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>school/add_school" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD SCHOOL
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>school" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        SCHOOL LIST

                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li> -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-mortar-board"></i>
                            <p>
                                STUDENT
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>student/add_student" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD STUDENT
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>student" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        STUDENT LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-male"></i>
                            <p>
                                EMPLOYEE
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>employee/add_employee" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD EMPLOYEE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>employee" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        EMPLOYEE LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-group"></i>
                            <p>
                                PARENTS
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>parents/add_parent" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD PARENTS
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>parents" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        PARENT LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                SUBJECTS
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>subject/add_subject" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD SUBJECT
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>subject" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        SUBJECT LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa  fa-sticky-note-o"></i>
                            <p>
                                CLASSESS
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>classes/add_class" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD CLASSES
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>classes" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        CLASSES LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon  fa fa-pencil-square-o"></i>
                            <p>
                                ENQUIRY
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>enquiry/add_enquiry" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD ENQUIRY
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>enquiry" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ENQUIRY LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li> 
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check-square-o"></i>
                            <p>
                               ATTENDANCE
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>attendance/take_attendance" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        TAKE ATTENDANCE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>attendance/attendance_list" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ATTENDANCE LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-money"></i>
                            <p>
                                ACCOUNT
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>account/add_invoice" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD INVOICE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>account/invoice_list" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        LIST INVOICE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>account/add_reciept" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD RECIEPT
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>account/reciept_list" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        RECIEPT LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>
                                NOTIFICATION
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>notification/index" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ADD NOTIFICATION
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                          <!--   <li class="nav-item">
                                <a href="<?= site_url() ?>employee" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        EMPLOYEE LIST
                                       
                                    </p>
                                </a>
                            </li> -->


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url() ?>login/logout" class="nav-link">
                            <i class="fa fa-sign-out nav-icon"></i>
                            <p>Logout</p>
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

                  <!--   <ul class="breadcrumb">

                       
                        <?php
                        $crumbs = explode("/", $_SERVER["REQUEST_URI"]);

                        foreach ($crumbs as $crumb) {
                            ?>
                            <li class="breadcrumb-item active"><?= ucwords(str_replace(array(".php", "_"), array(" ", " "), $crumb) . ' '); ?></li>

                        <?php } ?>

                    </ul> -->


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
