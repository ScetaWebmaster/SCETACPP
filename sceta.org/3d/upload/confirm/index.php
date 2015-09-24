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

		<link rel="shortcut icon" href="../../../img/favicon.ico">

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../../../css/html5reset.css" media="all">
		<link rel="stylesheet" href="../../../css/style.css" media="all">
		<link rel="stylesheet" href="../../../css/col.css" media="all">
		<link rel="stylesheet" href="../../../css/3cols.css" media="all">
		<link rel="stylesheet" href="../../../css/4cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../../../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../../../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../../../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../../../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary. -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../../js/jquery-1.7.2.min.js"><\/script>')</script>

		<!-- Smooth Scrolling -->
		<script src="../../../js/smoothScroll.js"></script>
	</head>

	<body>
		<a name="top"></a>

		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../../../inc/sceta.org/header_3.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<div>
								<?php include '../../../../inc/sceta.org/sidemenu_services_3d_upload_confirm.php'; ?>
							</div>
						</div>

						<div class="col span_3_of_4">
							<?php
								$materialColorValid = FALSE;
								$color = $_REQUEST['color'];
								$material = $_REQUEST['material'];

								// Connect to the 3D database.
								include_once '../../../../inc/sceta.org/connect_3d.php';

								// Query select all items from Materials table.
								$sql = "SELECT * FROM Materials";
								// Gather that into the $result variable.
								$result = $connection->query($sql);

								// Only echo data if there is at least 1.
								if ($result->num_rows > 0) {
									// Identify $row as an object to pull data from.
									while ($row = $result->fetch_assoc()) {
										// Return true if available.
										if ($row["status"] == 1 && $color == $row["name"] && $material == $row["material"]) {
											$materialColorValid = TRUE;
										}
									}
								}

								$connection->close();

								$allowedExts = array("stl", "STL", "stL", "sTL", "sTl", "Stl", "StL", "STl"); // Just to make sure, ja feel? (Yes, I feel.)
								$temp = explode(".", $_FILES["file"]["name"]);
								$extension = end($temp);

								if ((($_FILES["file"]["type"] == "application/vnd.ms-pki.stl") || ($_FILES["file"]["type"] == "application/netfabb") ||
									($_FILES["file"]["type"] == "application/sla") || ($_FILES["file"]["type"] == "application/x-navistyle")) ||
									// Changed everything to || instead of && because a couple people had trouble uploading different application .stl file extensions.
									in_array($extension, $allowedExts)) {
									if ($_FILES["file"]["error"] > 0) {
										echo "<h4>Error</h4> <p>Return Code: " . $_FILES["file"]["error"] . "</p> <p>Click
								      	<a href='../'>here</a> to return to the upload page.</p>";
									}

									else if (($_FILES["file"]["size"] > 2000000) && file_exists("../../stlUploads/" . $_FILES["file"]["name"])) {
										echo "<h4>Error</h4> <p>Please make sure your file is less than 2 MB.</p> <p>";
										echo $_FILES["file"]["name"] . " already exists. Please rename & re-upload your file.</p>";
										echo "<p>Click <a href='../'>here</a> to return to the upload page.</p>";
									}

									else if (($_FILES["file"]["size"] > 2000000)) {
										echo "<h4>Error</h4> <p>Please make sure your file is less than 2 MB.</p> <p>Click
								      	<a href='../'>here</a> to return to the upload page.</p>";
									}

									else if (file_exists("../../stlUploads/" . $_FILES["file"]["name"])) {
										echo "<h4>Error</h4> <p>";
								      	echo $_FILES["file"]["name"] . " already exists. Please rename & re-upload your file.</p> <p>Click
								      	<a href='../'>here</a> to return to the upload page.</p>";
									}

									else {			
										/* This handles sending out an e-mail to the 3D techs. */
										function isDigits($element) {
									  		return !preg_match ("/[^0-9]/", $element);
										}

										function isName($element) {
									  		return !preg_match ("/[^A-z]/", $element);
										}

										function isLastName($element) {
									  		return !preg_match ("/[^A-z-]/", $element);
										}

										function checkEmail($email) {
									  		$pattern = "/^[A-z0-9\._-]+"
									        		. "@"
									         		. "[A-z0-9][A-z0-9-]*"
									         		. "(\.[A-z0-9_-]+)*"
									         		. "\.([A-z]{2,6})$/";
									  		return preg_match ($pattern, $email);
										}

										function checkMaterialColor($mat, $col) {
											if ($mat == "ABS") {
												if ($col == "Sky Blue" || $col == "Silver" || $col == "Pink" || $col == "Natural") {
													return false;
												}
											}

											if ($mat == "PLA") {
												if ($col == "Black") {
													return false;
												}
											}

											return true;
										}

										/* This is the real form validation that checks for valid input. */
										function validateJoinForm($materialColorValid) {
											$form_validated = TRUE;
											$error1 = FALSE;
											$error2 = FALSE;
											$error3 = FALSE;
											$error4 = FALSE;
											$error5 = FALSE;
											$error6 = FALSE;

											if (!isName($_REQUEST['firstname']) || empty($_REQUEST['firstname']) || strlen($_REQUEST['firstname']) > 30) {
												$message1 = "<li>Please check your first name. Only the letters A-Z are accepted.</li>";
												$form_validated = FALSE;
												$error1 = TRUE;
											}

											if (!isLastName($_REQUEST['lastname']) || empty($_REQUEST['lastname']) || strlen($_REQUEST['lastname']) > 30) {
												$message2 = "<li>Please check your last name. Only the letters A-Z and hyphen '-' are accepted.</li>";
												$form_validated = FALSE;
												$error2 = TRUE;
											}

											if (!checkEmail($_REQUEST['email']) || empty($_REQUEST['email']) || strlen($_REQUEST['email']) > 60) {
												$message3 = "<li>Please check your email address.</li>";
												$form_validated = FALSE;
												$error3 = TRUE;
											}

											$phone = $_REQUEST['phone1'].$_REQUEST['phone2'].$_REQUEST['phone3'];
											if (!isDigits($phone) || strlen($phone) != 10) {
												$message4 = "<li>Please check your phone number. Only digits 0-9 are allowed.</li>";	
												$form_validated = FALSE;
												$error4 = TRUE;
											}

											if (!checkMaterialColor($_REQUEST['material'], $_REQUEST['color'])) {
												$message5 = "<li>Please check your material/color combination. Some colors are only available for certain filaments. Please see the list on the upload page.</li>";
												$form_validated = FALSE;
												$error5 = TRUE;
											}

											if (!$materialColorValid) {
												$message6 = "<li>Your requested material/color combination is temporarily unavailable. Please select a material/color combination that is currently available.</li>";
												$form_validated = FALSE;
												$error6 = TRUE;
											}

											/* Display the error messages if any. */
											if (!$form_validated) {
												echo "<h4>We are sorry. There was an error with your submission request.</h4>";
												echo "<ul>";
												
												if ($error1) {
													echo $message1;
												}

												if ($error2) {
													echo $message2;
												}
										
												if ($error3) {
													echo $message3;
												}
									
												if ($error4) {
													echo $message4;
												}

												if ($error5) {
													echo $message5;
												}

												if ($error6) {
													echo $message6;
												}

												echo "</ul>";

												echo "<p>Click <a href='../'>here</a> to return to the upload page.</p>";
											}

											return $form_validated;
										}

										/* Prevent multiple/repeated error messages. */
										function validateJoinForm1($materialColorValid) {
											$form_validated = TRUE;

											if (!isName($_REQUEST['firstname']) || empty($_REQUEST['firstname']) || strlen($_REQUEST['firstname']) > 30) {
												$form_validated = FALSE;
											}

											if (!isLastName($_REQUEST['lastname']) || empty($_REQUEST['lastname']) || strlen($_REQUEST['lastname']) > 30) {
												$form_validated = FALSE;
											}

											if (!checkEmail($_REQUEST['email']) || empty($_REQUEST['email']) || strlen($_REQUEST['email']) > 60) {
												$form_validated = FALSE;
											}

											$phone = $_REQUEST['phone1'].$_REQUEST['phone2'].$_REQUEST['phone3'];
											if (!isDigits($phone) || strlen($phone) != 10) {
												$form_validated = FALSE;
											}

											if (!checkMaterialColor($_REQUEST['material'], $_REQUEST['color'])) {
												$form_validated = FALSE;
											}

											if (!$materialColorValid) {
												$form_validated = FALSE;
											}

											return $form_validated;
										}

										/* Clean up the string of bad e-mail tags. */
								    	function clean_string($string) {
								      		$bad = array("content-type", "bcc:", "to:", "cc:", "href");
								      		return str_replace($bad, "", $string);
										}

										date_default_timezone_set('America/Los_Angeles');
										$date = date('m/d/Y h:i:s a', time());
										$phone = "(" . $_REQUEST['phone1'] . ") " . $_REQUEST['phone2'] . "-".$_REQUEST['phone3'];

										// Check if the additional comments are empty. If so, just say "None".
										if (empty($_REQUEST['comments'])) {
											$additionalComments = "None";
										}

										// Otherwise, send the comments.
										else {
											$additionalComments = $_REQUEST['comments'];
										}

										$firstname = $_REQUEST['firstname'];
										$lastname = $_REQUEST['lastname'];
										$quality = $_REQUEST['quality'];
										$material = $_REQUEST['material'];
										$color = $_REQUEST['color'];
										$email = $_REQUEST['email'];

										$email_message = "Dear 3D Techs,<br><br>We have a new 3D printing order. The following is the information:";
										$email_message .= "<ul>";
								    		$email_message .= "<li>Name: " . clean_string($firstname) . " " . clean_string($lastname) . "</li>";
								    		$email_message .= "<li>E-mail Address: " . clean_string($email) . "</li>";
								    		$email_message .= "<li>Phone Number: " . clean_string($phone) . "</li>";
								    		$email_message .= "<li>Order Time: " . $date . "</li>";
								    		$email_message .= "<li>Quality: " . $quality . "</li>";
								    		$email_message .= "<li>Material: " . $material . "</li>";
								    		$email_message .= "<li>Print Color: " . clean_string($color) . "</li>";
								    		$email_message .= "<li>Additional Comments: " . $additionalComments . "</li>";
								    		$email_message .= "<li>File Name: " . clean_string($_FILES["file"]["name"]) . "</li>";
								    		$email_message .= "<li>File Location: <a href='http://www.sceta.org/3d/stlUploads/" . $_FILES["file"]["name"] . 
								    			"'>http://www.sceta.org/3d/stlUploads/" . $_FILES["file"]["name"] . "</a></li>";
								    		//$email_message .= "<li>Current Order List: <a href='http://www.sceta.org/new/3d/stlUploads/orders.txt' target='_blank'>http://www.sceta.org/new/3d/stlUploads/orders.txt</a></li>";
										$email_message .= "</ul>";
										$email_message .= "Best regards,<br>Your SCETA Webmaster<br><br><hr>Please note that this is an automatically generated message upon submission.<br>Any errors or concerns related to the automated 3D system may be directed towards me via in person, GroupMe, or webmaster@sceta.org.";

										// PEAR Mail Configuration
										require_once "Mail.php"; // PEAR mail is already installed in the current environment.
										require_once "Mail/mime.php"; // Allow HTML text.
										$email_to = "3d@sceta.org"; // Recipient e-mail.
										$email_subject = "New 3D Order"; // Subject of the e-mail.
										$host = "mail.sceta.org"; // Host of mail server.
										$username = "donotreply@sceta.org"; // Host user.
										$from_address = "donotreply@sceta.org"; // Set a from address.
										$password = "Airwolf7400"; // Password of host user.
										$reply_to = $email; // Reply e-mail.
										$port = "50";

										// Allow HTML message.
										$mime = new Mail_mime();
										$mime->setHTMLBody($email_message);
										$email_message = $mime->get();

										// This section creates the e-mail headers.
										$auth = array('host' => $host, 'auth' => true, 'username' => $username, 'password' => $password);
										$headers = array('From' => $from_address, 'To' => $email_to, 'Subject' => $email_subject, 'Reply-To' => $reply_to);
										$headers = $mime->headers($headers);

										// If the form is valid, send the e-mail out.
										if (validateJoinForm($materialColorValid)) {
											// Prevent spam e-mails based on previous spam with first name equaling last name.
											if (!empty($_REQUEST['name2'])) {
												// Trick the spammer into thinking they by-passed the filter when they really didn't.
												echo "<h4>Email Confirmation Sent</h4><p>Thank you again for your order placement. Please be sure to check your e-mail for a confirmation.</p>";
											}

											// Otherwise, if not spam, then send the mail.
											else {
												$smtp = Mail::factory('smtp', $auth);
												$mail = $smtp->send($email_to, $headers, $email_message);

												if (PEAR::isError($mail)) {
													echo "<p>Mailer Error: " . $mail->ErrorInfo . "</p>";
												}
											}
										}

										/* Send email out to the customer. */
										$email_message1 = "Dear " . clean_string($firstname) . " " . clean_string($lastname) . ",<br><br>We have received your 3D printing order. Below is your submitted information:";
										$email_message1 .= "<ul>";
								    		$email_message1 .= "<li>Name: " . clean_string($firstname) . " " . clean_string($lastname) . "</li>";
								    		$email_message1 .= "<li>E-mail Address: " . clean_string($email) . "</li>";
								    		$email_message1 .= "<li>Phone Number: " . clean_string($phone) . "</li>";
								    		$email_message1 .= "<li>Order Time: " . $date . "</li>";
								    		$email_message1 .= "<li>Quality: " . $quality . "</li>";
								    		$email_message1 .= "<li>Material: " . $material . "</li>";
								    		$email_message1 .= "<li>Print Color: " . clean_string($color) . "</li>";
								    		$email_message1 .= "<li>Additional Comments: " . $additionalComments . "</li>";
								    		$email_message1 .= "<li>File Name: " . clean_string($_FILES["file"]["name"]) . "</li>";
										$email_message1 .= "</ul>";
										$email_message1 .= "We will contact you again when your order is being processed and completed.<br><br>";
										$email_message1 .= "If you have any problems with your order or need to correct any information, simply reply to this email with your questions, comments, or concerns.<br><br>";
										$email_message1 .= "Thank you,<br>Your SCETA 3D Techs<br><br><hr>This is an automatically generated message upon order placement.<br>Please use this thread to address questions, comments, or concerns about your order simply by replying to this email.";

										// PEAR Mail Configuration
										$email_to = $email; // Recipient e-mail.
										$email_subject = "New SCETA 3D Order Placed"; // Subject of the e-mail.
										$username = "3d@sceta.org"; // Host user.
										$from_address = "3d@sceta.org"; // Set a from address.
										$password = "Airwolf7400"; // Password of host user.
										$reply_to = "3d@sceta.org"; // Reply e-mail.

										// Allow HTML message.
										$mime = new Mail_mime();
										$mime->setHTMLBody($email_message1);
										$email_message = $mime->get();

										// This section creates the e-mail headers.
										$auth = array('host' => $host, 'auth' => true, 'username' => $username, 'password' => $password);
										$headers = array('From' => $from_address, 'To' => $email_to, 'Subject' => $email_subject, 'Reply-To' => $reply_to);
										$headers = $mime->headers($headers);

										// If the form is valid, send the e-mail out.
										if (validateJoinForm1($materialColorValid)) {
											// Prevent spam e-mails based on previous spam with first name equaling last name.
											if (!empty($_REQUEST['name2'])) {
												// Trick the spammer into thinking they by-passed the filter when they really didn't.
												echo "<h4>Email Confirmation Sent</h4><p>Thank you again for your order placement. Please be sure to check your e-mail for a confirmation.</p>";
											}

											// Otherwise, if not spam, then send the mail.
											else {
												$smtp = Mail::factory('smtp', $auth);
												$mail = $smtp->send($email_to, $headers, $email_message1);

												if (PEAR::isError($mail)) {
													echo "<p>Mailer Error: " . $mail->ErrorInfo . "</p>";
												}

												// Save the file and send out the e-mails.
												else {
													move_uploaded_file($_FILES["file"]["tmp_name"], "../../stlUploads/" . $_FILES["file"]["name"]);
											      	echo "<h4>Thank You</h4> <p>Thank you for submitting your 3D design. You will receive an e-mail within
													two business days to confirm your design specifications and order processing.</p>";
												    echo "<p><b>Upload:</b> " . $_FILES["file"]["name"] . "<br>";
												    if (($_FILES["file"]["size"] / 1024) >= 1000) {
														echo "<b>Size:</b> " . round(($_FILES["file"]["size"] / 1024000), 2) . " MB</p>";
													}

													else {
												    	echo "<b>Size:</b> " . round(($_FILES["file"]["size"] / 1024), 2) . " KB</p>";
												    }
												    echo "<p>You will be receiving an email confirmation shortly for your receipt purposes. 
												    	If you do not receive it, please check your Junk inbox. However, if you still have not received our email
												    	 confirmation, then please confirm your order with our 3D techs at <a href='mailto:3d@sceta.org'>3d@sceta.org</a>.</p>
												    	 <p>Thank you very much again for your order. We look forward to further satisfying your 3D printing needs!</p>";
												    echo "<p>Click <a href='../'>here</a> to return to the upload page.</p>";

												    /* Keep If You Still Want to Write Order Info to Text File

												    // This handles creating an organized order form for officers to view.
												    $File = "stlUploads/orders.txt"; // Defines what file to search for.
													$Handle = fopen($File, 'a'); // Open the file. If it doesn't exist, this creates it.
													// Request the information the user submitted and store them as variables to refer to.
													$firstname = $_REQUEST['firstname'];
													$lastname = $_REQUEST['lastname'];
													$email = $_REQUEST['email'];
													$phone1 = $_REQUEST['phone1'];
													$phone2 = $_REQUEST['phone2'];
													$phone3 = $_REQUEST['phone3'];
													$quality = $_REQUEST['quality'];
													$material = $_REQUEST['material'];
													$color = $_REQUEST['color'];
								
													// Write the information into the text file.
													fwrite($Handle, "Name: ");
													fwrite($Handle, $firstname . " " . $lastname);

													fwrite($Handle, "\r\nE-mail: ");
													fwrite($Handle, $email);

													fwrite($Handle, "\r\nPhone Number: ");
													fwrite($Handle, "(" . $phone1 . ") " . $phone2 . "-" . $phone3);

													fwrite($Handle, "\r\nQuality: ");
													fwrite($Handle, $quality);

													fwrite($Handle, "\r\nMaterial: ");
													fwrite($Handle, $material);

													fwrite($Handle, "\r\nColor: ");
													fwrite($Handle, $color);

													fwrite($Handle, "\r\nFile Name: "); 
													fwrite($Handle, $_FILES["file"]["name"]);

													fwrite($Handle, "\r\nTime: ");
													fwrite($Handle, $date);

													fwrite($Handle, "\r\n[ ] Please check this box if the order has been received.");
													fwrite($Handle, "\r\n\r\n");
													fclose($Handle); // End process.
													*/
												}
											}
										}
								    }
								}

								else {
									echo "<h4>Error</h4> <p>Invalid file. Please make sure it is an <b>.STL</b> extension only.</p>
									<p>Click <a href='../'>here</a> to return to the upload page.</p>";
								}
							?> 
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include '../../../../inc/sceta.org/footer_main_3.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="../../../js/top.js"></script>
	</body>
</html>