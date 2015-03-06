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

		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary. -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../js/jquery-1.7.2.min.js"><\/script>')</script> 

		<!-- Smooth Scroll -->
		<script src="../../js/smoothScroll.js"></script>
	</head>

	<body>
		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../../inc/sceta.org/header_2.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<?php include '../../../inc/sceta.org/sidemenu_join_confirm.php'; ?>
						</div>

						<div class="col span_3_of_4">
							<?php 
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

								function validateJoinForm() {
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

									if (!isDigits($_REQUEST['broncoid']) || strlen($_REQUEST['broncoid']) > 15) {
										$message5 = "<li>Please check your Bronco ID. It may not exceed 15 digits and only digits 0-9 are allowed.</li>";
										$form_validated = FALSE;
										$error5 = TRUE;
									}

									if (empty($_REQUEST['major']) || strlen($_REQUEST['major']) > 60) {
										$message6 = "<li>Please check your major. It can be up to 60 characters and cannot be empty.</li>";
										$form_validated = FALSE;
										$error6 = TRUE;
									}

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

										echo "<p>Please click <a href='../../join/'>here</a> to return to the Join page.</p>";
									}

									return $form_validated;
								}

								/* Prevent multiple/repeated error messages. */
								function validateJoinForm1() {
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

									if (!isDigits($_REQUEST['broncoid']) || strlen($_REQUEST['broncoid']) > 15) {
										$form_validated = FALSE;
									}

									if (empty($_REQUEST['major']) || strlen($_REQUEST['major']) > 60) {
										$form_validated = FALSE;
									}

									return $form_validated;
								}

						    	function clean_string($string) {
						      		$bad = array("content-type","bcc:","to:","cc:","href");
						      		return str_replace($bad,"",$string);
								}

								// Identify the Form Information
							 	$firstname = $_REQUEST['firstname'];
							 	$lastname = $_REQUEST['lastname'];
							 	$email = $_REQUEST['email'];
								$phone = "(" . $_REQUEST['phone1'] . ") " . $_REQUEST['phone2'] . "-".$_REQUEST['phone3'];
								$broncoid = $_REQUEST['broncoid'];
								$major = $_REQUEST['major'];
								$email_message = "Dear Elizabeth Romo,<br><br>We have a new member who just registered for SCETA. 
									The following is their information:";
								$email_message .= "<ul>";
						    		$email_message .= "<li>Name: " . clean_string($firstname) . " " . clean_string($lastname) . "</li>";
						    		$email_message .= "<li>Email: " . clean_string($email) . "</li>";
						    		$email_message .= "<li>Telephone: " . clean_string($phone) . "</li>";
						    		$email_message .= "<li>Bronco ID: " . clean_string($broncoid) . "</li>";
						    		$email_message .= "<li>Major: " . clean_string($major) . "</li>";
								$email_message .= "</ul>";
								$email_message .= "Best regards,<br>Byron Phung<br><br><hr>Please note that this is an 
									automatically generated message upon registration.<br>Any concerns can be discussed 
									via reply to this e-mail (webmaster@sceta.org), on GroupMe, or in person.";

								// PEAR Mail Configuration
								require_once "Mail.php"; // PEAR mail is already installed in the current environment.
								require_once "Mail/mime.php"; // Allow HTML text.
								$email_to = "secretary@sceta.org"; // Recipient e-mail.
								$email_subject = "New SCETA Member"; // Subject of the e-mail.
								$host = "mail.sceta.org"; // Host of mail server.
								$username = "donotreply@sceta.org"; // Host user.
								$from_address = "donotreply@sceta.org"; // Set a from address.
								$password = "ecetsCPP1"; // Password of host user.
								$reply_to = "webmaster@sceta.org"; // Reply e-mail.
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
								if (validateJoinForm()) {
									// Prevent spam e-mails based on previous spam with first name equaling last name.
									if (!empty($_REQUEST['name2'])) {
										// Trick the spammer into thinking they by-passed the filter when they really didn't.
										echo "<h4>You have successfully registered!</h4><p>Thank you for your submission. 
										Stay tuned for a new member e-mail, and be sure to check the calendar for the next meeting and 
										upcoming events!</p><p>We're excited to see you soon at the next SCETA meeting!</p>";
									}

									// Otherwise, if not spam, then send the mail.
									else {
										$smtp = Mail::factory('smtp', $auth);
										$mail = $smtp->send($email_to, $headers, $email_message);

										if (PEAR::isError($mail)) {
											echo "<p>Mailer Error: " . $mail->ErrorInfo . "</p>";
										}
										
										else {
											echo "
												<h4>You have successfully registered!</h4>
												<p>
													Thank you for your submission. Stay tuned for a new member e-mail, and be sure to check the calendar for the next 
													meeting and upcoming events!
												</p>
												<p>
													We're excited to see you soon at the next SCETA meeting!
												</p>

												<h4>Reminder: These are just some of your benefits!</h4>
												<p>
													You've joined us for a reason. Here are more of some of your benefits:
													<ul>
														<li>discounts on electronic parts</li>
														<li>priority for SCETA-hosted events</li>
														<li>free food at meetings</li>
														<li>industry exposure from outreach events like Innovative Tech Expo and GRID Alternatives</li>
														<li>...and still more!</li>
													</ul>
												</p>

												<h4>Complete Your Membership</h4>
												<p>
													As you will find in your new member e-mail, the membership process needs to be completed with
													a $20 membership fee. 
												</p>

												<p>
													Please coordinate with our secretary through 
													<a href='mailto:secretary@sceta.org'>secretary@sceta.org</a> to complete this process.
												</p>";
										}
									}
								}

								/* User confirmation e-mail information. */
								$email_message1 = "Dear " . clean_string($firstname) . " " . clean_string($lastname) . ",<br><br>Thank you for joining SCETA. 
									This is your confirmation e-mail. However, your membership process is still incomplete.<br><br> To complete your membership, 
									you need to submit your <b>$20 membership dues</b>. Please coordinate with our secretary at <a href='mailto:secretary@sceta.org'>secretary@sceta.org</a> 
									to complete this portion of your membership process.<br><br>Below is the following information that was submitted:";
								$email_message1 .= "<ul>";
						    		$email_message1 .= "<li>Name: " . clean_string($firstname) . " " . clean_string($lastname) . "</li>";
						    		$email_message1 .= "<li>Email: " . clean_string($email) . "</li>";
						    		$email_message1 .= "<li>Telephone: " . clean_string($phone) . "</li>";
						    		$email_message1 .= "<li>Bronco ID: " . clean_string($broncoid) . "</li>";
						    		$email_message1 .= "<li>Major: " . clean_string($major) . "</li>";
								$email_message1 .= "</ul>";
								$email_message1 .= "If you have any problems with this membership process or need to correct any information, please e-mail our 
									secretary at <a href='mailto:secretary@sceta.org'>secretary@sceta.org</a>.<br><br> Thank you once again for 
									joining SCETA and we hope to see you very soon at our next meeting!<br><br>";
								$email_message1 .= "Best regards,<br>Elizabeth Romo<br>Your SCETA Secretary<br><br><hr>This is an automatically 
									generated message upon registration.<br>Please direct any questions, comments, or concerns via e-mail to 
									<a href='mailto:secretary@sceta.org'>secretary@sceta.org</a> or in person.";

								$email_to = $email; // Recipient e-mail.
								$email_subject = "Welcome to SCETA!"; // Subject of the e-mail.
								$reply_to = "secretary@sceta.org"; // Reply e-mail.

								// Allow HTML message.
								$mime = new Mail_mime();
								$mime->setHTMLBody($email_message1);
								$email_message = $mime->get();

								// This section creates the e-mail headers.
								$auth = array('host' => $host, 'auth' => true, 'username' => $username, 'password' => $password);
								$headers = array('From' => $from_address, 'To' => $email_to, 'Subject' => $email_subject, 'Reply-To' => $reply_to);
								$headers = $mime->headers($headers);

								// If the form is valid, send the e-mail out.
								if (validateJoinForm1()) {
									// Prevent spam e-mails based on previous spam with first name equaling last name.
									if (!empty($_REQUEST['name2'])) {
										// Trick the spammer into thinking they by-passed the filter when they really didn't.
										echo "<h4>You have successfully registered!</h4><p>Thank you for your submission. 
										Stay tuned for a new member e-mail, and be sure to check the calendar for the next meeting and 
										upcoming events!</p><p>We're excited to see you soon at the next SCETA meeting!</p>";
									}

									// Otherwise, if not spam, then send the mail.
									else {
										$smtp = Mail::factory('smtp', $auth);
										$mail = $smtp->send($email_to, $headers, $email_message1);

										if (PEAR::isError($mail)) {
											echo "<p>Mailer Error: " . $mail->ErrorInfo . "</p>";
										}
									}
								}
							?> 
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