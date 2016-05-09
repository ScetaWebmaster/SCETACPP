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

		<title>Parts Store &ndash; SCETA</title>

		<meta name="description" content="Get the electronic parts you need with the convenience of 
			on-campus service.">
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
		<!-- Back to Top -->
		<a name="top"></a>

		<?php include '../../inc/sceta.org/header_subLevel_1.php'; ?>

		<div class="not-fullscreen background" id="background" style="background-image:url('http://highlowtech.org/wp-content/uploads/2011/06/IMG_0888.jpg');" data-img-width="2122" data-img-height="1592">
			<div class="content-a">
				<div class="content-b">
					<h1>Parts Store</h1>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="container">
				<div class="content">
					<p class="intro">
						Get the electronic parts you need with the convenience of on-campus service.
					</p>
				</div>
			</div>

			<div class="container gray">
				<div class="content">
					<h2>Store Policy</h2>
					<p>
						Parts sales are conducted at the SCETA office (Building 9, Room 257), but be quick for
						many parts are becoming rarer and may soon be out-of-stock permanently.
					</p>
					<p>
						While shopping for your electronics supplies here at SCETA, please keep in mind the following:
						<ul>
							<li>Discounts are available with a SCETA membership.</li>
							<li>All sales are final, which means no refunds or returns will be provided.</li>
							<li>All prices are subject to change.</li>
						</ul>
					</p>

					<h2>Hours & Contact Information</h2>
					<p>
						For hours and contact information, please view the <a href="../services/">Services page</a>.
					</p>
				</div>
			</div>

			<div class="container">
				<div class="content">
					<h2>Kits, Cables & Other Components</h2>

					<br>

					<table class="parts" border="1">
						<tr class="title">
							<td>Part Name</td>
							<td>Description</td>
							<td>Member Price</td>
							<td>Regular Price</td>
							<td>Status</td>
						</tr>

						<?php 
							// Connect to the parts database.
							include '../../inc/sceta.org/connect_parts.php'; 

							// Define the SQL query to parse regular parts & process it.
							$sql = "SELECT * FROM RegularParts";
							$result = $connection->query($sql);

							// If there is at least 1 item, then display the parts.
							if ($result->num_rows > 0) {
								// Identify $row as an object to pull data from.
								while ($row = $result->fetch_assoc()) {
									// Display standard data.
									echo "<tr>" 
										. "<td>" . $row["name"] . "</td>"
										. "<td>" . $row["description"] . "</td>"
										. "<td>" . $row["price_member"] . "</td>"
										. "<td>" . $row["price_regular"] . "</td>";

									// If status is 1, then show "IN STOCK".
									if ($row["status"] == 1) {
										echo "<td class='green'></td>";
									}

									// Otherwise, display "OUT OF STOCK".
									else {
										echo "<td class='red'></td>";
									}
								}
							}

							// Otherwise, state that there are no parts available.
							// This is a failsafe condition. Ideally, this should never be reached.
							else {
								echo "There are no parts available.";
							}
						?>
					</table>

					<h2>TTL Chips/ICs</h2>

					<br>

					<table class="dollarParts" border="1">
						<tr class="title">
							<td>Part Name</td>
							<td>Description</td>
							<td>Member Price</td>
							<td>Regular Price</td>
							<td>Status</td>
						</tr>

						<?php 
							// Define the SQL query to parse dollar parts & process it.
							$sql = "SELECT * FROM DollarParts";
							$result = $connection->query($sql);

							// If there is at least 1 item, then display the parts.
							if ($result->num_rows > 0) {
								// Identify $row as an object to pull data from.
								while ($row = $result->fetch_assoc()) {
									// Display standard data.
									echo "<tr>" 
										. "<td>" . $row["name"] . "</td>"
										. "<td>" . $row["description"] . "</td>"
										. "<td></td>"
										. "<td></td>";

									// If status is 1, then show "IN STOCK".
									if ($row["status"] == 1) {
										echo "<td class='green'></td>";
									}

									// Otherwise, display "OUT OF STOCK".
									else {
										echo "<td class='red'></td>";
									}
								}
							}

							// Otherwise, state that there are no parts available.
							// This is a failsafe condition. Ideally, this should never be reached.
							else {
								echo "There are no parts available.";
							}

							$connection->close();
						?>
					</table>
				</div>
			</div>

			<?php include '../../inc/sceta.org/footer_subLevel_1.php'; ?>
		</div>

		<?php include '../../inc/sceta.org/commonScripts_subLevel_1.php'; ?>
	</body>
</html>