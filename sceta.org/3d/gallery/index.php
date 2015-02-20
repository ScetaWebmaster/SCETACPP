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

		<title>SCETA - 3D Printing - Gallery</title>

		<meta name="description" content="SCETA (Southern California Engineering Technologists Association) has been networking with engineering alumni who have been working in the engineering field since 1983. SCETA is an association of students interested in life-long learning and the sharing of knowledge among the various engineering disciplines. One of our goals is to establish a social network for current/future students and alumni.">
		<meta name="keywords" content="SCETA, engineering, technology, networking">
		<meta name="author" content="www.sceta.org">
		<meta http-equiv="cleartype" content="on">

		<link rel="shortcut icon" href="../../img/favicon.ico">

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../../css/html5reset.css" media="all">
		<link rel="stylesheet" href="../../css/style.css" media="all">
		<link rel="stylesheet" href="../../css/col.css" media="all">
		<link rel="stylesheet" href="../../css/3cols.css" media="all">
		<link rel="stylesheet" href="../../css/4cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary. -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../js/jquery-1.7.2.min.js"><\/script>')</script>

		<!-- UberGallery -->
		<link rel="stylesheet" type="text/css" href="../../gallery/resources/UberGallery.css" />
		<link rel="stylesheet" type="text/css" href="../../gallery/resources/colorbox/5/colorbox.css" />
		<script type="text/javascript" src="../../gallery/resources/colorbox/jquery.colorbox.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
			});
		</script>

		<!-- Smooth Scrolling -->
		<script src="../../js/smoothScroll.js"></script>
	</head>

	<body>
		<a name="top"></a>
		
		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../inc/header_2.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<div>
								<?php include '../../inc/sidemenu_services_3d_gallery.php'; ?>
							</div>
						</div>

						<div class="col span_3_of_4">
							<h4>3D Printing Gallery</h4>
							<p>
								We'd like to share with you some of our customer prints that we have done in the past. We hope you enjoy them and hope to see yours
								among these photographs soon!
							</p>

							<p>
								<?php 
									include_once('../../gallery/resources/UberGallery.php');
									$gallery = UberGallery::init()->createGallery('img');
								?>

								<a href="../" class="backBarLink">
								<div class="backBar">
									Back to 3D Home
								</div>
							</a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include '../../inc/footer_main_2.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="../../js/top.js"></script>
	</body>
</html>