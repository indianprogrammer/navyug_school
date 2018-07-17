<?php include_once "header.php" ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url() ;?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ;?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
              <li class="nav-item">
                <a href="<?= site_url()?>school/index" class="nav-link">
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
                <a href="<?= site_url()?>school/add_school" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    ADD SCHOOL
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url()?>school/school_list" class="nav-link">
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
                STUDENT
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?= site_url()?>student/add_student" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    ADD STUDENT
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url()?>student/index" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    STUDENT LIST
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              
              
            </ul>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                TRAINER
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
            <a href="<?= site_url()?>trainer/add_trainer" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                ADD TRAINER
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="<?= site_url()?>trainer/trainer_list" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                TRAINER LIST
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


            </ul>
          </li>
          
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                PARENTS
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
            <a href="<?= site_url()?>parents/add_parent" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                ADD PARENTS
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
             <li class="nav-item">
            <a href="<?= site_url()?>parents/parent_list" class="nav-link">
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
              <i class="nav-icon fa fa-tree"></i>
              <p>
                SUBJECTS
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
            <a href="<?= site_url()?>subject/add_subject" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                ADD SUBJECT
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="<?= site_url()?>subject_list" class="nav-link">
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
              <i class="nav-icon fa fa-tree"></i>
              <p>
                CLASSESS
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
            <a href="<?= site_url()?>classes/add_class" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                ADD CLASSES
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="<?= site_url()?>classes/class_list" class="nav-link">
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
              <i class="nav-icon fa fa-tree"></i>
              <p>
               ENQUIRY
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

             <li class="nav-item">
            <a href="<?= site_url()?>enquiry/add_enquiry" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Add ENQUIRY
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url()?>enquiry/enquiry_list" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                ENQUIRY LIST
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        


            </ul>
          </li>
        
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

            <ul class="breadcrumb">

  <!-- <li class="breadcrumb-item active">Add Enquiry</li> -->
            <?php      
               $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
 
        foreach($crumbs as $crumb){
      ?>       
  <li class="breadcrumb-item active"><?= ucwords(str_replace(array(".php","_"),array(" "," "),$crumb) . ' '); ?></li>

    <?php      }  ?>
           
</ul>
          <?php   if(isset($_view) && $_view)
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

  <?php include_once "footer.php" ;?>
