<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DO>
<head>
<title>Mentors a Education Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href={{ URL::asset("KidzQuiApp/resources/assets/css/bootstrap.css") }} type="text/css" rel="stylesheet" media="all">
<link href={{ URL::asset("KidzQuiApp/resources/assets/css/style.css") }} type="text/css" rel="stylesheet" media="all">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content; charset=utf-8" />
<meta name="keywords" content="Mentors Responsive Web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web template, 
Smartphone Compatible Web template, free Webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola Web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<link rel="stylesheet" href={{ URL::asset("KidzQuiApp/resources/assets/css/flexslider.css") }} type="text/css" media="screen" />
<!-- js -->
<script src={{ URL::asset("KidzQuiApp/resources/assets/js/jquery-1.11.1.min.js") }}></script> 
<script src={{ URL::asset("KidzQuiApp/resources/assets/js/bootstrap.js") }}> </script>
<!-- //js -->	
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
<!--/fonts-->
<!--JS for animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
	<!--//end-animate-->

</head>
<body>
	<!--banner-->
	<div class="banner">
		<!--header-->
		<div class="header">		
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"> </span>
								<span class="icon-bar"> </span>
								<span class="icon-bar"> </span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right wow fadeInLeft animated" data-wow-delay=".5s">
								<li><a href="studenthome" class="active">Home</a></li>
								<li><a href="admission" >Admission</a></li>
								<li><a href="staff" >Staff</a></li>
								<li><a href="shortcodes" >Short Codes</a></li>
								<li><a href="contact" >Contact</a></li>
							</ul>		
						</div>	
				</nav>	
				<div class="logo">
					<a class="navbar-brand" href="studenthome">Mentors</a>
				</div>
				
				<div class="search-bar wow fadeInRight animated" data-wow-delay=".5s">
					<form action="#" method="post">
						<input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"> </div>			
		</div>
		<!--//header-->
		<div class="container">
			<div class="banner-info">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="banner-info1">
									<h1>A Place Of Light,<br> <span> Of Liberty,and Learning</span></h1>
									<p>Many desktop publishing packages and Web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many</p>
									
								</div>
							</li>
							<li>
								<div class="banner-info1">
									<h1>Our Task is <br> <span> Creation Of Future</span></h1>
									<p>Many desktop publishing packages and Web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many</p>
									
								</div>
							</li>
							<li>
								<div class="banner-info1">
									<h1>Developing Your <br>  <span> Strong Points</span></h1>
									<p>Many desktop publishing packages and Web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many</p>
									
								</div>
							</li>
						</ul>
					</div>
				</section>
			
							<!-- FlexSlider -->
									  <script defer="" src="js/jquery.flexslider.js"></script>
									  <script type="text/javascript">
										$(function(){
										 
										});
										$(window).load(function(){
										  $('.flexslider').flexslider({
											animation: "slide",
											start: function(slider){
											  $('body').removeClass('loading');
											}
										  });
										});
									  </script>
								<!-- FlexSlider -->
			</div>
		</div>
	</div>
	<!--//banner-->
<!--students-->
	<div class="students">
		<div class="col-md-8 students-left wow fadeInLeft animated" data-wow-delay=".5s">
			<h2>Science and Research</h2>
			<h3>We are among the leading research</h3>
			<p>Many desktop publishing packages and Web page editors now use Lorem Ipsum  Ipsum as their default model text now use Lorem Ipsum as their default model text, packages and Web page editors now use Lorem Ipsum now use Lorem Ipsum as their default model text, and a as their default model text, lorem ipsum' will uncover many</p>
		</div>
		<div class="col-md-4 students-right wow fadeInRight animated" data-wow-delay=".5s">
			<ul>
				<li><div class="history-grid-image">
						<img src="images/t10.jpg" class="img-responsive zoom-img" alt="">
					</div></li>
				<li><div class="history-grid-image">
						<img src="images/t11.jpg" class="img-responsive zoom-img" alt="">
					</div></li>
				<li><div class="history-grid-image">
						<img src="images/t12.jpg" class="img-responsive zoom-img" alt="">
					</div></li>
				<li><div class="history-grid-image">
						<img src="images/t13.jpg" class="img-responsive zoom-img" alt="">
					</div></li>
			</ul>
		</div>
			<div class="clearfix"></div>
	</div>
<!--//students-->
<!--best-->
	<div class="best">
		<div class="container">
			<div class="col-md-6 best-left wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>Latest News</h3>
				<div class="bes-top">
					<div class="bes-lft">
						<div class="history-grid-image">
						<img src="images/t8.jpg" class="img-responsive zoom-img" alt="">
					</div>
					</div>
					<div class="bes-rgt">
						<h4><a href="singlepage">Lorem ipsum dolor sit</a></h4>
						<h5>Monday, 13 September 2015</h5>
						<p>Consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
					</div>
						<div class="clearfix"></div>
				</div>
				<div class="bes-top1">
					<div class="bes-lft">
						<div class="history-grid-image">
						<img src="images/t9.jpg" class="img-responsive zoom-img" alt="">
					</div>
					</div>
					<div class="bes-rgt">
						<h4><a href="singlepage">Lorem ipsum dolor sit</a></h4>
						<h5>Monday, 13 September 2015</h5>
						<p>Consectetuer adi piscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
					</div>
						<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-6 best-left wow fadeInRight animated" data-wow-delay=".5s">
				<h3>Our Best Students</h3>
				<p>Lorem ipsum dolor sit amet, consectetu er adipiscing elit, sed diam nonummy nibh eu ismod tincidunt ut laoreetd.</p>
				<div class="bes-top">
					<ul>
						<li><div class="history-grid-image">
						<img src="images/t1.jpg" class="img-responsive zoom-img" alt="">
					</div>
						<h6><a href="singlepage">Sarah Nilson</a></h6>
						<h5>2016</h5></li>
						<li><div class="history-grid-image">
						<img src="images/t2.jpg" class="img-responsive zoom-img" alt="">
					</div>
						<h6><a href="singlepage">JessicaMcQuay</a></h6>
						<h5>2015</h5></li>
						<li><div class="history-grid-image">
						<img src="images/t3.jpg" class="img-responsive zoom-img" alt="">
					</div>
						<h6><a href="singlepage">Neil Johnson</a></h6>
						<h5>2014</h5></li>
					</ul>
				</div>
			</div>
				<div class="clearfix"></div>
		</div>
	</div>
