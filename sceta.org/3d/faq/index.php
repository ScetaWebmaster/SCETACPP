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

		<title>SCETA - 3D Printing - FAQ</title>

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
			<?php include '../../../inc/sceta.org/header_2.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<div>
								<?php include '../../../inc/sceta.org/sidemenu_services_3d_faq.php'; ?>
							</div>
						</div>

						<div class="col span_3_of_4 faq">
							<h4>3D Printing FAQ: The Questions</h4>
							<ul class="questions">
								<li><a href="#whatIs3dPrinting">What is 3D printing?</a></li>
								<li><a href="#howLongOrder">How long will my order take to complete?</a></li>
								<li><a href="#pricing">How is pricing calculated?</a></li>
								<li><a href="#materials">What kind of materials can our 3D printer print?</a></li>
								<li><a href="#sizes">What size restrictions are there?</a></li>
								<li><a href="#software">What software can I use?</a></li>
								<li><a href="#contact">Who can I contact for more information?</a></li>
							</ul>

							<h4>3D Printing FAQ: The Answers</h4>
							<a name="whatIs3dPrinting"></a>
							<ul class="answers">
								<li>What is 3D printing?</li>
								<li>
									 3D printing is known by many names - additive fabrication, solid free form fabrication, rapid prototyping and more. 
									 It is the process of making a three-dimensional object by building very thin layers of material on top of each other. 
									 This is the opposite of more traditional manufacturing techniques, such as carving, machining, or laser cutting, where 
									 material is removed to create a form.
								</li>
								<li>
									The process begins first with the digital 3D model being sliced into super-thin cross sectional layers. The printer 
									then prints these layers one at a time from the bottom up until the model is complete. Build or support material, 
									such as a powder or wax, is used to hold parts of the object that overhang and is cleaned off the final model once 
									it is complete.
								</li>
								<li>
									You can get more information about 3D printing at <a href="http://www.ponoko.com/mingle-and-share/threed-printing-faqs" target="_blank">this site</a>.
								</li>
							</ul>

							<a name="howLongOrder"></a>
							<ul class="answers">
								<li>How long will my order take to complete?</a></li>
								<li>
									3D printing orders made from ABS plastic will generally be completed within 1-2 business days.
								</li>
								<li>
									Queue time also plays a big factor in completion time, but we will be working to speed up all of these turnaround
									times in the coming months as our 3D services expand.
								</li>
								<li>
									More importantly, quality is the biggest factor in affecting completion time. In general, lower quality
									prints will follow our expected processing time of 1-3 business days, but higher quality prints may
									take longer.
								</li>
								<li>
									Shipping times will generally take 1-3 business days.
								</li>
							</ul>

							<a name="pricing"></a>
							<ul class="answers">
								<li>How is pricing calculated?</li>
								<li>
									Pricing varies from design to design. The basic calculation is <b>base $20 + additional cost per 500 mm</b>.
								</li>
								<li>
									The base $20 is competitively priced and covers labor and maintenance. Pricing per 500 mm is by quality.
									<ul>
										<li><b>Low Quality:</b> $1.00 per 500 mm</li>
										<li><b>Medium Quality:</b> $1.50 per 500 mm</li>
										<li><b>High Quality:</b> $2.00 per 500 mm</li>
									</ul>
								</li>
									
							</ul>

							<a name="materials"></a>
							<ul class="answers">
								<li>What kind of materials can our 3D printer print?</li>
								<li>
									Airwolf 3D printers can print with a multitude of materials, which can be viewed 
									<a href="http://airwolf3d.com/2013/06/10/many-3d-printer-materials/" target="_blank">here</a>.
								</li>
								<li>
									However, the materials we can print are currently only ABS and PLA, but we are working to support more types in the near future.
								</li>
							</ul>

							<a name="sizes"></a>
							<ul class="answers">
								<li>What size restrictions are there?</li>
								<li>
									Our max build envelope (width x length x height) is <b>12" x 8" x 7"</b> or <b>300 mm x 200 mm x 178mm</b>.
								</li>
								<li>
									Below is a specifications sheet of some of the details of our 3D printer.<br><br>

									<table border="1">
										<tr>
											<td>Model:</td>
											<td>AW3D XL</td>
										</tr>
										<tr>
											<td>Country:</td>
											<td>USA Manufacturer</td>
										</tr>
										<tr>
											<td>Assembled:</td>
											<td>Yes</td>
										</tr>
										<tr>
											<td>Compatible Materials:</td>
											<td>ABS, PLA, LAYWOO-D3, Nylon (exp), Polycarb (Exp), and <a href="http://airwolf3d.com/2013/06/10/many-3d-printer-materials/" target="_blank">more</a></td>
										</tr>
										<tr>
											<td>Build Envelope (W x L x H):&nbsp;</td>
											<td>12" x 8" x 7" (300 mm x 200 mm x 178 mm)</td>
										</tr>
										<tr>
											<td>Lead Time:</td>
											<td>1 Week</td>
										</tr>
										<tr>
											<td>Nozzle Diameter (mm):</td>
											<td>0.5 (0.35 is optional)</td>
										</tr>
										<tr>
											<td>Layer Thickness (mm):</td>
											<td>0.25 (0.1 to 0.4 possible)</td>
										</tr>
										<tr>
											<td>Max Speed (mm/s):</td>
											<td>150 mm/s (Perimeter) & 400 mm/s (Travel)</td>
										</tr>
										<tr>
											<td>Position Precision:</td>
											<td>0.04 mm</td>
										</tr>
										<tr>
											<td>Input Format:</td>
											<td>GCode</td>
										</tr>
										<tr>
											<td>Software:</td>
											<td>Marlin Firmware, Pronterface/Repetier Host Print Controller, Slic3r GCode Generator</td>
										</tr>
										<tr>
											<td>System Compatibility:</td>
											<td>Windows/Mac</td>
										</tr>
										<tr>
											<td>Size (W x L x H):</td>
											<td>17.75 mm x 18 mm x 21 mm</td>
										</tr>
										<tr>
											<td>Power Supply:</td>
											<td>Internal 12V DC, 300 W, 25 A</td>
										</tr>
										<tr>
											<td>Weight:</td>
											<td>11 kg</td>
										</tr>
									</table>
								</li>
							</ul>

							<a name="software"></a>
							<ul class="answers">
								<li>What software can I use?</li>
								<li>
									You can create your file with any 3D design software that can export .STL files.
								</li>
								<li>
									If you are unsure on how to export an STL file of your design, check <a href="http://www.3deefab.com/en/faq/stl#sketchup" target="_blank">this link</a>
									for more information.
								</li>
								<li>
									If there is a different software package that you use to export 3D files, send us a how-to guide 
									and we'll consider adding it on our website and reward you with a free print voucher! 
								</li>
							</ul>

							<a name="contact"></a>
							<ul class="answers">
								<li>Who can I contact for more information?</li>
								<li>
									Our 3D services have been growing rapidly, so we have brought onto our leadership team a group of 3D techs to answer
									questions just for you about our 3D services. You may contact them at <a href="mailto:3d@sceta.org">3d@sceta.org</a>.
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include '../../../inc/sceta.org/footer_main_2.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="../../js/top.js"></script>
	</body>
</html>