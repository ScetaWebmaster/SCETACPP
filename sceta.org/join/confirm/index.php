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

		<title>Confirm &ndash; Join SCETA</title>

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
		<link rel="stylesheet" href="../../css/2cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../../../inc/sceta.org/js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>

	<body class="cbp-spmenu-push">
		<!-- Back to Top -->
		<a name="top"></a>

		<?php include '../../../inc/sceta.org/header_subLevel_2.php'; ?>

		<div class="not-fullscreen background" id="background" style="background-image:url('../../gallery/2013/06/2013-sceta-banquet/img/067.jpg');" data-img-width="1092" data-img-height="728">
			<div class="content-a">
				<div class="content-b">
					<h1>Join SCETA</h1>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="container">
				<div class="content">
					<?php
						// Include the necessary functions.
						include '../../../inc/sceta.org/functions_forms.php';
						include '../../../inc/sceta.org/functions_email.php';

						// Get the form information.
					 	$firstName = cleanString($_REQUEST['firstname']);
					 	$lastName = cleanString($_REQUEST['lastname']);
					 	$email = cleanString($_REQUEST['email']);
						$phone = cleanString("(" . $_REQUEST['phone1'] . ") " . $_REQUEST['phone2'] . "-" . $_REQUEST['phone3']);
						$phoneDigits = $_REQUEST['phone1'] . $_REQUEST['phone2'] . $_REQUEST['phone3'];
						$broncoid = cleanString($_REQUEST['broncoid']);
						$major = cleanString($_REQUEST['major']);

						// Store error messages if applicable.
						$errorMsg = "";

						// If the spam field is empty, then perform the normal
						// field checks.
						if (empty($_REQUEST['name2'])) {
							// If the first name is empty, then display an error.
							if (empty($firstName)) {
								$errorMsg .= "<li>First name cannot be empty.</li>";
							}

							// Otherwise, check for invalid input.
							else {
								// If there is an invalid first name, then
								// display that invalid input.
								if ((strlen($firstName) > 30) || !isValidFirstName($firstName)) {
									$errorMsg .= "<li>Invalid first name: " . $firstName . "<ul>";

									// If the first name is longer than 30 characters, 
									// then display an error.
									if (strlen($firstName) > 30) {
										$errorMsg .= "<li>First name is larger than 30 characters. If you need to increase "
											. "this limit, please contact our webmaster at "
											. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</li>";
									}

									// If the first name contains invalid characters, then
									// display an error.
									if (!isValidFirstName($firstName)) {
										$errorMsg .= "<li>First name can only contain letters A-Z, a-z.</li>";
									}

									$errorMsg .= "</ul></li>";
								}
							}

							// If the last name is empty, then display an error.
							if (empty($lastName)) {
								$errorMsg .= "<li>Last name cannot be empty.</li>";
							}

							// Otherwise, check for invalid input.
							else {
								// If there is an invalid last name, then
								// display that invalid input.
								if ((strlen($lastName) > 30) || !isValidLastName($lastName)) {
									$errorMsg .= "<li>Invalid last name: " . $lastName . "<ul>";

									// If the last name is longer than 30 characters, then
									// display an error.
									if (strlen($lastName) > 30) {
										$errorMsg .= "<li>First name is larger than 30 characters. If you need to increase "
											. "this limit, please contact our webmaster at "
											. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</li>";
									}

									// If the last name contains invalid characters, then
									// display an error.
									if (!isValidLastName($lastName)) {
										$errorMsg .= "<li>Last name can only contain letters A-Z, a-z or dashes.</li>";
									}

									$errorMsg .= "</ul></li>";
								}
							}

							// If the e-mail address is empty, then display an error.
							if (empty($email)) {
								$errorMsg .= "<li>E-mail address cannot be empty.</li>";
							}

							// Otherwise, check for invalid input.
							else {
								// If there is an invalid e-mail address, then
								// display that invalid input.
								if ((strlen($email) > 60) || !isValidEmail($email)) {
									$errorMsg .= "<li>Invalid e-mail address: " . $email . "<ul>";

									// If the e-mail address is longer than 60 characters,
									// then display an error.
									if (strlen($email) > 60) {
										$errorMsg .= "<li>E-mail address is larger than 60 characters. If you need to "
											. "increase this limit, please contact our webmaster at "
											. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</li>";
									}

									// If the e-mail address contains invalid characters,
									// then display an error.
									if (!isValidEmail($email)) {
										$errorMsg .= "<li>E-mail address can only contain letters A-Z, a-z, numbers 0-9, "
											. "dashes, underscores, and 1 @ symbol.</li>";
									}

									$errorMsg .= "</ul></li>";
								}
							}

							// If the phone number is empty, then display an error.
							if (empty($phoneDigits)) {
								$errorMsg .= "<li>Phone number cannot be empty.</li>";
							}

							// Otherwise, check for invalid input.
							else {
								// If there is an invalid phone number, then
								// display that invalid input.
								if ((strlen($phoneDigits) != 10) || !isAllDigits($phoneDigits)) {
									$errorMsg .= "<li>Invalid phone number: " . $phone . "<ul>";

									// If the phone number is not 10 digits, then display
									// an error.
									if (strlen($phoneDigits) != 10) {
										$errorMsg .= "<li>Phone number can only be 10 digits. If additional codes or "
											. "international numbers need to be supported, please contact our webmaster at "
											. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</li>";
									}

									// If the phone number contains invalid characters,
									// then display an error.
									if (!isAllDigits($phoneDigits)) {
										$errorMsg .= "<li>Phone number can only contain digits 0-9.</li>";
									}

									$errorMsg .= "</ul></li>";
								}
							}

							// If the bronco ID number is empty, then display
							// an error.
							if (empty($broncoid)) {
								$errorMsg .= "<li>Bronco ID number cannot be empty.</li>";
							}

							// Otherwise, check for invalid input.
							else {
								// If there is an invalid bronco ID number, then
								// display that invalid input.
								if ((strlen($broncoid) > 9) || !isAllDigits($broncoid)) {
									$errorMsg .= "<li>Invalid bronco ID number: " . $broncoid . "<ul>";

									// If the bronco ID number is longer than 9 characters,
									// then display an error.
									if (strlen($broncoid) > 9) {
										$errorMsg .= "<li>Bronco ID number cannot exceed 9 digits. If you believe this is "
											. "an error, please contact our webmaster at "
											. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</li>";
									}

									// If the bronco ID number is not all digits, then
									// display an error.
									if (!isAllDigits($broncoid)) {
										$errorMsg .= "<li>Bronco ID number can only contain digits 0-9.</li>";
									}

									$errorMsg .= "</ul></li>";
								}
							}
						}

						// Otherwise, display the spam error.
						else {
							$errorMsg = "<li>Invalid name.</li>";
						}

						// If there are no error messages, then send the e-mails.
						if ($errorMsg == "") {
							// Define the e-mail message to be sent to the SCETA secretary.
							$emailMsg_secretary = "Dear SCETA Secretary,<br>"
								. "<br>"
								. "We have a new member who just registered for SCETA. The following is "
								. "their information:"
								. "<ul>"
					    		. "<li><b>Name:</b> " . $firstName . " " . $lastName . "</li>"
					    		. "<li><b>E-mail Address:</b> " . $email . "</li>"
					    		. "<li><b>Phone Number:</b> " . $phone . "</li>"
					    		. "<li><b>Bronco ID Number:</b> " . $broncoid . "</li>"
					    		. "<li><b>Major:</b> " . $major . "</li>"
								. "</ul>"
								. "Best regards,<br>"
								. "SCETA Webmaster<br>"
								. "<br>"
								. "<hr>"
								. "This is an automatically generated message upon registration.<br>"
								. "Please discuss any concerns via reply to this e-mail ("
								. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>), "
								. "on GroupMe, or in person.";

							// Define the e-mail message to be sent to the new member.
							$emailMsg_member = "Dear " . $firstName . " " . $lastName . ",<br><br>"
								. "Welcome to SCETA!<br>"
								. "<br>"
								. "This is your confirmation e-mail for your membership request. However, you "
								. "must complete your membership process by submitting your membership dues.<br>"
								. "<br>"
								. "<b>To submit your membership dues, please coordinate with our secretary at "
								. "<a href='mailto:secretary@sceta.org'>secretary@sceta.org</a>.</b><br>"
								. "<br>"
								. "Below is the following information that you have submitted:"
								. "<ul>"
					    		. "<li><b>Name:</b> " . $firstName . " " . $lastName . "</li>"
					    		. "<li><b>E-mail Address:</b> " . $email . "</li>"
					    		. "<li><b>Phone Number:</b> " . $phone . "</li>"
					    		. "<li><b>Bronco ID Number:</b> " . $broncoid . "</li>"
					    		. "<li><b>Major:</b> " . $major . "</li>"
								. "</ul>"
								. "If you have any problems with this membership process or need to correct any "
								. "information, please e-mail our secretary at "
								. "<a href='mailto:secretary@sceta.org'>secretary@sceta.org</a>.<br><br>"
								. "Welcome again to SCETA and we hope to see you very soon at our next event!<br><br>"
								. "Best regards,<br>"
								. "Your SCETA Secretary<br>"
								. "<br>"
								. "<hr>"
								. "This is an automatically generated message upon registration.<br>"
								. "Please direct any questions, comments, or concerns via e-mail to "
								. "<a href='mailto:secretary@sceta.org'>secretary@sceta.org</a> or in person.";

							// Get the mail status after sending to SCETA secretary.
							$mailStatus = sendMail("secretary@sceta.org", "webmaster@sceta.org", 
								"New SCETA Member", "webmaster@sceta.org", $emailMsg_secretary,
								"webmaster@sceta.org", "Airwolf7400");

							// If the mail status is empty, then display success.
							if ($mailStatus == "") {
								echo "<h2>You have successfully registered!</h2>"
									. "<p>Thank you for your submission. Please stay tuned for a new member e-mail, "
									. "and be sure to check the calendar for our upcoming events.</p>"
									. "<p>We look forwarding to meeting you at our next event!</p>"
									. "<h2>Complete your Membership</h2>"
									. "<p>As a short reminder, your membership process will not be completed "
									. "until your membership dues have been paid. Please coordinate with our "
									. "secretary at <a href='mailto:secretary@sceta.org'>secretary@sceta.org</a> "
									. "to complete this process.</p>";
							}

							// Otherwise, display an error.
							else {
								echo "<h2>Mailer Error: Could not e-mail SCETA secretary.</h2>"
									. "<p>" . $mailStatus . "</p>"
									. "<p>Please notify our webmaster at "
									. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</p>";
							}

							// Reset the mail status.
							$mailStatus = "";

							// Get the mail status after sending to new member.
							$mailStatus = sendMail($email, "donotreply@sceta.org", "Welcome to SCETA",
								"secretary@sceta.org", $emailMsg_member, "donotreply@sceta.org", "Airwolf7400");

							// If the mail status is not empty, then display
							// an error.
							if ($mailStatus != "") {
								echo "<h2>Mailer Error: Could not e-mail new member.</h2>"
									. "<p>" . $mailStatus . "</p>"
									. "<p>Please notify our webmaster at "
									. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</p>";
							}
						}

						// Otherwise, display the error messages.
						else {
							echo "<h2>Sorry. There was an error with your submission request.</h2>"
								. "<ul>" . $errorMsg . "</ul>"
								. "<p>Click <a href='../'>here</a> to return to the Join page.</p>";
						}
					?> 
				</div>
			</div>

			<?php include '../../../inc/sceta.org/footer_subLevel_2.php'; ?>
		</div>

		<?php include '../../../inc/sceta.org/commonScripts_subLevel_2.php'; ?>
	</body>
</html>