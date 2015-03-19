<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->

<html class="no-js">
	<head>
		<meta charset="UTF-8">

		<!-- Always Force Latest IE Rendering Engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>SCETA - Southern California Engineering Technologists Association</title>

		<meta name="description" content="SCETA (Southern California Engineering Technologists Association) has been networking with engineering alumni who have been working in the engineering field since 1983. SCETA is an association of students interested in life-long learning and the sharing of knowledge among the various engineering disciplines. One of our goals is to establish a social network for current/future students and alumni.">
		<meta name="keywords" content="SCETA, engineering, technology, networking">
		<meta name="author" content="www.sceta.org">
		<meta http-equiv="cleartype" content="on">

		<link rel="shortcut icon" href="img/favicon.ico">

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="css/html5reset.css" media="all">
		<link rel="stylesheet" href="css/style.css" media="all">
		<link rel="stylesheet" href="css/col.css" media="all">
		<link rel="stylesheet" href="css/2cols.css" media="all">
		<link rel="stylesheet" href="css/3cols.css" media="all">
		<link rel="stylesheet" href="css/6cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

		<!-- Slideshow -->
		<script src="js/jssor.js"></script>

		<!-- Smooth Scroll -->
		<script src="js/smoothScroll.js"></script>
	</head>

	<body>
		<!-- Facebook Like Box -->
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
	  			var js, fjs = d.getElementsByTagName(s)[0];
		  		if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1537133783197114&version=v2.0";
				fjs.parentNode.insertBefore(js, fjs);
			}
			(document, 'script', 'facebook-jssdk'));
		</script>

		<a name="top"></a>

		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../inc/sceta.org/header_0.php'; ?>
			
			<!-- Top Row of Main Content -->
			<div id="mainbarcontainer">
				<div id="mainbarcontent">
					<div class="section group">
						<!--Jssor Recent News -->
						<div class="col span_1_of_2">
							<h4>Recent News</h4>
							<div id="sliderb_container" style="position: relative; width: 600px; height: 450px; overflow: hidden;">
								<div u="loading" style="position: absolute; top: 0px; left: 0px;">
									<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
										background-color: #000; top: 0px; left: 0px; width: 100%; height: 100%;">
									</div>
									<div style="position: absolute; display: block; background: url(img/ic_loading.gif) no-repeat center center;
										top: 0px; left: 0px; width: 100%; height: 100%;">
									</div>
								</div>
								<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 450px; overflow: hidden;">
									<div>
										<img u="image" src="img/news/201411_calendar-feeds-fixed_home.jpg">
										<div u="thumb"><a href="news/2014/11/calendar-feeds-fixed/">Calendar Feeds Fixed</a></div>
									</div>
									<div>
										<img u="image" src="http://www.verotechsolutions.net/images/118a1c4.jpg">
										<div u="thumb"><a href="news/2014/11/jobs-and-scholarships/">Jobs and Scholarships</a></div>
									</div>
									<div>
										<img u="image" src="img/news/201409_new-sceta-website_home.jpg">
										<div u="thumb"><a href="news/2014/09/new-sceta-website/">The Newly Redesigned SCETA Website</a></div>
									</div>
								</div>
								<div u="thumbnavigator" class="sliderb-T" style="position: absolute; bottom: 0px; left: 0px; height: 45px; width: 600px;">
									<div style="filter: alpha(opacity=40); opacity: 0.4; position: absolute; display: block; background-color: #000000;
										top: 0px; left: 0px; width: 100%; height: 100%;">
									</div>
									<div u="slides">
										<div u="prototype" style="position: absolute; width: 600px; height: 45px; top: 0; left: 0;">
											<thumbnailtemplate style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;
												font-family: verdana; font-weight: normal; color: #fff; line-height: 45px; font-size: 20px; padding-left: 10px;">
											</thumbnailtemplate>
										</div>
									</div>
								</div>
								<div u="navigator" class="jssorb01" style="position: absolute; bottom: 16px; right: 10px;">
									<div u="prototype" style="position: absolute; width: 12px; height: 12px;"></div>
								</div>
								<span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 123px; left: 8px;"></span>
								<span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 123px; right: 8px"></span>
								<script>
									jssor_sliderb_starter('sliderb_container');
								</script>
							</div>
							<br><a href="news/" id="more"><img src="img/ic_right-arrow.png"> View All News</a>
						</div>

						<div class="col span_1_of_2">
							<!-- Next Meeting -->
							<h4>Next Meeting</h4>
							<ul id="nextMeeting">
								<li><img src="img/ic_loading.gif"><br><br></li>
								<li></li>
							</ul>
							<script src="js/googleCalendarFeed_nextMeeting.js"></script>

							<!-- Live Minimal Feed of Upcoming Events -->
							<h4>Upcoming Events</h4>
							<ul id="upcomingEvents">
								<li><img src="img/ic_loading.gif"><br><br></li>
								<li></li>
							</ul>
							<script src="js/googleCalendarFeed_upcomingEvents_home.js"></script>
							<a href="calendar/" id="more"><img src="img/ic_right-arrow.png"> View the Full Calendar</a><br><br>
						</div>
					</div>
				</div>
			</div>

			<!-- What's Happening w/ Social Media -->
			<div id="happeningcontentcontainer">
				<div id="happeningcontent">
					<div class="section group">
					<h3>What's Happening</h3>
					</div>

					<div class="section group">
						<!-- Facebook Activity Like Box -->
						<div class="col span_1_of_3 facebookBox">
							<div class="fb-like-box" data-href="https://www.facebook.com/SCETA" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div>
						</div>

						<!-- Twitter Widget -->
						<div class="col span_1_of_3">
							<a class="twitter-timeline"  href="https://twitter.com/Scetacpp" data-widget-id="469397033132888064">Tweets by @Scetacpp</a>
            				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>

						<!-- Instansive Instagram Widget -->
						<div class="col span_1_of_3">
							<script src="http://instansive.com/widget/js/instansive.js"></script>
							<iframe src="http://instansive.com/widgets/O956333a566b1da6e159872cd5a260e5.html" scrolling="no" allowtransparency="true" class="instansive-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
							<style>
								.ig-b- { display: inline-block; }
								.ig-b- img { visibility: hidden; }
								.ig-b-:hover { background-position: 0 -60px; } 
								.ig-b-:active { background-position: 0 -120px; }
								.ig-b-v-24 { 
									width: 137px; 
									height: 24px; 
									background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; 
								}
								@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
									.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } 
								}
							</style>
							<div style="text-align: center;">
								<a href="http://instagram.com/scetacpp?ref=badge" target="_blank" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram"/></a>
							</div>
						</div>
					</div>
				</div> 
			</div>

			<!-- Website Footer -->
			<?php include '../inc/sceta.org/footer_home.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="js/top.js"></script>
	</body>
</html>