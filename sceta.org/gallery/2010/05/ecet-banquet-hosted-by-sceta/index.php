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

		<title>ECET Banquet Hosted by SCETA &ndash; May 28, 2010 &ndash; Gallery &ndash; SCETA</title>

		<meta name="description" content="SCETA (Southern California Engineering Technologists Association) has been networking with engineering alumni who have been working in the engineering field since 1983. SCETA is an association of students interested in life-long learning and the sharing of knowledge among the various engineering disciplines. One of our goals is to establish a social network for current/future students and alumni.">
		<meta name="keywords" content="SCETA, engineering, technology, networking">
		<meta name="author" content="www.sceta.org">
		<meta http-equiv="cleartype" content="on">

		<link rel="shortcut icon" href="../../../../img/favicon.ico">

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../../../../css/html5reset.css" media="all">
		<link rel="stylesheet" href="../../../../css/style.css" media="all">
		<link rel="stylesheet" href="../../../../css/col.css" media="all">
		<link rel="stylesheet" href="../../../../css/2cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../../../../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../../../../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../../../../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../../../../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- UberGallery -->
		<link rel="stylesheet" type="text/css" href="../../../resources/UberGallery.css" />
		<link rel="stylesheet" type="text/css" href="../../../resources/colorbox/5/colorbox.css" />
	</head>

	<body class="cbp-spmenu-push">
		<!-- Loading Animation -->
		<div class="se-pre-con"></div>
					
		<!-- Back to Top -->
		<a name="top"></a>

		<?php include '../../../../../inc/sceta.org/header_subLevel_4.php'; ?>

		<div class="not-fullscreen background" id="background" style="background-image:url('img/002.jpg');" data-img-width="640" data-img-height="480">
			<div class="content-a">
				<div class="content-b gallery">
					<h1>ECET Banquet Hosted by SCETA</h1>
					<h2>May 28, 2010</h2>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="container">
				<div class="content">
					<p class="center">
						<a href="../../../../resources#gallery" class="button">Back to Gallery List</a>
					</p>

					<?php 
						include_once('../../../resources/UberGallery.php');
						$gallery = UberGallery::init()->createGallery('img');
					?>
				</div>
			</div>

			<?php include '../../../../../inc/sceta.org/footer_subLevel_4.php'; ?>
		</div>

		<?php include '../../../../../inc/sceta.org/commonScripts_subLevel_4.php'; ?>

		<!-- Loading Animation -->
		<script>
			$(window).load(function() {
				// Animate the loader off screen.
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>

		<!-- UberGallery -->
		<script type="text/javascript" src="../../../resources/colorbox/jquery.colorbox.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
			});
		</script>
	</body>
</html>