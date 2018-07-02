<?php include('header.php') ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 sidenav">
			<ul class="tab">
				<!-- STUDENT -->
				<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/index">Dashboard</a></li>
        <li class="designbox">
            <a href="#">
                <!-- <i class="entypo-users"></i> -->
                <span>Students</span>
            </a>
            <ul class="dropdowncontent">
                <!-- STUDENT ADMISSION -->
                <li class=" ">
                    <a href="<?= base_url()?>index.php/institute/AdminController/add_student">
                        <span>Add Student</span>
                    </a>
                </li>

                <!-- STUDENT BULK ADMISSION -->
                <li class=" ">
                    <a href="http://localhost/advancesms/index.php?admin/student_bulk_add">
                        <span> Add Bulk Student</span>
                    </a>
                </li>

			</ul>
		</li>
		<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/view_student">View Student</a></li>
		<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/add_course">Add Courses</a></li>
		<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/view_course">View Courses</a></li>
		<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/add_teacher">Add Teacher</a></li>
		<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/view_teacher">View Teacher</a></li>
	</ul>

		</div>
		<div class="col-md-9">
			<?php 
// if(isset($_GET['AdminController/student_add']))
// {
// 	include ('student_add.php');
// }
?>
		</div>
		




	</div>
	<!-- end of row -->


</div>
<!-- end of container -->
