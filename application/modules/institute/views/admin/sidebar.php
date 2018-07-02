<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="<?= base_url()?>index.php/institute/AdminController/index"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
										
										
										
									
									
									
									
							        <li id="menu-academico" ><a href="#"><i class="fa fa-sticky-note-o"></i> 
							         <span>Courses</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<!-- <li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li> -->
											<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/add_course">Add Courses</a></li>
											<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/view_course">View Courses</a></li>
											

										  </ul>
									 </li>
									  <li id="menu-academico" ><a href="#"><i class="fa fa-users"></i> 
							         <span>Teachers</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<!-- <li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li> -->
											<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/add_teacher">Add Teacher</a></li>
									<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/view_teacher">View Teacher</a></li>
											

										  </ul>
									 </li> 
									 <li id="menu-academico" ><a href="#"><i class="fa fa-graduation-cap"></i> 
							         <span>Students</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<!-- <li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li> -->
											<li class=" ">
							                    <a href="<?= base_url()?>index.php/institute/AdminController/add_student">
							                        <span>Add Student</span>
							                    </a>
							                </li>
											<li class="designbox"><a href="<?= base_url()?>index.php/institute/AdminController/view_student">View Student</a></li>
									
											

										  </ul>
									 </li>
									 <li><a href="<?= base_url()?>index.php/institute/AdminController/add_study_matearial"><i class="fa fa-book"></i> <span>Study Matearial</span><div class="clearfix"></div></a></li>
									  <li><a href="<?= base_url()?>index.php/institute/LoginController/logout"><i class="fa fa-sign-out"></i> <span>Logout</span><div class="clearfix"></div></a></li>
									
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>