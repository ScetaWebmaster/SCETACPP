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

		<title>SCETA</title>

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

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../inc/sceta.org/js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>

	<body class="cbp-spmenu-push">
		<!-- Back to Top -->
		<a name="top"></a>

		<?php include '../inc/sceta.org/header_home.php'; ?>

		<div class="fullscreen background" id="background" style="background-image:url('img/header/home_fullscreen.jpg');" data-img-width="1920" data-img-height="1200">
			<div class="content-a">
				<div class="content-b">
					<h1>A Better Future with Better Engineers</h1>
					<a href="about/" class="button">Learn More</a>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="container">
				<div class="content">
					<div class="section group" id="home_info">
						<div class="col span_1_of_2 center">
							<h2>Next Meeting</h2><br>

							<div id="gcal_nextMeeting">
								<img src="img/ic_loading.gif">
								<script src="../inc/sceta.org/js/googleCalendar_nextMeeting.js"></script>
							</div>

							<br>
						</div>

						<div class="col span_1_of_2 center">
							<h2>Upcoming Events</h2><br>

							<div class="section group" id="gcal_upcomingEvents">
								<img src="img/ic_loading.gif">
								<script src="../inc/sceta.org/js/googleCalendar_upcomingEvents.js"></script>
							</div>

							<div id="calendar_link">
								<a href="events#calendar"><img src="img/ic_right-arrow.png"> View the Full Calendar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="not-fullscreen background" id="background2" style="background-image:url('img/header/home_news.jpg');" data-img-width="1400" data-img-height="933">
			<div class="content-a">
				<div class="content-b">
					<h1>Keep Up with SCETA</h1>
					<a href="http://blog.sceta.org" class="button" target="_blank">Visit Blog</a>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<?php include '../inc/sceta.org/footer_home.php'; ?>
		</div>

		<?php include '../inc/sceta.org/commonScripts_home.php'; ?>
	</body>
</html>