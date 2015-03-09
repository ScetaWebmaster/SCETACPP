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

		<title>SCETA - Meetings</title>

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
		<link rel="stylesheet" href="../css/3cols.css" media="all">
		<link rel="stylesheet" href="../css/4cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary. -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../js/jquery-1.7.2.min.js"><\/script>')</script>

		<!-- Smooth Scroll -->
		<script src="../js/smoothScroll.js"></script>
	</head>

	<body>
		<a name="top"></a>

		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../inc/sceta.org/header_1.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<?php include '../../inc/sceta.org/sidemenu_members_meetings_1.php'; ?>
						</div>

						<div class="col span_3_of_4">
							<h4>Meetings</h4>
							<p>
								We understand that as adults, our schedules will not always work out with our meeting times. SCETA will help keep you up-to-date
								by posting all of our meeting powerpoints onto this page as soon as it is available.
							</p>

							<h4>Upcoming General Meetings</h4>
							<ul id="upcomingEvents">
								<li><img src="../img/ic_loading.gif"><br><br></li>
								<li></li>
							</ul>
							<script id="gCalFeed" src="../js/googleCalendarFeed_upcomingEvents.js">
								{
									"ID" : "g9f3b14mrjrhbt22icvlfpe8eo@group.calendar.google.com",
									"noneMessage" : "general meetings"
								}
							</script>

							<h4>PowerPoints</h4>
							<p>
								<ul>
									<li><a href="javascript:void(0);" id="btn_meetings_winter2015">2015 - Winter</a>
										<ul class="meetings_winter2015">
											<li><a href="2015/02/26/">Meeting 4 - 02/26/15</a></li>
											<li><a href="2015/02/12/">Meeting 3 - 02/12/15</a></li>
											<li><a href="2015/01/29/">Meeting 2 - 01/29/15</a></li>
											<li><a href="2015/01/15/">Meeting 1 - 01/15/15</a></li>
										</ul>
									</li>
									<li><a href="javascript:void(0);" id="btn_meetings_fall2014">2014 - Fall</a>
										<ul class="meetings_fall2014">
											<li><a href="2014/12/04/">Meeting 5 - 12/04/14</a></li>
											<li><a href="2014/11/20/">Meeting 4 - 11/20/14</a></li>
											<li><a href="2014/11/06/">Meeting 3 - 11/06/14</a></li>
											<li><a href="2014/10/23/">Meeting 2 - 10/23/14</a></li>
											<li><a href="2014/10/09/">Meeting 1 - 10/09/14</a></li>
										</ul>
									</li>
								</ul>
							</p>

							<p>
								[<a href="javascript:void(0);" id="btn_showMeetings">Show All</a>] / [<a href="javascript:void(0);" id="btn_hideMeetings">Hide All</a>]
							</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include '../../inc/sceta.org/footer_main_1.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="../js/top.js"></script>
	</body>
</html>