<!--best-->
<!--course-->
	<div class="course">
		<div class="container">
			<div class="col-md-4 course-left wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>Why Join Us</h3>
				<div class="history-grid-image">
						<img src="images/n2.jpg" class="img-responsive zoom-img" alt="">
					</div>
				<p>Lorem ipsum dolor sit amet, consectetu er adipiscing elit, sed diam nonummy nibh eu ismod tincidunt ut laoreetd.</p>
			</div>
			<div class="col-md-4 course-left animated wow fadeInUp animated animated" data-wow-duration="1200ms" data-wow-delay="500ms">
				<h3>Affordable</h3>
				<div class="history-grid-image">
						<img src="images/n3.jpg" class="img-responsive zoom-img" alt="">
					</div>
				<p>Lorem ipsum dolor sit amet, consectetu er adipiscing elit, sed diam nonummy nibh eu ismod tincidunt ut laoreetd.</p>
			</div>
			<div class="col-md-4 course-left wow fadeInRight animated" data-wow-delay=".5s">
					<h3>All Courses</h3>
					<ul>
						<li><a href="singlepage"><span></span>Lorem ipsum dolor sit</a></li>
						<li><a href="singlepage"><span></span>Amet consectetuer </a></li>
						<li><a href="singlepage"><span></span>Diam nonummy nibh</a></li>
						<li><a href="singlepage"><span></span>Euismod tincidunt ut </a></li>
						<li><a href="singlepage"><span></span>Magna aliquam erat</a></li>
						<li><a href="singlepage"><span></span>Volutpat ut wisi enim</a></li>
						<li><a href="singlepage"><span></span>Diam nonummy nibh</a></li>
						<li><a href="singlepage"><span></span>Magna aliquam erat</a></li>
					</ul>
					<p>Lorem ipsum dolor sit amet, consectetu er adipiscing elit, sed diam nonummy nibh eu ismod tincidunt ut laoreetd.</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!--course-->
<!--semst-->
	<div class="semst">
		<div class="container">
			<div class="col-md-7 semst-left wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>Semester's best teachers</h3>
				<ul>
					<li>
						<div class="history-grid-image">
						<img src="images/t4.jpg" class="img-responsive zoom-img" alt="">
					</div>
						<p>Lorem ipsum dolor sit amet, consectetu er elit.</p>
					</li>
					<li>
						<div class="history-grid-image">
						<img src="images/t5.jpg" class="img-responsive zoom-img" alt="">
					</div>
						<p>Consectetu er adipiscing elit, sed diam nonummy.</p>
					</li>
					<li>
						<div class="history-grid-image">
						<img src="images/t6.jpg" class="img-responsive zoom-img" alt="">
					</div>
						<p>Sed diam nonummy nibh eu ismod tincidunt ut.</p>
					</li>
				</ul>
			</div>
			<div class="col-md-5 semst-right wow fadeInRight animated" data-wow-delay=".5s">
				<h3>NewsLetter</h3>
				<form action="#" method="post">
					<input type="text" name="search" value="Enter Your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your email';}">
					<input type="submit" value="Subscribe">
				</form>
			</div>
				<div class="clearfix"></div>
		</div>
	</div>
<!--semst-->
<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 footer-left wow fadeInLeft animated" data-wow-delay=".5s">
				<h4>Snippet</h4>
				<p>Sed diam nonummy nibh eu ismod tincidunt ut laoreetd.sed diam nonummy .</p>
			</div>
			<div class="col-md-3 footer-left wow fadeInLeft animated" data-wow-delay=".5s">
				<h4>Features</h4>
				<ul>
					<li><a href="singlepag">Sed diam eu</a></li>
					<li><a href="singlepag">Ismod tincidunt </a></li>
					<li><a href="singlepag">Tincidunt ut </a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-left wow fadeInRight animated" data-wow-delay=".5s">
				<h4>Quick Links</h4>
				<ul>
					<li><a href="singlepag">Ismod tincidunt </a></li>
					<li><a href="singlepag">Tincidunt ut </a></li>
					<li><a href="singlepag">Sed diam eu</a></li>
				</ul>
			</div>
			<div class="col-md-3 soci wow fadeInRight animated" data-wow-delay=".5s">
				<h4>Follow Us</h4>
				<ul>
					<li><a href="#"><i class="f-1"> </i></a></li>
					<li><a href="#"><i class="t-1"> </i></a></li>
					<li><a href="#"><i class="g-1"> </i></a></li>
				</ul>
			</div>
				<div class="clearfix"></div>
			<div class="copy animated wow fadeInUp animated animated" data-wow-duration="1200ms" data-wow-delay="500ms">
				<p>© 2016 Mentors . All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			</div>
		</div>
	</diV>
<!--footer-->		
</b>