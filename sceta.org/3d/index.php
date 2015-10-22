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

		<title>3D Printing &ndash; SCETA</title>

		<meta name="description" content="3D print parts you need at a competitive, low price with the 
			convenience of on-campus service.">
		<meta name="keywords" content="SCETA, engineering, technology, networking, cpp">
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
		<link rel="stylesheet" href="../css/2cols.css" media="all">
		<link rel="stylesheet" href="../css/3cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>

	<body class="cbp-spmenu-push">
		<!-- Loading Animation -->
		<div class="se-pre-con"></div>

		<!-- Back to Top -->
		<a name="top"></a>

		<?php include '../../inc/sceta.org/header_subLevel_1.php'; ?>

		<div class="not-fullscreen background" id="background" style="background-image:url('../img/header/services_3d.jpg');" data-img-width="816" data-img-height="612">
			<div class="content-a">
				<div class="content-b">
					<h1>3D Printing</h1>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="container">
				<div class="content">
					<p class="intro">
						Get your parts printed at a competitive, low price with the convenience of
						on-campus service.
					</p>

					<div class="section group colorful">
						<div class="col span_1_of_3 red"><a href="#upload">Upload</a></div>
						<div class="col span_1_of_3 blue"><a href="#faq">FAQ</a></div>
						<div class="col span_1_of_3 green"><a href="#gallery">Gallery</a></div>
					</div>
				</div>
			</div>

			<div class="container gray">
				<div class="content">
					<h2>Upload Requirements</h2>

					<p>
						The following requirements need to be met to allow a successful order:

						<ul>
							<li>
								The design cannot exceed the print envelope of <b>300 mm x 200 mm x 178 mm</b> 
								(W x L x H). It is recommended to scale to half of the print envelope and to keep
								the overall print small.
							</li>
							<li>
								Please send <b>only .STL files</b>. No solidworks or sketchup files please.
							</li>
							<li>
								As of right now, your .STL file cannot exceed 2 MB. If your file must exceed
								2 MB, then please place a special order request through 
								<a href="mailto:3d@sceta.org">3d@sceta.org</a>.
							</li>
							<li>
								Please enter a color of choice for your print. Only certain colors are available
								for certain filaments.

								<ul class="materials">
									<li>ABS
										<ul>
											<?php 
												// Connect to the 3D database.
												include '../../inc/sceta.org/connect_3d.php'; 

												// Create the material list.
												$materialList = array();

												// Define the SQL query for all ABS colors & process it.
												$sql = "SELECT * FROM Materials WHERE material = 'ABS'";
												$result = $connection->query($sql);

												// If there is at least 1 result, then display the color
												// information.
												if ($result->num_rows > 0) {
													// Identify $row as an object to pull data from.
													while ($row = $result->fetch_assoc()) {
														array_push($materialList, $row["name"]);
													}

													// Alphabetically sort the material list.
													sort($materialList);

													// Process each color.
													for ($i = 0; ($i < count($materialList)); $i++) {
														// Define the SQL query for all ABS colors and their
														// corresponding material name & process it.
														$sql = "SELECT * FROM Materials WHERE material = 'ABS' AND name = '$materialList[$i]'";
														$result2 = $connection->query($sql);

														// Identify $row as an object to pull data from.
														while ($row = $result2->fetch_assoc()) {
															// If status is 1, then display "AVAILABLE".
															if ($row["status"] == 1) {
																echo "<li class='green'>" . $materialList[$i] . " (AVAILABLE)</li>";
															}

															// Otherwise, display "UNAVAILABLE".
															else {
																echo "<li class='red'>" . $materialList[$i] . " (UNAVAILABLE</li>";
															}
														}
													}
												}

												// Otherwise, state that there are no materials available.
												// This is a failsafe condition. Ideally, this should never
												// be reached.
												else {
													echo "<li>There are no colors available for ABS.</li>";
												}
											?>
										</ul>
									</li>
									<li>PLA
										<ul>
											<?php 
												// Create the material list. 
												$materialList = array();

												// Define the SQL query for all PLA colors & process it.
												$sql = "SELECT * FROM Materials WHERE material = 'PLA'";
												$result = $connection->query($sql);

												// If there is at least 1 result, then display the color
												// information.
												if ($result->num_rows > 0) {
													// Identify $row as an object to pull data from.
													while ($row = $result->fetch_assoc()) {
														array_push($materialList, $row["name"]);
													}

													// Alphabetically sort the material list.
													sort($materialList);

													// Process each color.
													for ($i = 0; ($i < count($materialList)); $i++) {
														// Define the SQL query for all PLA colors and their
														// corresponding material names & process it.
														$sql = "SELECT * FROM Materials WHERE material = 'PLA' AND name = '$materialList[$i]'";
														$result2 = $connection->query($sql);

														// Identify $row as an object to pull data from.
														while ($row = $result2->fetch_assoc()) {
															// If status is 1, then display "AVAILABLE".
															if ($row["status"] == 1) {
																echo "<li class='green'>" . $materialList[$i] . " (AVAILABLE)</li>";
															}

															// Otherwise, display "UNAVAILABLE".
															else {
																echo "<li class='red'>" . $materialList[$i] . " (UNAVAILABLE</li>";
															}
														}
													}
												}

												// Otherwise, state that there are no materials available.
												// This is a failsafe condition. Ideally, this should never
												// be reached.
												else {
													echo "<li>There are no colors available for PLA.</li>";
												}

												// Close the MySQL connection.
												$connection->close();
											?>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</div>
			</div>

			<a name="upload"></a>
			<div class="container red">
				<div class="content">
					<!--
					<h2>We are sorry. Our printer is currently out of service.</h2>

					<p>
						Our printer is currently under maintenance. We apologize for any inconvenience this
						may cause and will open up the upload form again when the printer is ready. 
					</p>
					-->
					
					<h2>Upload Your Design</h2>

					<p>
						Please fill out the form correctly. You will be provided with a confirmation e-mail
						once your order has been successfully placed.
					</p>

					<form action="upload/" method="post" enctype="multipart/form-data">
						<fieldset>
							<p>
								<b>Name</b>
							</p>

							<div class="section group">
								<div class="col span_1_of_2">
									<input class="full" name="firstname" placeholder="First" type="text" maxlength="30">
								</div>

								<div class="col span_1_of_2">
									<input class="full" name="lastname" placeholder="Last" type="text" maxlength="30">
								</div>
							</div>

							<p>
								<b>Your primary e-mail address</b>
							</p>

							<p>
								<input name="email" type="text" maxlength="60" style="width: 100%;">
							</p>

							<p>
								<b>Mobile phone</b>
							</p>

							<p>
								<input name="phone1" placeholder="XXX" type="tel" size="3" maxlength="3"> -                 
								<input name="phone2" placeholder="XXX" type="tel" size="3" maxlength="3"> -
								<input name="phone3" placeholder="XXXX" type="tel" size="4" maxlength="4">
							</p>

							<p>
								<b>Quality</b>
							</p>

							<p>
								<select name="quality">
									<option value="Low">Low ($1.00 per 500 mm)</option>
									<option value="Medium">Medium ($1.50 per 500 mm)</option>
									<option value="High">High ($2.00 per 500 mm)</option>
								</select>
							</p>

							<p>
								<b>Filament/Material</b>
							</p>

							<p>
								<select name="material">
									<option value="ABS">ABS</option>
									<option value="PLA">PLA</option>
								</select>
							</p>

							<p>
								<b>Color</b>
							</p>

							<p>
								<select name="color" id="color">
									<option value="Green">Green (ALL)</option>
									<option value="Red">Red (ALL)</option>
									<option value="Black">Black (ABS)</option>
									<option value="Sky Blue">Sky Blue (PLA)</option>
									<option value="Silver">Silver (PLA)</option>
									<option value="Pink">Pink (PLA)</option>
									<option value="Natural">Natural (PLA)</option>
								</select>
							</p>

							<p>
								<label for="file"><b>File</b>
							</p>

							<p>
								<input type="file" name="file"></label>
							</p>

							<p>
								<b>Additional Comments (Max 500 Characters)</b>
							</p>

							<p>
								<textarea name="comments" id="comments" maxlength="500"></textarea>
							</p>

							<!-- Check for spam. -->
							<input name='name2' type='text' style="display: none;" size='20'>

							<ul class="inline center">
								<li><input type='submit' id='join_submit' value='SUBMIT'></li>
								<li><input type='reset' id='join_reset' value='CLEAR'></li>
							</ul>
						</fieldset> 	
					</form>
				</div>
			</div>

			<a name="faq"></a>
			<div class="container blue">
				<div class="content">
					<h2>FAQ</h2>

					<ul>
						<li><a href="#whatIs3dPrinting">What is 3D printing?</a></li>
						<li><a href="#howLongOrder">How long will my order take to complete?</a></li>
						<li><a href="#pricing">How is pricing calculated?</a></li>
						<li><a href="#materials">What kind of materials can you print?</a></li>
						<li><a href="#sizes">What size restrictions are there?</a></li>
						<li><a href="#software">What software can I use?</a></li>
						<li><a href="#contact">Who can I contact for more information?</a></li>
					</ul>

					<hr>

					<a name="whatIs3dPrinting"></a>
					<h3>What is 3D printing?</h3>

					<p>
						3D printing is known by many names - additive fabrication, solid free form
						fabrication, rapid prototyping and more. It is the process of making a
						three-dimensional object by building very thin layers of material on top of
						each other. This is the opposite of more traditional manufacturing techniques, 
						such as carving, machining, or laser cutting, where material is removed to 
						create a form.
					</p>

					<p>
						The process begins first with the digital 3D model being sliced into 
						super-thin cross sectional layers. The printer then prints these layers
						one at a time from the bottom up until the model is complete. Build or 
						support material, such as a powder or wax, is used to hold parts of the 
						object that overhang and is cleaned off the final model once it is complete.
					</p>

					<p>
						You can get more information about 3D printing at
						<a href="http://www.ponoko.com/mingle-and-share/threed-printing-faqs" target="_blank">this site</a>.
					</p>

					<hr>

					<a name="howLongOrder"></a>
					<h3>How long will my order take to complete?</h3>

					<p>
						3D printing orders made from ABS plastic will generally be completed within 
						1-3 business days. However, a long queue may affect the standard completion
						time.
					</p>

					<p>
						Quality is one of our biggest priorities and may also play a significant role
						in affecting the completion time. In general, lower quality prints will follow
						our expected processing time of 1-3 business days while higher quality prints
						may or may not take longer.
					</p>

					<p>
						There is no shipping. Therefore, you may pick up your part as soon as it is
						available.
					</p>

					<hr>

					<a name="pricing"></a>
					<h3>How is pricing calculated?</h3>

					<p>
						The basic calculation is <b>one-time base $20 + cost per 500 mm</b>.
					</p>

					<p>
						The one-time base $20 is competitively priced and covers labor & maintenance. 
						Pricing per 500 mm is by quality as follows:

						<ul>
							<li><b>Low:</b> $1.00 per 500 mm</li>
							<li><b>Medium:</b> $1.50 per 500 mm</li>
							<li><b>High:</b> $2.00 per 500 mm</li>
						</ul>
					</p>

					<hr>

					<a name="materials"></a>
					<h3>What kind of materials can you print?</h3>

					<p>
						We currently print ABS and PLA.
					</p>

					<hr>

					<a name="sizes"></a>
					<h3>What size restrictions are there?</h3>

					<p>
						Our max build envelope is <b>12" x 8" x 7" or 300 mm x 200 mm x 178 mm</b>
						(W x L x H).
					</p>

					<hr>

					<a name="software"></a>
					<h3>What software can I use?</h3>

					<p>
						You can use any 3D design software that can export .STL files. If you are unsure
						on how to export an STL file of your design, check
						<a href="http://www.3deefab.com/en/faq/stl#sketchup" target="_blank">this link</a>
						for more information.
					</p>

					<hr>

					<a name="contact"></a>
					<h3>Who can I contact for more information?</h3>

					<p>
						We have a dedicated team of 3D technicians to help answer all the questions you
						may have via <a href="mailto:3d@sceta.org">3d@sceta.org</a> or in-person.
					</p>
				</div>
			</div>

			<a name="gallery"></a>
			<div class="container green">
				<div class="content">
					<h2>Gallery</h2>

					<p>
						See what our customers are up to through the gallery below.
					</p>

					<?php 
						include '../gallery/resources/UberGallery.php';
						$gallery = UberGallery::init()->createGallery('img');
					?>
				</div>
			</div>

			<?php include '../../inc/sceta.org/footer_subLevel_1.php'; ?>
		</div>

		<?php include '../../inc/sceta.org/commonScripts_subLevel_1.php'; ?>

		<!-- Loading Animation -->
		<script>
			$(window).load(function() {
				// Animate the loader off screen.
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>

		<!-- UberGallery -->
		<link rel="stylesheet" type="text/css" href="../gallery/resources/UberGallery.css" />
		<link rel="stylesheet" type="text/css" href="../gallery/resources/colorbox/5/colorbox.css" />
		<script type="text/javascript" src="../gallery/resources/colorbox/jquery.colorbox.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
			});
		</script>
	</body>
</html>