<?php include "header.php" ?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url(); ?>assets/admin/dist/img/AdminLTELogo.png" alt=" "
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
                alt="">
            </div>
            <div class="info">
                <a href="<?= base_url()?>profile/my_profile" class="d-block"><?=  strtoupper($this->session->name) ?> (<?= $this->session->username ?>)</a>
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
                        <li class="nav-item has-treeview">
                            <a href="<?= site_url() ?>admin" class="nav-link <?php if($this->uri->segment(1)=="admin"){ ?> active <?php } ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>DASHBOARD</p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="student"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="student"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    <?= strtoupper($this->session->menu_student?$this->session->menu_student:'STUDENT') ?>
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>student/add_student" class="nav-link">
                                        <!--<i class="nav-icon fa fa-th"></i>// -->
                                        <p>
                                            ADD <?= strtoupper($this->session->menu_student?$this->session->menu_student:'STUDENT') ?>
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>student" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            <?= strtoupper($this->session->menu_student?$this->session->menu_student:'STUDENT') ?> LIST
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>student/assign_student" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                           ASSIGN <?= strtoupper($this->session->menu_student?$this->session->menu_student:'STUDENT') ?> 
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <!--  <li class="nav-item">
                                    <a href="<?= site_url() ?>student/add_bulk_student" class="nav-link">
                                     
                                        <p>
                                            ADD BULK STUDENT
                                          
                                        </p>
                                    </a>
                                </li>
 -->

                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="employee"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="employee"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-male"></i>
                                <p>
                                    <?= strtoupper($this->session->menu_staff?$this->session->menu_staff:'STAFF') ?>
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>employee/add_employee" class="nav-link ">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD   <?= strtoupper($this->session->menu_staff?$this->session->menu_staff:'STAFF') ?>
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>employee" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                             <?= strtoupper($this->session->menu_staff?$this->session->menu_staff:'STAFF') ?> LIST
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="parents"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="parents"){ ?> active <?php } ?>" >
                                <i class="nav-icon fa fa-group"></i>
                                <p>
                                    PARENTS
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>parents/add_parent" class="nav-link ">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD PARENTS
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>parents" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            PARENT LIST
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="subject"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="subject"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    <?= strtoupper($this->session->menu_subjects?$this->session->menu_subjects:'SUBJECTS') ?>
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>subject/add_subject" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD  <?= strtoupper($this->session->menu_subjects?$this->session->menu_subjects:'SUBJECT') ?>
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>subject" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                             <?= strtoupper($this->session->menu_subjects?$this->session->menu_subjects:'SUBJECT') ?> LIST
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?= site_url() ?>subject/assign_subject" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                             ASSIGN <?= strtoupper($this->session->menu_subjects?$this->session->menu_subjects:'SUBJECT') ?>
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>subject/subject_allocation" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                             <?= strtoupper($this->session->menu_subjects?$this->session->menu_subjects:'SUBJECT') ?> ALLOCATION
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="classes"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="classes"){ ?> active <?php } ?>">
                                <i class="nav-icon fa  fa-sticky-note-o"></i>
                                <p>
                                     ACEDEMICS
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                    <a href="<?= site_url() ?>classes/add_course" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD <?= strtoupper($this->session->menu_courses?$this->session->menu_courses:'COURSES') ?>
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>  
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>classes/add_batch" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD <?= strtoupper($this->session->menu_courses?$this->session->menu_courses:'BATCH') ?>
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>    
                                 <li class="nav-item">
                                    <a href="<?= site_url() ?>classes/batch_list" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                           BATCH LIST
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>                            
                                <!--  <li class="nav-item">
                                    <a href="<?= site_url() ?>classes/add_class" class="nav-link">
                                      
                                        <p>
                                            ADD <?= strtoupper($this->session->menu_classes?$this->session->menu_classes:'CLASSES') ?>
                                         
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>classes" class="nav-link">
                               
                                        <p>
                                           <?= strtoupper($this->session->menu_classes?$this->session->menu_classes:'CLASSES') ?> LIST
                                        
                                        </p>
                                    </a>
                                </li> -->


                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="enquiry"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="enquiry"){ ?> active <?php } ?>">
                                <i class="nav-icon  fa fa-pencil-square-o"></i>
                                <p>
                                    ENQUIRY
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>enquiry/add_enquiry" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD ENQUIRY
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>enquiry" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ENQUIRY LIST
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>


                            </ul>
                        </li> 
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="homework"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="homework"){ ?> active <?php } ?>">
                                <i class="nav-icon  fa fa-pencil-square-o"></i>
                                <p>
                                    HOMEWORK
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= site_url() ?>homework/add_homework" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD HOMEWORK
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>homework" class="nav-link">
                                      <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            HOMEWORK LIST
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>


                            </ul>
                        </li> 
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="attendance"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="attendance"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-check-square-o"></i>
                                <p>
                                   ATTENDANCE
                                   <i class="fa fa-angle-left right"></i>
                               </p>
                           </a>
                           <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>attendance/take_attendance" class="nav-link">
                                   <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        TAKE ATTENDANCE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>attendance/attendance_list" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        ATTENDANCE LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a href="<?= site_url() ?>attendance/attendance_report" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        ATTENDANCE REPORT
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                     <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="library"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="library"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                   LIBRARY
                                   <i class="fa fa-angle-left right"></i>
                               </p>
                           </a>
                           <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>library/add_books" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        ADD BOOKS
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>library/add_book_category" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        ADD BOOK CATEGORY
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>library/books_list" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                         BOOK LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>library/issue_book" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                         BOOK ISSUE
                                       
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>library/book_issue_list" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                         BOOK ISSUE LIST
                                       
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>library/books_return" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                         BOOK RETURN
                                       
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>library/library_setting" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                         
                                       SETTING
                                    </p>
                                </a>
                            </li>



                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="account"){ ?> menu-open <?php } ?> ">
                        <a href="#" class="nav-link <?php if($this->uri->segment(1)=="account"){ ?> active <?php } ?>">
                            <i class="nav-icon fa fa-money"></i>
                            <p>
                                <?= strtoupper($this->session->menu_account?$this->session->menu_account:'ACCOUNT') ?>
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="<?= site_url() ?>account/add_invoice" class="nav-link ">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        ADD INVOICE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>account/invoice_list" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        LIST INVOICE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>account/add_reciept" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        ADD RECIEPT
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url() ?>account/reciept_list" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        RECIEPT LIST
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="notification"){ ?> menu-open <?php } ?>">
                        <a href="#" class="nav-link <?php if($this->uri->segment(1)=="notification"){ ?> active <?php } ?>">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>
                                NOTIFICATION
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>notification/index" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                        ADD NOTIFICATION
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                           <!--  <li class="nav-item">
                                <a href="<?= site_url() ?>employee" class="nav-link"> -->
                                  <!-- <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        EMPLOYEE LIST
                                       
                                    </p>
                                </a>
                            </li> -->


                        </ul>
                    </li>
                     <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="setting"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="setting"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-check-square-o"></i>
                                <p>
                                   SETTING
                                   <i class="fa fa-angle-left right"></i>
                               </p>
                           </a>
                           <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>settings/organization_profile" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                      <?php if(isset($this->session->organization)?$this->session->organization:'ORGANIZATION') ?>
                                      PROFILE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            
                             <li class="nav-item">
                                <a href="<?= site_url() ?>settings/sms_template_setting" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                       SMS
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                             <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="setting"){ ?> menu-open <?php } ?>">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="setting"){ ?> active <?php } ?>">
                                <!-- <i class="nav-icon fa fa-check-square-o"></i> -->
                                <p>
                                   EMAIL
                                   <i class="fa fa-angle-left right"></i>
                               </p>
                           </a>
                                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= site_url() ?>settings/email_template_setting" class="nav-link">
                                  <!-- <i class="nav-icon fa fa-th"></i> -->
                                    <p>
                                    EMAIL TEMPLATE
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                        </ul>
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
        <!-- </div> -->
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <!-- <h2><?= ucfirst($this->uri->segment(1)) ?></h2> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url()?>admin">Home</a></li>
                  <li class="breadcrumb-item active"><?= $this->uri->segment(1) ?></li>
                  <!-- <li class="breadcrumb-item active"><?= $this->uri->segment(2) ?></li> -->
              </ol>
          </div>
      </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if (isset($this->session->alerts)) {
            $alert = $this->session->alerts; ?>
            <div class="alert alert-<?= $this->session->alerts['severity'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-check"></i> <?= $this->session->alerts['title'] ?>!</h5>
                <?= isset($this->session->alerts['description'])?$this->session->alerts['description']:'' ?>
            </div>
            <?php $this->session->alerts = null; } ?>


            <?php if (isset($_view) && $_view)
            $this->load->view($_view);
            ?>


            <!-- </div> -->
            <!-- /.col -->
            <!-- </div> -->
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- Main Footer -->

<script>
   
  $('.mt-2 ul li').find('a').each(function () {
    if (document.location.href == $(this).attr('href')) {
        $(this).parents().addClass("active");
        $(this).addClass("active");
                // add class as you need ul or li or a 
            }
        });
    </script>


<?php include "footer.php"; ?>
