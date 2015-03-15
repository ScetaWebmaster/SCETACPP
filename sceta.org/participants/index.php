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

		<title>SCETA - Event Participants</title>

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

		<!-- Loading Animation -->
		<script>
			$(window).load(function() {
				// Animate the loader off screen.
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
	</head>

	<body>
		<div class="se-pre-con"></div>

		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../inc/sceta.org/header_1.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<?php include '../../inc/sceta.org/sidemenu_events_participants.php'; ?>
						</div>

						<div class="col span_3_of_4">
							<h4>Event Participants</h4>
							<p>
								If you are interested in participating into an event, it is important to confirm your registration. Below are the list of
								upcoming events where you can view the current list of participants.
							</p>

							<p>
								Participants are listed in alphabetical order for each event. However, when the event is limited and there are more people signed up
								than our maximum capacity, we will display the participants in the order that we receive signups to display each individual's
								position in the list.
							</p>

							<p>
								To avoid confusion the following legend will be used to indicate the status:
								<ul>
									<li>*** = Sorted by Time of Submission</li>
									<li>No Indication = Alphabetical Order</li>
								</ul>
							</p>

							<h4>Event Participant List</h4>
							<img id="list" src="../img/ic_loading.gif">
							<script id="gDriveFeed" src="../js/googleDriveFeed_eventParticipants.js">
								{
									"NumEvents" : 3,

									"Name[0]" : "GRID Alternatives Solar Spring Break 2015",
									"Date[0]" : "03/23/15",
									"TimeSorted[0]" : "true",
									"ID[0]" : "111xRKeXjdcVf40NtMENaKshJXXp_3F30pTqROTgvUYY",

									"Name[1]" : "Show Taping Social/Fundraiser",
									"Date[1]" : "03/26/15",
									"TimeSorted[1]" : "false",
									"ID[1]" : "1hz2opQvTvV9-PdvZB2OtQV1yrNdrPWEpJX2u92pg2IA",

									"Name[2]" : "Power Supply Workshop",
									"Date[2]" : "04/11/15",
									"TimeSorted[2]" : "true",
									"ID[2]" : "1dNxxQjVXiLzumG2lYV8ap9rlO5W1HH6FO-smPzPl8Xo"
								}
							</script>
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