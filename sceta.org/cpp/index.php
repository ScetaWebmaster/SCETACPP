<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->

<html class="no-js">
	<head>
		<meta charset="utf-8">

		<!-- Always Force Latest IE Rendering Engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>SCETA - Cal Poly Pomona Events</title>

		<meta name="description" content="SCETA (Southern California Engineering Technologists Association) has been networking with engineering alumni who have been working in the engineering field since 1983. SCETA is an association of students interested in life-long learning and the sharing of knowledge among the various engineering disciplines. One of our goals is to establish a social network for current/future students and alumni.">
		<meta name="keywords" content="SCETA, engineering, technology, networking">
		<meta name="author" content="www.sceta.org">
		<meta http-equiv="cleartype" content="on">

		<link rel="shortcut icon" href="../img/favicon.ico">

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../css/html5reset.css" media="all">
		<link rel="stylesheet" href="../css/style.css" media="all">
		<link rel="stylesheet" href="../css/col.css" media="all">
		<link rel="stylesheet" href="../css/4cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>	 

		<!-- Smooth Scroll -->
		<script src="../js/smoothScroll.js"></script>
	</head>

	<body>
		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../inc/header_1.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<?php include '../inc/sidemenu_events_cpp.php'; ?>
						</div>

						<div class="col span_3_of_4">
							<h4>Cal Poly Pomona Events</h4>
							<p>
								In a continued effort to make the SCETA website a central resource, key events for Cal Poly Pomona, such as registration and fees, 
								have been added here for the convenience of our student members.
							</p>

							<h4>Upcoming CPP Events</h4>
							<ul id="upcomingEvents">
								<li><img src="../img/ic_loading.gif"><br><br></li>
								<li></li>
							</ul>
							<script id="gCalFeed" src="../js/googleCalendarFeed_upcomingEvents.js">
								{
									"ID" : "p50g59pm4162ckfo144ka5ssts@group.calendar.google.com",
									"noneMessage" : "CPP events"
								}
							</script>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include '../inc/footer_main_1.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="../js/top.js"></script>
	</body>
</html>