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

		<title>SCETA - Join</title>

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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>	 

		<!-- Smooth Scroll -->
		<script src="../js/smoothScroll.js"></script>
	</head>

	<body>
		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../inc/sceta.org/header_1.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<?php include '../../inc/sceta.org/sidemenu_join.php'; ?>
						</div>

						<div class="col span_3_of_4">
							<h4>Why join SCETA?</h4>
							<p>
								With the $20 annual SCETA membership, you will gain many benefits. You will:
								<ul>
									<li>attend one-on-one workshops dealing with a variety of electronics & computing technology, such as the Arduino UNO, PIC, and Pspice</li>
									<li>meet professionals from industry</li>
									<li>gain insight on industry with group tours</li>
									<li>network with peers & future employers in your field</li>
									<li>gain valuable leadership experiences & skills</li>
									<li>get discounts on electronic components & tools needed for various classes</li>
									<li>enjoy social events</li>
									<li>participate in group study sessions</li>
									<li>receive a student-designed SCETA shirt</li>
									<li>...and experience much more!</li>
								</ul>
							</p>

							<h4>Join Us</h4>
							<p>
								Please fill out the following form correctly, and you will be provided a confirmation e-mail once you have submitted your information.
							</p>
							<br>

							<form name="contactform" method="post" action="confirm/">
								<fieldset>
									<p>
										<b>First Name: </b>
										<input name="firstname" type="text" id="firstname" size="30" maxlength="30">
									</p>

									<p>
										<b>Last Name: </b>
										<input name="lastname" type="text" id="lastname" size="30" maxlength="30">
									</p>

									<p>
										<b>E-mail Address: </b>
										<input name='email' type='text' id='email' size='40' maxlength='60'>
									</p>

									<p>
										<b>Phone Number: </b>
										<input name='phone1' type='text' id='phone1' size='3' maxlength='3'> -                 
										<input name='phone2' type='text' id='phone2' size='3' maxlength='3'> -
										<input name='phone3' type='text' id='phone3' size='4' maxlength='4'>
									</p>

									<p>
										<b>Bronco ID: </b>
										<input name='broncoid' type='text' id='broncoid' size='15' maxlength='15'>
									</p>

									<p>
										<b>Major: </b>
										<input name='major' type='text' id='major' size='40' maxlength='60'>
									</p>

									<!-- Check for spam. -->
									<input name='name2' type='text' style="display: none;" size='20'>

									<br>

									<p>
										<input type='submit' name='join_submit' id='join_submit' value='Submit'>
										<input type='reset' name='join_reset' id='join_reset' value='Clear'>
									</p>
								</fieldset>
							</form> 
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