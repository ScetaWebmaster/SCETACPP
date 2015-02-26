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
							<?php include '../inc/sidemenu_events_participants.php'; ?>
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
							<!--
							<p>
								There are no upcoming events with participants to list. Please stay tuned for any future announcements.
							</p>
						-->

						    <ul>
						    	<li><a href="javascript:void(0);" id="btn_event1">Opto22 Tour (03/06/15) ***</a></li>
						    	<li><a href="javascript:void(0);" id="btn_event2">GRID Alternatives Solar Spring Break 2015 (03/23/15) ***</a></li>
						    	<li><a href="javascript:void(0);" id="btn_event3">Show Taping Social/Fundraiser (03/27/15)</a></li>
						    	<li><a href="javascript:void(0);" id="btn_event4">Power Supply Workshop (TBA) ***</a></li>
						    </ul>

						    <p>
								[<a href="javascript:void(0);" id="btn_showEvents">Show All</a>] / [<a href="javascript:void(0);" id="btn_hideEvents">Hide All</a>]
							</p>

							<h4 class="event1">Opto22 Tour (03/06/15) ***</h4>
							<ol class="event1">
								<li style="list-style: none;"><img src="../img/ic_loading.gif"></li>
								<script>
									jQuery(function() {
										// Get the list of upcoming events formatted in JSON.
										jQuery.getJSON("https://spreadsheets.google.com/feeds/list/10MMe2cNRkBYwon72T4GC6LzZl7foiepxBNwtvRH1Mmo/1/public/values?alt=json&prettyprint=true", function(data) {
											// Utility method to pad a string on the left.
											// Source: http://sajjadhossain.com/2008/10/31/javascript-string-trimming-and-padding/.
											function lpad(str, pad_string, length) {
												var str = new String(str);
												while (str.length < length)
													str = pad_string + str;
												return str;
											};

											// Convert the day integer to its string value.
											function dayToString(day) {
												var days = ["Sun.", "Mon.", "Tues.", "Wed.", "Thurs.", "Fri.", "Sat."];
												return days[day];
											};

											// Convert the month integer to its string value. Keep note that months are listed starting from 0 - 11.
											function monthToString(month) {
												var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
												return months[month];
											};

											var date = '';
											var time = '';

											if (data.feed.entry == null) {
												jQuery(".event1 li").first().hide();
												jQuery(".event1 li").last().before(
													"There is no available list of participants. Please stay tuned for any future announcements."
												);
											}

											else {
												// Parse and render each event.
												jQuery.each(data.feed.entry, function(i, item) {
													// If there is at least 1 participant, then hide the "no participants" message.
													if (i == 0) {
														jQuery(".event1 li").first().hide();
													};

													// Retrieve the event title & its link.
													var event_header = item.gsx$name.$t;

													// Retrieve the raw date of the last update and format it.
													var rawDate = new Date(item.updated.$t);
													date = dayToString(rawDate.getDay()) + ", " + monthToString(rawDate.getMonth()) + " " + rawDate.getDate() + ", " + rawDate.getFullYear();

													// Retrieve the time and reformat it to AM/PM format.
													time = '';
													var hour = rawDate.getHours();
													var hour_ampm = 'AM';

													// Convert to 12-hour time format and change the AMPM tag to "PM".
													if (hour > 12) {
														hour = hour - 12;
														hour_ampm = 'PM';
													};

													// Except for 12:00 PM. 12:00 PM will have to be changed to PM manually.
													if (hour == 12) {
														hour_ampm = 'PM';
													}

													// Pad the minutes with 0s if it's less than 2 digits.
													var min = lpad(rawDate.getMinutes(), '0', 2);

													// Put together all the time formats.
													time = hour + ":" + min + " " + hour_ampm;

													// Render the event.
													jQuery(".event1 li").last().before(
														"<li>" + event_header + "</li>"
													);
												});

												jQuery(".event1 li").first().before(
													"<p style='margin-left: -24px;'>Last Updated: " + date + " at " + time + "</p>"
												);
											}
										});
									});
								</script>
							</ol>

							<h4 class="event2">GRID Alternatives Solar Spring Break 2015 (03/23/15) ***</h4>
							<ol class="event2">
								<li style="list-style: none;"><img src="../img/ic_loading.gif"></li>
								<script>
									jQuery(function() {
										// Get the list of upcoming events formatted in JSON.
										jQuery.getJSON("https://spreadsheets.google.com/feeds/list/111xRKeXjdcVf40NtMENaKshJXXp_3F30pTqROTgvUYY/1/public/values?alt=json&prettyprint=true", function(data) {
											// Utility method to pad a string on the left.
											// Source: http://sajjadhossain.com/2008/10/31/javascript-string-trimming-and-padding/.
											function lpad(str, pad_string, length) {
												var str = new String(str);
												while (str.length < length)
													str = pad_string + str;
												return str;
											};

											// Convert the day integer to its string value.
											function dayToString(day) {
												var days = ["Sun.", "Mon.", "Tues.", "Wed.", "Thurs.", "Fri.", "Sat."];
												return days[day];
											};

											// Convert the month integer to its string value. Keep note that months are listed starting from 0 - 11.
											function monthToString(month) {
												var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
												return months[month];
											};

											var date = '';
											var time = '';

											if (data.feed.entry == null) {
												jQuery(".event2 li").first().hide();
												jQuery(".event2 li").last().before(
													"There is no available list of participants. Please stay tuned for any future announcements."
												);
											}

											else {
												// Parse and render each event.
												jQuery.each(data.feed.entry, function(i, item) {
													// If there is at least 1 participant, then hide the "no participants" message.
													if (i == 0) {
														jQuery(".event2 li").first().hide();
													};

													// Retrieve the event title & its link.
													var event_header = item.gsx$name.$t;

													// Retrieve the raw date of the last update and format it.
													var rawDate = new Date(item.updated.$t);
													date = dayToString(rawDate.getDay()) + ", " + monthToString(rawDate.getMonth()) + " " + rawDate.getDate() + ", " + rawDate.getFullYear();

													// Retrieve the time and reformat it to AM/PM format.
													time = '';
													var hour = rawDate.getHours();
													var hour_ampm = 'AM';

													// Convert to 12-hour time format and change the AMPM tag to "PM".
													if (hour > 12) {
														hour = hour - 12;
														hour_ampm = 'PM';
													};

													// Except for 12:00 PM. 12:00 PM will have to be changed to PM manually.
													if (hour == 12) {
														hour_ampm = 'PM';
													}

													// Pad the minutes with 0s if it's less than 2 digits.
													var min = lpad(rawDate.getMinutes(), '0', 2);

													// Put together all the time formats.
													time = hour + ":" + min + " " + hour_ampm;

													// Render the event.
													jQuery(".event2 li").last().before(
														"<li>" + event_header + "</li>"
													);
												});

												jQuery(".event2 li").first().before(
													"<p style='margin-left: -24px;'>Last Updated: " + date + " at " + time + "</p>"
												);
											}
										});
									});
								</script>
							</ol>

							<h4 class="event3">Show Taping Social/Fundraiser (03/27/15)</h4>
							<ol class="event3">
								<li style="list-style: none;"><img src="../img/ic_loading.gif"></li>
								<script>
									jQuery(function() {
										// Get the list of upcoming events formatted in JSON.
										jQuery.getJSON("https://spreadsheets.google.com/feeds/list/1VA2hrXi8PsNs22poTfogNCAgvPv2hFqZf_WtiezkXF4/1/public/values?alt=json&prettyprint=true", function(data) {
											// Utility method to pad a string on the left.
											// Source: http://sajjadhossain.com/2008/10/31/javascript-string-trimming-and-padding/.
											function lpad(str, pad_string, length) {
												var str = new String(str);
												while (str.length < length)
													str = pad_string + str;
												return str;
											};

											// Convert the day integer to its string value.
											function dayToString(day) {
												var days = ["Sun.", "Mon.", "Tues.", "Wed.", "Thurs.", "Fri.", "Sat."];
												return days[day];
											};

											// Convert the month integer to its string value. Keep note that months are listed starting from 0 - 11.
											function monthToString(month) {
												var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
												return months[month];
											};

											var date = '';
											var time = '';

											if (data.feed.entry == null) {
												jQuery(".event3 li").first().hide();
												jQuery(".event3 li").last().before(
													"There is no available list of participants. Please stay tuned for any future announcements."
												);
											}

											else {
												// Parse and render each event.
												jQuery.each(data.feed.entry, function(i, item) {
													// If there is at least 1 participant, then hide the "no participants" message.
													if (i == 0) {
														jQuery(".event3 li").first().hide();
													};

													// Retrieve the event title & its link.
													var event_header = item.gsx$name.$t;

													// Retrieve the raw date of the last update and format it.
													var rawDate = new Date(item.updated.$t);
													date = dayToString(rawDate.getDay()) + ", " + monthToString(rawDate.getMonth()) + " " + rawDate.getDate() + ", " + rawDate.getFullYear();

													// Retrieve the time and reformat it to AM/PM format.
													time = '';
													var hour = rawDate.getHours();
													var hour_ampm = 'AM';

													// Convert to 12-hour time format and change the AMPM tag to "PM".
													if (hour > 12) {
														hour = hour - 12;
														hour_ampm = 'PM';
													};

													// Except for 12:00 PM. 12:00 PM will have to be changed to PM manually.
													if (hour == 12) {
														hour_ampm = 'PM';
													}

													// Pad the minutes with 0s if it's less than 2 digits.
													var min = lpad(rawDate.getMinutes(), '0', 2);

													// Put together all the time formats.
													time = hour + ":" + min + " " + hour_ampm;

													// Render the event.
													jQuery(".event3 li").last().before(
														"<li>" + event_header + "</li>"
													);
												});

												jQuery(".event3 li").first().before(
													"<p style='margin-left: -24px;'>Last Updated: " + date + " at " + time + "</p>"
												);
											}
										});
									});
								</script>
							</ol>

							<h4 class="event4">Power Supply Workshop (TBA) ***</h4>
							<ol class="event4">
								<li style="list-style: none;"><img src="../img/ic_loading.gif"></li>
								<script>
									jQuery(function() {
										// Get the list of upcoming events formatted in JSON.
										jQuery.getJSON("https://spreadsheets.google.com/feeds/list/19N8HD_uiOtnuMeXf-e-ezQMtKrfsMS_8_7tC0AEskoo/1/public/values?alt=json&prettyprint=true", function(data) {
											// Utility method to pad a string on the left.
											// Source: http://sajjadhossain.com/2008/10/31/javascript-string-trimming-and-padding/.
											function lpad(str, pad_string, length) {
												var str = new String(str);
												while (str.length < length)
													str = pad_string + str;
												return str;
											};

											// Convert the day integer to its string value.
											function dayToString(day) {
												var days = ["Sun.", "Mon.", "Tues.", "Wed.", "Thurs.", "Fri.", "Sat."];
												return days[day];
											};

											// Convert the month integer to its string value. Keep note that months are listed starting from 0 - 11.
											function monthToString(month) {
												var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
												return months[month];
											};

											var date = '';
											var time = '';

											if (data.feed.entry == null) {
												jQuery(".event4 li").first().hide();
												jQuery(".event4 li").last().before(
													"There is no available list of participants. Please stay tuned for any future announcements."
												);
											}

											else {
												// Parse and render each event.
												jQuery.each(data.feed.entry, function(i, item) {
													// If there is at least 1 participant, then hide the "no participants" message.
													if (i == 0) {
														jQuery(".event4 li").first().hide();
													};

													// Retrieve the event title & its link.
													var event_header = item.gsx$name.$t;

													// Retrieve the raw date of the last update and format it.
													var rawDate = new Date(item.updated.$t);
													date = dayToString(rawDate.getDay()) + ", " + monthToString(rawDate.getMonth()) + " " + rawDate.getDate() + ", " + rawDate.getFullYear();

													// Retrieve the time and reformat it to AM/PM format.
													time = '';
													var hour = rawDate.getHours();
													var hour_ampm = 'AM';

													// Convert to 12-hour time format and change the AMPM tag to "PM".
													if (hour > 12) {
														hour = hour - 12;
														hour_ampm = 'PM';
													};

													// Except for 12:00 PM. 12:00 PM will have to be changed to PM manually.
													if (hour == 12) {
														hour_ampm = 'PM';
													}

													// Pad the minutes with 0s if it's less than 2 digits.
													var min = lpad(rawDate.getMinutes(), '0', 2);

													// Put together all the time formats.
													time = hour + ":" + min + " " + hour_ampm;

													// Render the event.
													jQuery(".event4 li").last().before(
														"<li>" + event_header + "</li>"
													);
												});

												jQuery(".event4 li").first().before(
													"<p style='margin-left: -24px;'>Last Updated: " + date + " at " + time + "</p>"
												);
											}
										});
									});
								</script>
							</ol>
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