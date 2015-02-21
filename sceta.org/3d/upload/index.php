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

		<title>SCETA - 3D Printing - Upload 3D Design</title>

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
								<?php include '../../inc/sidemenu_services_3d_upload.php'; ?>
							</div>
						</div>

						<div class="col span_3_of_4">
							<h4>How to Create an STL File</h4>
							<p>Please refer to the <a href="../faq/">FAQ page</a> on how to create a proper STL file of your 3D design.</p>

							<h4>Requirements</h4>
							<p>The following are some requirements that need to be met to allow a successful order.</p>
							<ul>
								<li>
									The design cannot exceed the print envelope of 300 mm x 200 mm x 178 mm (W x L x H). It is recommended to scale to half 
									of the print envelope (please keep it small).
								</li>
								<li>
									Please send <b>ONLY .STL files</b>. No solidworks or sketchup files please.
								</li>
								<li>
									As of right now, your .STL file cannot exceed 2 MB. If your file must exceed 2 MB, then please place a special
									order request to <a href="mailto:3d@sceta.org">3d@sceta.org</a>.
								</li> 
								<li>
									Please enter a color of choice for your print. Only certain colors are available for certain filaments.
									<ul>
										<li>ABS
											<ul>
												<li>Black</li>
												<li>Green</li>
												<li>Orange</li>
											</ul>
										</li>
										<li>PLA
											<ul>
												<li>Sky Blue</li>
												<li>Silver</li>
												<li>Pink</li>
												<li>Red</li>
												<li>Clear</li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>

							<h4>Upload Your Design</h4>
							<p>
								Please fill out the following form correctly, and you will be provided a confirmation e-mail once your order has been
								successfully placed.
							</p>

							<br>

							<!-- I AM NEW -->
							<form action="confirm/" method="post" enctype="multipart/form-data">
								<fieldset>
									<p>
										<b>First Name: </b> <input name="firstname" type="text" id="firstname" size="30" maxlength="30">
									</p>

									<p>
										<b>Last Name: </b> <input name="lastname" type="text" id="lastname" size="30" maxlength="30">
									</p>

									<p>
										<b>E-mail Address: </b> <input name="email" type="text" id="email" size="36" maxlength="60">
									</p>

									<p>
										<b>Phone Number: </b>
										<input name="phone1" type="text" id="phone1" size="3" maxlength="3"> - 
										<input name="phone2" type="text" id="phone2" size="3" maxlength="3"> -
										<input name="phone3" type="text" id="phone3" size="4" maxlength="4">	
									</p>

									<p>
										<b>Quality: </b>
										<select name="quality" id="quality">
											<option value="Low">Low ($1.00 per 500 mm)</option>
											<option value="Medium">Medium ($1.50 per 500 mm)</option>
											<option value="High">High ($2.00 per 500 mm)</option>
										</select>
									</p>

									<p>
										<b>Filament/Material: </b>
										<select name="material" id="material">
											<option value="ABS">ABS</option>
											<option value="PLA">PLA</option>
										</select>
									</p>

									<p>
										<b>Color: </b>
										<select name="color" id="color">
											<option value="Black">Black (ABS)</option>
											<option value="Green">Green (ABS)</option>
											<option value="Orange">Orange (ABS)</option>
											<option value="Sky Blue">Sky Blue (PLA)</option>
											<option value="Silver">Silver (PLA)</option>
											<option value="Pink">Pink (PLA)</option>
											<option value="Red">Red (PLA)</option>
											<option value="Clear">Clear (PLA)</option>
										</select>
									</p>

									<p>
										<label for="file"><b>File: </b>
										<input type="file" name="file" id="file"></label>
									</p>

									<p>
										<b>Additional Comments (Max 500 Characters):</b>
									</p>

									<p>
										<textarea name="comments" id="comments" maxlength="500"></textarea>
									</p>

									<!-- Check for spam. -->
									<input name='name2' type='text' size='20' style='display: none;'>

									<br>
									
									<p>
										<input type="submit" name="submit" value="Submit Order" id="submitButton">
									</p>
								</fieldset> 	
							</form>
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