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

		<title>Upload &ndash; 3D Printing &ndash; SCETA</title>

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

		<div class="not-fullscreen background" id="background" style="background-image:url('../../img/header/services_3d.jpg');" data-img-width="816" data-img-height="612">
			<div class="content-a">
				<div class="content-b">
					<h1>3D Printing</h1>
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
						include '../../../inc/sceta.org/connect_3d.php';

						// Get the form information.
						$firstName = cleanString($_REQUEST['firstname']);
						$lastName = cleanString($_REQUEST['lastname']);
						$email = cleanString($_REQUEST['email']);
						$phone = cleanString("(" . $_REQUEST['phone1'] . ") " . $_REQUEST['phone2'] . "-" . $_REQUEST['phone3']);
						$phoneDigits = $_REQUEST['phone1'] . $_REQUEST['phone2'] . $_REQUEST['phone3'];
						$quality = $_REQUEST['quality'];
						$material = $_REQUEST['material'];
						$color = $_REQUEST['color'];

						// If the comments are empty, then assign it to "None".
						if (empty($_REQUEST['comments'])) {
							$comments = "None";
						}

						// Otherwise, retrieve the comments.
						else {
							$comments = $_REQUEST['comments'];
						}

						// Store error messages if applicable.
						$errorMsg = "";

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

						// Define the SQL query to select all materials & process it.
						$sql = "SELECT * FROM Materials";
						$result = $connection->query($sql);

						// If there is at least 1 result, then check the material
						// and color combination.
						if ($result->num_rows > 0) {
							// Track if the material/color combination is valid.
							$isMaterialColorValid = false;

							// Identify $row as an object to pull data from.
							while ($row = $result->fetch_assoc()) {
								// If the material/color combination matches and
								// it is available, then break out of the 
								if ($color == $row['name'] 
									&& $material == $row['material']
									&& $row['status'] == 1) {
									$isMaterialColorValid = true;
									break;
								}
							}

							// If the material/color combination is not valid,
							// then display an error.
							if (!$isMaterialColorValid) {
								$errorMsg .= "<li>Invalid material/color combinaton: " . $material . " / " . $color . "</li>";
							}
						}

						// Otherwise, display an error. Ideally, this should not
						// be reached and is meant for debugging purposes.
						else {
							$errorMsg .= "<li>No materials could be found in our databases. This "
								. "is a critical server issue that should not be occurring. Please "
								. "let our webmaster know at <a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.";
						}

						// Close the MySQL connection.
						$connection->close();

						// Define the list of valid file extensions.
						$allowedExtensions = array("stl", "STL", "stL", "sTL", "sTl", "Stl", "StL", "STl");

						// Get the file name.
						$fileName = $_FILES["file"]["name"];

						// Get the uploaded file's extension.
						$extension = end(explode(".", $fileName));

						// If a file was not uploaded, then display an error.
						if (empty($fileName)) {
							$errorMsg .= "<li>3D design must be uploaded.</li>";
						}

						// Otherwise, check the file.
						else {
							// If there is an invalid file, then display an error.
							if (!in_array($extension, $allowedExtensions)
								|| ($_FILES["file"]["error"] > 0)
								|| ($_FILES["file"]["size"] > 2000000)
								|| file_exists("../stlUploads/" . $fileName)) {
								$errorMsg .= "<li>Invalid file: " . $fileName . "<ul>";

								// If the file extension is not supported, then
								// display an error.
								if (!in_array($extension, $allowedExtensions)) {
									$errorMsg .= "<li>File must be a .STL file.</li>";
								}

								// If there was some sort of file error, then
								// display an error.
								if ($_FILES["file"]["error"] > 0) {
									$errorMsg .= "<li>Uploaded file error: " . $_FILES["file"]["error"] . "</li>";
								}

								// If the file is greater than 2 MB, then display
								// an error.
								if ($_FILES["file"]["size"] > 2000000) {
									$errorMsg .= "<li>File must be less than or equal to 2 MB.</li>";
								}

								// If the file already exists, then display an error.
								if (file_exists("../stlUploads/" . $fileName)) {
									$errorMsg .= "<li>File already exists in our servers. Please rename & re-upload your file.</li>";
								}

								$errorMsg .= "</ul></li>";
							}
						}

						// If there are no error messages, then send the e-mails.
						if ($errorMsg == "") {
							// Set the default timezone to LA and get the date.
							date_default_timezone_set('America/Los_Angeles');
							$date = date('m/d/Y h:i:s a', time());

							// Define the e-mail message to the 3D technicians.
							$emailMsg_3d = "Dear 3D Techs,<br>"
								. "<br>"
								. "We have a new 3D printing order. Please review the following information."
								. "<ul>"
								. "<li><b>Name:</b> " . $firstName . " " . $lastName . "</li>"
								. "<li><b>E-mail Address:</b> " . $email . "</li>"
								. "<li><b>Phone Number:</b> " . $phone . "</li>"
								. "<li><b>Order Time:</b> " . $date . "</li>"
								. "<li><b>Quality:</b> " . $quality . "</li>"
								. "<li><b>Material:</b> " . $material . "</li>"
								. "<li><b>Color:</b> " . $color . "</li>"
								. "<li><b>Additional Comments:</b> " . $comments . "</li>"
								. "<li><b>File Name:</b> " . $fileName . "</li>"
								. "<li><b>File Location:</b> <a href='http://www.sceta.org/3d/stlUploads/" 
									. $fileName . "'>http://www.sceta.org/3d/stlUploads/" . $fileName . "</a></li>"
								. "</ul>"
								. "Best regards,<br>"
								. "Your SCETA Webmaster<br>"
								. "<br>"
								. "<hr>"
								. "This is an automatically generated message upon submission.<br>"
								. "Please address any errors or concerns related to this automated system "
								. "via <a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>, GroupMe, "
								. "or in person.";

							// Define the e-mal message to the submitter.
							$emailMsg_submitter = "Dear " . $firstName . " " . $lastName . "<br>"
								. "<br>"
								. "We have received your 3D printing order. Please review the following information "
								. "for your confirmation."
								. "<ul>"
								. "<li><b>Name:</b> " . $firstName . " " . $lastName . "</li>"
								. "<li><b>E-mail Address:</b> " . $email . "</li>"
								. "<li><b>Phone Number:</b> " . $phone . "</li>"
								. "<li><b>Order Time:</b> " . $date . "</li>"
								. "<li><b>Quality:</b> " . $quality . "</li>"
								. "<li><b>Material:</b> " . $material . "</li>"
								. "<li><b>Color:</b> " . $color . "</li>"
								. "<li><b>Additional Comments:</b> " . $comments . "</li>"
								. "<li><b>File Name:</b> " . $fileName . "</li>"
								. "</ul>"
								. "We will contact you again when your order is being processed and completed.<br>"
								. "<br>"
								. "If you have any problems with your order or need to correct any information, "
								. "then please simply reply to this e-mail.<br>"
								. "<br>"
								. "Thank you,<br>"
								. "Your SCETA 3D Techs";

							// Get the mail status after sending to SCETA 3D techs.
							$mailStatus = sendMail("3d@sceta.org", "webmaster@sceta.org",
								"New 3D Order", "webmaster@sceta.org", $emailMsg_3d,
								"webmaster@sceta.org", "Airwolf7400");

							// If the mail status is empty, then store the
							// uploaded file and display success.
							if ($mailStatus == "") {
								move_uploaded_file($_FILES["file"]["tmp_name"], "../stlUploads/" . $fileName);
								echo "<h2>Your order has been submitted & received!</h2>"
									. "<p>Thank you for submitting your 3D design. You will receive an e-mail "
									. "from one of our 3D technicians within 1-3 business days to confirm your "
									. "design specifications and further process your order.</p>"
									. "<p>If you do not receive a confirmation e-mail or need to correct any "
									. "information, please contact our 3D technicians at "
									. "<a href='mailto:3d@sceta.org'>3d@sceta.org</a>.</p>"
									. "<p>Thank you very much for your order. We look forward to satisfying "
									. "your 3D printing needs!</p>"
									. "<p>Click <a href='../'>here</a> to return to the 3D printing home page.</p>";
							}

							// Otherwise, display an error.
							else {
								echo "<h2>Mailer Error: Could not e-mail SCETA 3D technicians.</h2>"
									. "<p>" . $mailStatus . "</p>"
									. "<p>Please notify our webmaster at "
									. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</p>";
							}

							// Reset the mail status.
							$mailStatus = "";

							// Get the mail status after sending to the submitter.
							$mailStatus = sendMail($email, "3d@sceta.org", "New SCETA 3D Order",
								"3d@sceta.org", $emailMsg_submitter, "3d@sceta.org", "Airwolf7400");

							// If the mail status is not empty, then display
							// an error.
							if ($mailStatus != "") {
								echo "<h2>Mailer Error: Could not send confirmation e-mail.</h2>"
									. "<p>" . $mailStatus . "</p>"
									. "<p>Please notify our webmaster at "
									. "<a href='mailto:webmaster@sceta.org'>webmaster@sceta.org</a>.</p>";
							}
						}

						// Otherwise, display the error messages.
						else {
							echo "<h2>Sorry. There was an error with your upload request.</h2>"
								. "<ul>" . $errorMsg . "</ul>"
								. "<p>Click <a href='../'>here</a> to return to the 3D printing home page.</p>";
						}
					?>
				</div>
			</div>

			<?php include '../../../inc/sceta.org/footer_subLevel_2.php'; ?>
		</div>

		<?php include '../../../inc/sceta.org/commonScripts_subLevel_2.php'; ?>
	</body>
</html>