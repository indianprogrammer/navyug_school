<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from keenitsolutions.com/products/html/OUR INSTITUTE/OUR INSTITUTE-demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 09:34:49 GMT -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>OUR INSTITUTE </title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/website/images/fav.png">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/owl.carousel.css">
		<!-- slick css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/slick.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/magnific-popup.css">
		<!-- Offcanvas CSS -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/off-canvas.css">
		<!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/fonts/flaticon.css">
		<!-- flaticon2 css  -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/fonts/fonts2/flaticon.css">
        <!-- Switch style CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/website/css/color-style.css">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/rsmenu-main.css">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/rsmenu-transitions.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/main.css">
        <!-- switch color presets css -->
        <link id="switch_style" href="#" rel="stylesheet" type="text/css">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/website/css/responsive.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]--><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<style type="text/css">
	.box
	{
		height: 140px;
		width: 50px;
		background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(-45deg, #ffffff 0%, #f3f3f3 50%, #ededed 51%, #ffffff 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, #ffffff 0%,#f3f3f3 50%,#ededed 51%,#ffffff 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, #ffffff 0%,#f3f3f3 50%,#ededed 51%,#ffffff 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
		margin:10px;
	}
	.boxtext
	{
		font-size: 23px;
		text-decoration: bold;
		padding:40px 0 0 24px; 
	}
	.modal.modal-wide .modal-dialog .modal-content {
  width: 900px;
  height: 400px;
  margin-right: 200px;
  background-color: black;
}
.modal-wide .modal-body {
  overflow-y: auto;
}
.modal-body
{
	background-color: none;
}
	
</style>
    </head>
    <body class="home1">
        <!--Preloader area start here-->
       <!--  <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                
            </div>
        </div> -->
		<!--Preloader area end here-->
		
        <!--Full width header Start-->
		<div class="full-width-header">

			<!-- Toolbar Start -->
			<div class="rs-toolbar">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="rs-toolbar-left">
								<div class="welcome-message">
									<i class="fa fa-bank"></i><span>WELCOME TO OUR INSTITUTE</span> 
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="rs-toolbar-right">
								<div class="toolbar-share-icon">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
								<a href="" class="apply-btn" data-toggle="modal" data-target="#loginmodal">LOGIN</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Toolbar End -->
			
			<!--Header Start-->
			<header id="rs-header" class="rs-header">
				
				<!-- Header Top Start -->
				<div class="rs-header-top">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-sm-12">
						        <div class="header-contact">
						            <div id="info-details" class="widget-text">
                                        <i class="glyph-icon flaticon-email"></i>
						                <div class="info-text">
						                    <a href="mailto:info@domain.com">
						                    	<span>Mail Us</span>
												info@domain.com
											</a>
						                </div>
						            </div>
						        </div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="logo-area text-center">
									<!-- <a href="index-2.html"><img src="<?= base_url(); ?>assets/website/images/logo.png" alt="logo"></a> -->
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
						        <div class="header-contact pull-right">
						            <div id="phone-details" class="widget-text">
						                <i class="glyph-icon flaticon-phone-call"></i>
						                <div class="info-text">
						                    <a href="tel:4155551234">
						                    	<span>Call Us</span>
												+914434-567-890
											</a>
						                </div>
						            </div>
						        </div>
							</div>
						</div>				
					</div>
				</div>
				<!-- Header Top End -->

				<!-- Menu Start -->
				<div class="menu-area menu-sticky">
					<div class="container">
						<div class="main-menu">
							<div class="row">
								<div class="col-sm-12">
									<!-- <div id="logo-sticky" class="text-center">
										<a href="index.html"><img src="<?= base_url(); ?>assets/website/images/logo.png" alt="logo"></a>
									</div> -->
									<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
									<nav class="rs-menu">
										<ul class="nav-menu">
											<!-- Home -->
											<li class="current-menu-item current_page_item menu-item-has-children"> <a href="#" class="home">Home</a>
											  
											</li>
											<!-- End Home --> 
                                            
                                            <!--About Menu Start-->
                                            <li class="menu-item-has-children"> <a href="#rs-about">About Us</a>
                                                
                                            </li>
                                            <!--About Menu End--> 

                                           
                                            
											<!--Courses Menu Start-->
		                                    <li class="menu-item-has-children"> <a href="#rs-courses">Courses</a>
		                                     
		                                    </li>
		                                    <!--Courses Menu End-->
                                            
											
											
											<!--blog Menu Start-->
											<li class="menu-item-has-children"> <a href="#rs-testimonial">Blog</a>
												
											</li>
											<!--blog Menu End-->
                                            
											<!--Contact Menu Start-->
											<li> <a href="#rs-footer">Contact</a></li>
								            <!--Contact Menu End-->
										</ul>
									</nav>
                                    <div class="right-bar-icon rs-offcanvas-link text-right">
                                        <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>

                                        <a id="nav-expander" class="nav-expander fixed"><i class="fa fa-bars fa-lg white"></i></a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Menu End -->
			</header>
			<!--Header End-->

		</div>
        <!--Full width header End-->
		
		<!-- Slider Area Start -->
        <div id="rs-slider" class="slider-overlay-2">     
        	<div id="home-slider">
				<!-- Item 1 -->
				<div class="item active">
					<img src="<?= base_url();?>assets/website/images/slider/home1/slide1.jpg" alt="Slide1" />
					<div class="slide-content">
						<div class="display-table">
							<div class="display-table-cell">
								<div class="container text-center">
									<h1 class="slider-title" data-animation-in="fadeInLeft" data-animation-out="animate-out">WELCOME TO OUR INSTITUTE</h1>
									<!-- <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.<br class="hidden-sm-dow"> Nunc quis sapien in arcu pharetra volutpat.Morbi nec vulputate dolor.</p>   -->
									<a href="#" class="sl-readmore-btn mr-30" data-animation-in="lightSpeedIn" data-animation-out="animate-out">READ MORE</a>
									<a href="#" class="sl-get-started-btn" data-animation-in="lightSpeedIn" data-animation-out="animate-out">GET STARTED NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Item 2 -->
				<div class="item">
					<img src="<?= base_url(); ?>assets/website/images/slider/home1/slide2.jpg" alt="Slide2" />
					<div class="slide-content">
						<div class="display-table">
							<div class="display-table-cell">
								<div class="container text-center">
									<h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out">ARE YOU READY TO JOIN OUR INSTITUTE?</h1>
									<!-- <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.<br class="hidden-sm-dow"> Nunc quis sapien in arcu pharetra volutpat.Morbi nec vulputate dolor.</p> -->  
									<a href="#" class="sl-readmore-btn mr-30" data-animation-in="fadeInUp" data-animation-out="animate-out">READ MORE</a>
									<a href="#" class="sl-get-started-btn" data-animation-in="fadeInUp" data-animation-out="animate-out">GET STARTED NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Item 3 -->
				<div class="item">
					<img src="<?= base_url(); ?>assets/website/images/slider/home1/slide3.jpg" alt="Slide3" />
					<div class="slide-content">
						<div class="display-table">
							<div class="display-table-cell">
								<div class="container text-center">
									<h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out">ARE YOU READY TO PLACED IN BIG MNC?</h1>
									<!-- <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.Sed nec molestie justo.<br> Nunc quis sapien in arcu pharetra volutpat.Morbi nec vulputate dolor.</p> -->  
									<a href="#" class="sl-readmore-btn mr-30" data-animation-in="fadeInUp" data-animation-out="animate-out">READ MORE</a>
									<a href="#" class="sl-get-started-btn" data-animation-in="fadeInUp" data-animation-out="animate-out">GET STARTED NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>

        	</div>         
        </div>
        <!-- Slider Area End -->
		
		<!-- Services Start -->
        <div class="rs-services rs-services-style1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="flaticon-tool rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Trending Courses</h4>
                    	        <p>We give training in all traditional course. </p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="flaticon-book rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Books & Library</h4>
                    	        <p>All books are avilable of every course.</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="flaticon-tool-1 rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Certified Teachers</h4>
                    	        <p>all teachers are 10+ year experice and certified in his subject.</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="flaticon-diploma rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Certification</h4>
                    	        <p>After complition of course we will provide certificate which help you to placed in good job.</p>
                    	    </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Services End -->

		<!-- About Us Start -->
        <div id="rs-about" class="rs-about sec-spacer">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>ABOUT US</h2>      
                	<p>Fusce sem dolor, interdum in fficitur at, faucibus nec lorem. Sed nec molestie justo.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img rs-animation-hover">
							<img src="<?= base_url(); ?>assets/website/images/about/about.jpg" alt="img02"/>
							<a class="popup-youtube rs-animation-fade" href="https://www.youtube.com/watch?v=3f9CAMoj3Ec" title="Video Icon">
							</a>
							<div class="overly-border"></div>
						</div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                    	<div class="about-desc">
                		    <h3>WELCOME TO OUR INSTITUTE</h3>      
                			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                    	</div>
						<div id="accordion" class="rs-accordion-style1">
						    <div class="card">
						        <div class="card-header" id="headingOne">
						            <h3 class="acdn-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          		Our History
						            </h3>
						        </div>
						        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						            <div class="card-body">
						                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						            </div>
						        </div>
						    </div>
						    <div class="card">
						        <div class="card-header" id="headingTwo">
						            <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          		Our Mission
						            </h3>
						        </div>
						        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						            <div class="card-body">
						                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						            </div>
						        </div>
						    </div>
						    <div class="card">
						        <div class="card-header mb-0" id="headingThree">
						            <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          		Our Vision
						            </h3>
						        </div>
						        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						            <div class="card-body">
						                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						            </div>
						        </div>
						    </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us End -->

        <!-- Courses Start -->
        <div id="rs-courses" class="rs-courses sec-color sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
                    <h2>OUR POPULAR COURSES</h2>      
                	<p>We given training to many of course which are listed below	</p>
                </div>
				<div class="row">
			        <div class="col-md-12">
						<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
			                <div class="cource-item">
			                    <div class="cource-img">
			                        <img src="<?= base_url();?>assets/website/images/JAVA.jpg" alt="" style="height: 200px;">
                                    <a class="image-link" href="courses-details.html" title="University Tour 2018">
                                        <i class="fa fa-link"></i>
                                    </a>
			                        <span class="course-value">$450</span>
			                    </div>
			                    <div class="course-body">
			                    	<a href="#" class="course-category">IT DEVELOPEMENT</a>
			                    	<h4 class="course-title"><a href="courses-details.html">JAVA</a></h4>
			                    	<div class="review-wrap">
			                    		<ul class="rating">
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star-half-empty"></li>
			                    		</ul>
			                    		<span class="review">25 Reviews</span>
			                    	</div>
			                    	
			                    </div>
			                    <div class="course-footer">
			                    	<div class="course-time">
			                    		<span class="label">Course Time</span>
			                    		<span class="desc">8 Month</span>
			                    	</div>
			                    	<div class="course-student">
			                    		<span class="label">Course Batch Student</span>
			                    		<span class="desc">95</span>
			                    	</div>
			                    	<div class="class-duration">
			                    		<span class="label">Class Duration</span>
			                    		<span class="desc">8:30-1:00</span>
			                    	</div>
			                    </div>
			                </div>
			                <div class="cource-item">
			                    <div class="cource-img">
			                        <img src="<?= base_url(); ?>assets/website/images/webd.jpg" alt="" />
                                    <a class="image-link" href="courses-details.html" title="University Tour 2018">
                                        <i class="fa fa-link"></i>
                                    </a>
			                        <span class="course-value">$450</span>
			                    </div>
			                    <div class="course-body">
			                    	<a href="#" class="course-category">IT</a>
			                    	<h4 class="course-title"><a href="courses-details.html">WEB DEVELOPEMENT</a></h4>
			                    	<div class="review-wrap">
			                    		<ul class="rating">
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star-half-empty"></li>
			                    		</ul>
			                    		<span class="review">39 Reviews</span>
			                    	</div>
			                    	
			                    </div>
			                    <div class="course-footer">
			                    	<div class="course-time">
			                    		<span class="label">Course Time</span>
			                    		<span class="desc">5 MONTH</span>
			                    	</div>
			                    	<div class="course-student">
			                    		<span class="label">Course Student</span>
			                    		<span class="desc">99</span>
			                    	</div>
			                    	<div class="class-duration">
			                    		<span class="label">Class Duration</span>
			                    		<span class="desc">11:30-4:00</span>
			                    	</div>
			                    </div>
			                </div>
			                 <div class="cource-item">
			                    <div class="cource-img">
			                        <img src="<?= base_url(); ?>assets/website/images/android.jpg" alt="" />
                                    <a class="image-link" href="courses-details.html" title="University Tour 2018">
                                        <i class="fa fa-link"></i>
                                    </a>
			                        <span class="course-value">$450</span>
			                    </div>
			                    <div class="course-body">
			                    	<a href="#" class="course-category">IT</a>
			                    	<h4 class="course-title"><a href="courses-details.html">ANDROID DEVELOPEMENT</a></h4>
			                    	<div class="review-wrap">
			                    		<ul class="rating">
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star-half-empty"></li>
			                    		</ul>
			                    		<span class="review">39 Reviews</span>
			                    	</div>
			                    	
			                    </div>
			                    <div class="course-footer">
			                    	<div class="course-time">
			                    		<span class="label">Course Time</span>
			                    		<span class="desc">3 MONTH</span>
			                    	</div>
			                    	<div class="course-student">
			                    		<span class="label">Course Student</span>
			                    		<span class="desc">99</span>
			                    	</div>
			                    	<div class="class-duration">
			                    		<span class="label">Class Duration</span>
			                    		<span class="desc">11:30-4:00</span>
			                    	</div>
			                    </div>
			                </div>
			                <div class="cource-item">
			                    <div class="cource-img">
			                        <img src="<?= base_url(); ?>assets/website/images/dm2.jpg" alt="" />
                                    <a class="image-link" href="courses-details.html" title="University Tour 2018">
                                        <i class="fa fa-link"></i>
                                    </a>
			                        <span class="course-value">$450</span>
			                    </div>
			                    <div class="course-body">
			                    	<a href="#" class="course-category">DIGITAL MARKETING</a>
			                    	<h4 class="course-title"><a href="courses-details.html">marketing</a></h4>
			                    	<div class="review-wrap">
			                    		<ul class="rating">
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star"></li>
			                    		    <li class="fa fa-star-half-empty"></li>
			                    		</ul>
			                    		<span class="review">22 Reviews</span>
			                    	</div>
			                    	
			                    </div>
			                    <div class="course-footer">
			                    	<div class="course-time">
			                    		<span class="label">Course Time</span>
			                    		<span class="desc">3.5 Years</span>
			                    	</div>
			                    	<div class="course-student">
			                    		<span class="label">Course Student</span>
			                    		<span class="desc">80</span>
			                    	</div>
			                    	<div class="class-duration">
			                    		<span class="label">Class Duration</span>
			                    		<span class="desc">8:30-4:00</span>
			                    	</div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
        <!-- Courses End -->
		
		<!-- Counter Up Section Start-->
        <div class="rs-counter pt-100 pb-70 bg3">
            <div class="container">
                <div class="row">
                	<div class="col-lg-6 col-md-12">
                		<div class="counter-content">
                			<h2 class="counter-title">ACHEIVEMENTS</h2>
                			<div class="counter-text">
                				<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart like mine.</p>
                			</div>
                			<div class="counter-img rs-image-effect-shine">
                				<img src="<?= base_url(); ?>assets/website/images/counter/1.jpg" alt="Counter Discussion">
                			</div>
                		</div>
                	</div>
                	<div class="col-lg-6 col-md-12 mt-80">
                		<div class="row">
		                    <div class="col-md-6">
		                        <div class="rs-counter-list">
		                            <h2 class="counter-number plus">60</h2>                  
		                            <h4 class="counter-desc">TEACHERS</h4>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                        <div class="rs-counter-list">
		                            <h2 class="counter-number plus">40</h2>
		                            <h4 class="counter-desc">COURSES</h4>
		                        </div>
		                    </div>
                		</div>
                		<div class="row">
		                    <div class="col-md-6">
		                        <div class="rs-counter-list">
		                            <h2 class="counter-number plus">900</h2>                  
		                            <h4 class="counter-desc">STUDENTS</h4>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                        <div class="rs-counter-list">
		                            <h2 class="counter-number plus">1675</h2>
		                            <h4 class="counter-desc">Satisfied Client</h4>
		                        </div>
		                    </div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
        <!-- Counter Down Section End -->

      
        
		<!-- Team Start -->
        <div id="rs-team" class="rs-team sec-color sec-spacer">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>OUR EXPERIENCED STAFFS</h2>      
                	<p>Considering desire as primary motivation for the generation of narratives is a useful concept.</p>
                </div>
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="<?= base_url(); ?>assets/website/images/team/1.jpg" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name">A SHARMA</h3>
                                <span class="subtitle">CEO</span>
							</div>
                        </div>
                        <div class="team-content">
							<div class="overly-border"></div>
                            <div class="display-table">
                                <div class="display-table-cell">
									<h3 class="team-name"><a href="teachers-single-2.html">A SHARMA</a></h3>
									<span class="team-title">CEO</span>
                                    <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
									<div class="team-social">
										<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="team-img">
                            <img src="<?= base_url(); ?>assets/website/images/team/2.jpg" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name">k v sharma</h3>
                                <span class="subtitle">A. Professor</span>
							</div>
                        </div>
                        <div class="team-content">
							<div class="overly-border"></div>
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3 class="team-name"><a href="#">k v sharma</a></h3>
                                    <span class="team-title">A. Professor</span>
                                    <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
									<div class="team-social">
										<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="team-img">
                            <img src="<?= base_url(); ?>assets/website/images/team/3.jpg" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name">Mr. Mahabub Alam</h3>
                                <span class="subtitle">Assistant Professor</span>
							</div>
                        </div>
                        <div class="team-content">
							<div class="overly-border"></div>
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3 class="team-name"><a href="#">Mr. Mahabub Alam</a></h3>
                                    <span class="team-title">Assistant Professor</span>
                                    <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
									<div class="team-social">
										<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
        <!-- Team End -->

        <!-- Calltoaction Start -->
        <div id="rs-calltoaction" class="rs-calltoaction sec-spacer bg4">
            <div class="container">
                <div class="rs-cta-inner text-center">
                    <div class="sec-title mb-50 text-center">
                        <h2 class="white-color">WEB DESIGN &amp; DEVLOPMENT COURSE</h2>      
                        <p class="white-color">Fusce sem dolor, interdum in efficitur at, faucibus nec lorem.</p>
                    </div>
				    <a class="cta-button" href="#">Join Now</a>
				</div>
            </div>
        </div>
        <!-- Calltoaction End -->

        <!-- Latest News Start -->
        <div id="rs-latest-news" class="rs-latest-news sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
                    <h2>OUR LASTEST NEWS</h2>      
                	<p>Fusce sem dolor, interdum in efficitur at, faucibus nec lorem. Sed nec molestie justo.</p>
                </div>
				<div class="row">
			        <div class="col-md-6">
						<div class="news-normal-block">
		                    <div class="news-img">
		                    	<a href="#">
		                        	<img src="<?= base_url(); ?>assets/website/images/blog/1.jpg" alt="" />
		                    	</a>
		                    </div>
	                    	<div class="news-date">
	                    		<i class="fa fa-calendar-check-o"></i>
	                    		<span>June  28,  2017</span>
	                    	</div>
	                    	<h4 class="news-title"><a href="blog-details.html">Those Other College Expenses You Aren't Thinking About</a></h4>
	                    	<div class="news-desc">
	                    		<p>
	                    			Blandit rutrum, erat et egestas ultricies, dolor tortor egestas enim, quiste rhoncus sem the purus eu sapien curabitur.Lorem Ipsum is therefore always free from repetitionetc.
	                    		</p>
	                    	</div>
	                    	<div class="news-btn">
	                    		<a href="#">Read More</a>
	                    	</div>
		                </div>
			        </div>
			        <div class="col-md-6">
			        	<div class="news-list-block">
			        		<div class="news-list-item">
			                    <div class="news-img">
			                    	<a href="#">
			                        	<img src="<?= base_url(); ?>assets/website/images/blog/2.jpg" alt="" />
			                    	</a>
			                    </div>			        			
								<div class="news-content">
			                    	<h5 class="news-title"><a href="blog-details.html">While the lovely valley team work</a></h5>
			                    	<div class="news-date">
			                    		<i class="fa fa-calendar-check-o"></i>
			                    		<span>June  28,  2017</span>
			                    	</div>
			                    	<div class="news-desc">
			                    		<p>
			                    			Excepteur sint occaecat cupidatat non proident,
			                    			sunt in culpa qui officia deserunt.
			                    		</p>
			                    	</div>
				                </div>			        			
			        		</div>
			        		<div class="news-list-item">
			                    <div class="news-img">
			                    	<a href="#">
			                        	<img src="<?= base_url(); ?>assets/website/images/blog/3.jpg" alt="" />
			                    	</a>
			                    </div>			        			
								<div class="news-content">
			                    	<h5 class="news-title"><a href="blog-details.html">I must explain to you how all this idea</a></h5>
			                    	<div class="news-date">
			                    		<i class="fa fa-calendar-check-o"></i>
			                    		<span>June  28,  2017</span>
			                    	</div>
			                    	<div class="news-desc">
			                    		<p>
			                    			Excepteur sint occaecat cupidatat non proident,
			                    			sunt in culpa qui officia deserunt.
			                    		</p>
			                    	</div>
				                </div>			        			
			        		</div>
			        		<div class="news-list-item">
			                    <div class="news-img">
			                    	<a href="#">
			                        	<img src="<?= base_url(); ?>assets/website/images/blog/4.jpg" alt="" />
			                    	</a>
			                    </div>			        			
								<div class="news-content">
			                    	<h5 class="news-title"><a href="blog-details.html">I should be incapable of drawing a stroke</a></h5>
			                    	<div class="news-date">
			                    		<i class="fa fa-calendar-check-o"></i>
			                    		<span>June  28,  2017</span>
			                    	</div>
			                    	<div class="news-desc">
			                    		<p>
			                    			Excepteur sint occaecat cupidatat non proident,
			                    			sunt in culpa qui officia deserunt.
			                    		</p>
			                    	</div>
				                </div>			        			
			        		</div>
			        	</div>
			        </div>
			    </div>
			</div>
        </div>
        <!-- Latest News End -->

		<!-- Products Start -->
        <div id="rs-products" class="rs-products sec-spacer sec-color">
			<div class="container">
				<div class="sec-title mb-50 text-center">
					<h2>OUR PUBLICATIONS</h2>      
					<p>Fusce sem dolor, interdum in efficitur at, faucibus nec lorem. Sed nec molestie justo.</p>
				</div>
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="4" data-md-device-nav="true" data-md-device-dots="true">
					<div class="product-item">
						<div class="product-img">
	                    	<a href="#">
	                        	<img src="<?= base_url(); ?>assets/website/images/B1.jpg" alt="" />
	                    	</a>
	                    </div>
                    	<h4 class="product-title"><a href="shop-details.html">Book Packages V2</a></h4>
                    	<span class="product-price">From: $85.00</span>
                    	<div class="product-btn">
                    		<a href="#">Add To Cart</a>
                    	</div>
					</div>
					<div class="product-item">
						<div class="product-img">
	                    	<a href="#">
	                        	<img src="<?= base_url(); ?>assets/website/images/B2.jpg" alt="" />
	                    	</a>
	                    </div>
                    	<h4 class="product-title"><a href="shop-details.html">Smart Tabs X18</a></h4>
                    	<span class="product-price">From: $85.00</span>
                    	<div class="product-btn">
                    		<a href="#">Add To Cart</a>
                    	</div>
					</div>
					<div class="product-item">
						<div class="product-img">
	                    	<a href="#">
	                        	<img src="<?= base_url(); ?>assets/website/images/B3.png" alt="" />
	                    	</a>
	                    </div>
                    	<h4 class="product-title"><a href="shop-details.html">Modern Bags L17</a></h4>
                    	<span class="product-price">From: $85.00</span>
                    	<div class="product-btn">
                    		<a href="#">Add To Cart</a>
                    	</div>
					</div>
					<div class="product-item">
						<div class="product-img">
	                    	<a href="#">
	                        	<img src="<?= base_url(); ?>assets/website/images/B4.jpg" alt="" />
	                    	</a>
	                    </div>
                    	<h4 class="product-title"><a href="shop-details.html">Internet CC Camera</a></h4>
                    	<span class="product-price">From: $85.00</span>
                    	<div class="product-btn">
                    		<a href="#">Add To Cart</a>
                    	</div>
					</div>
				</div>
				<div class="view-btn">
					<a href="#">VIEW  ALL</a>
				</div>
			</div>
		</div>

		<!-- Newslatter Start -->
<!--
        <div id="rs-newslatter" class="rs-newslatter sec-black sec-spacer">
            <div class="container">
                <div class="row rs-vertical-middle">
                    <div class="col-md-6">
                        <h3 class="newslatter-title">STAY CONNECTED WITH US</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <form class="newslatter-form">
                            <input type="text" class="form-input" placeholder="Enter Your Email Address">
                            <button type="submit" class="form-button">SUBSCRIBE</button>
                        </form>						
                    </div>
                </div>
            </div>
        </div>
-->

		<!-- Testimonial Start -->
        <div id="rs-testimonial" class="rs-testimonial bg5 sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
					<h2 class="white-color">WHAT PEOPLE SAYS</h2>      
					<p class="white-color">Fusce sem dolor, interdum in efficitur at, faucibus nec lorem. Sed nec molestie justo.</p>
				</div>
				<div class="row">
			        <div class="col-md-12">
						<div  class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="true" data-md-device-dots="true">
			                <div class="testimonial-item">
			                    <div class="testi-img">
			                        <img src="<?= base_url(); ?>assets/website/images/testimonial/1.jpg" alt="Jhon Smith">
			                    </div>
			                    <div class="testi-desc">
			                        <h4 class="testi-name">Luise Henrikes</h4>
			                        <p>
			                            Etiam non elit nec augue tempor gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
			                        </p>
			                    </div>
			                </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="<?= base_url(); ?>assets/website/images/testimonial/2.jpg" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="<?= base_url(); ?>assets/website/images/testimonial/3.jpg" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="<?= base_url(); ?>assets/website/images/testimonial/4.jpg" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="<?= base_url(); ?>assets/website/images/testimonial/5.jpg" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
        <!-- Testimonial End -->
		
        <!-- Partner Start -->
        <div id="rs-partner" class="rs-partner pt-70 pb-70">
            <div class="container">
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="partner-item">
                        <a href="#"><img src="<?= base_url(); ?>assets/website/images/partner/1.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="<?= base_url(); ?>assets/website/images/partner/2.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="<?= base_url(); ?>assets/website/images/partner/3.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="<?= base_url(); ?>assets/website/images/partner/4.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="<?= base_url(); ?>assets/website/images/partner/5.png" alt="Partner Image"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Partner End -->
       
        <!-- Footer Start -->
        <footer id="rs-footer" class="bg3 rs-footer">
			<div class="container">
				<!-- Footer Address -->
				<div>
					<div class="row footer-contact-desc">
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Address</h4>
								<p class="contact-desc">
									503  Old Buffalo Street<br>
									mumbai
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-phone"></i>
								<h4 class="contact-title">Phone Number</h4>
								<p class="contact-desc">
									+91753-909-6565<br>
									
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Email Address</h4>
								<p class="contact-desc">
									infoname@gmail.com<br>
									www.yourname.com
								</p>
							</div>
						</div>
					</div>					
				</div>
			</div>
			
			<!-- Footer Top -->
            <div class="footer-top" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="about-widget">
                                <!-- <img src="<?= base_url(); ?>assets/website/images/logo-footer.png" alt="Footer Logo"> -->
                                <p>We trained more than lacs student ,most of the student placed in big mnc. if you have any query please contact us.</p>
                                
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                        <h2 style="color:white">Leave Comment</h2>
                    <div id="form-messages"></div>
					<form id="contact-form" method="post" action="http://keenitsolutions.com/products/html/edulearn/edulearn-demo/mailer.php">
						<fieldset>
							<div class="row">                                      
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>First Name*</label>
										<input name="fname" id="fname" class="form-control" type="text">
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="lname" id="lname" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" id="email" class="form-control" type="email">
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Subject *</label>
										<input name="subject" id="subject" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row"> 
								<div class="col-md-12 col-sm-12">    
									<div class="form-group">
										<label>Message *</label>
										<textarea cols="40" rows="10" id="message" name="message" class="textarea form-control"></textarea>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">         
									<div class="form-group mb-0">
										<input class="btn-send" type="submit" value="Submit Now">
									</div>
								</div>
							</div>    
						</fieldset>
					</form>				
                       
                        
                    </div>
                    <div class="footer-share">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>    
                        </ul>
                    </div>                                
                </div>
            </div>
        </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <p>© 2018 <a href="#">Institute</a>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>
		
		<!-- Canvas Menu start -->
        <nav class="right_menu_togle">
        	<div class="close-btn"><span id="nav-close" class="text-center">x</span></div>
            <!-- <div class="canvas-logo">
                <a href="index-2.html"><img src="<?= base_url(); ?>assets/website/images/logo-white.png" alt="logo"></a>
            </div> -->
        	
            <div class="search-wrap"> 
                <label class="screen-reader-text">Search for:</label> 
                <input type="search" placeholder="Search..." name="s" class="search-input" value=""> 
                <button type="submit" value="Search"><i class="fa fa-search"></i></button>
            </div>
        </nav>
        <!-- Canvas Menu end -->
        
        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="eg: Computer Technology" type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->
        <!-- Modal -->
<div id="loginmodal" class="modal fade modal-wide" role="dialog" >
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       <div class="row">
       	<div class="col-md-3 box"><div class="boxtext"><a href="<?= base_url(); ?>index.php/institute/LoginController/admin_login">Admin Login</a></div></div>
       	<div class="col-md-3 box"><div class="boxtext"><a href="<?= base_url(); ?>index.php/institute/LoginController/teacher_login"">Teacher Login</a></div></div>
       	<div class="col-md-3 box"><div class="boxtext"><a href="<?= base_url(); ?>index.php/institute/LoginController/student_login"">Student Login</a></div></div>
   		</div>
      </div>
      
    </div>

  </div>
</div>
        
       
        
        <!-- modernizr js -->
        <script src="<?= base_url(); ?>assets/website/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="<?= base_url(); ?>assets/website/js/jquery.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?= base_url(); ?>assets/website/js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="<?= base_url(); ?>assets/website/js/owl.carousel.min.js"></script>
		<!-- slick.min js -->
        <script src="<?= base_url(); ?>assets/website/js/slick.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="<?= base_url(); ?>assets/website/js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="<?= base_url(); ?>assets/website/js/jsloaded.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="<?= base_url(); ?>assets/website/js/wow.min.js"></script>
        <!-- counter top js -->
        <script src="<?= base_url(); ?>assets/website/js/waypoints.min.js"></script>
        <script src="<?= base_url(); ?>assets/website/js/jquery.counterup.min.js"></script>
        <!-- magnific popup -->
        <script src="<?= base_url(); ?>assets/website/js/jquery.magnific-popup.min.js"></script>
        <!-- rsmenu js -->
        <script src="<?= base_url(); ?>assets/website/js/rsmenu-main.js"></script>
        <!-- plugins js -->
        <script src="<?= base_url(); ?>assets/website/js/plugins.js"></script>
        <!-- Switch js -->
        <script src="<?= base_url(); ?>assets/website/js/color-style.js"></script>
		 <!-- main js -->
        <script src="<?= base_url(); ?>assets/website/js/main.js"></script>
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/OUR INSTITUTE/OUR INSTITUTE-demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 09:37:07 GMT -->
</html>