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

		<title>SCETA - Electronic Parts</title>

		<meta name="description" content="SCETA (Southern California Engineering Technologists Association) has been networking with engineering alumni who have been working in the engineering field since 1983. SCETA is an association of students interested in life-long learning and the sharing of knowledge among the various engineering disciplines. One of our goals is to establish a social network for current/future students and alumni.">
		<meta name="keywords" content="SCETA, engineering, technology, networking">
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
		<link rel="stylesheet" href="../css/3cols.css" media="all">
		<link rel="stylesheet" href="../css/4cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>	 

		<!-- Smooth Scroll -->
		<script src="../js/smoothScroll.js"></script>
	</head>

	<body>
		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../inc/sceta.org/header_1.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<?php include '../../inc/sceta.org/sidemenu_services_parts.php'; ?>
						</div>

						<div class="col span_3_of_4">
							<h4>Electronic Parts</h4>
							<p>
								Here at SCETA, we understand how difficult it is to find electronic parts for the individual whether it's for class 
								or just an individual project. We pride ourselves in being one of the main suppliers on campus when the Engineering Stock Room
								cannot provide what we can. 
							</p>

							<p>
								Part sales are conducted at the SCETA office (Building 9, Room 257), but be quick - parts are becoming rarer and 
								they may soon be unfortunately out-of-stock permanently.
							</p>

							<p>
								While shopping for your electronics supplies here at SCETA, please keep in mind the following:
								<ul>
									<li>
										Discounts are available with a SCETA membership. Please visit the <a href="../about/">About page</a>
										for more information on a SCETA membership.
									</li>
									<li>
										All sales are final, which means no refunds or returns will be provided.
									</li>
									<li>
										All prices are subject to change.
									</li>
									<li>
										Cash is highly suggested, especially for $1 parts.
									</li>
								</ul>
							</p>

							<p>
								Below is a list of what we currently supply. Happy electronics shopping!
							</p>

							<h4>Kits & Cables</h4>

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
									include_once '../../inc/sceta.org/connect_parts.php'; 
									// Query select all items from RegularParts table.
									$sql = "SELECT * FROM RegularParts";
									// Gather that into the $result variable.
									$result = $connection->query($sql);

									// Only echo data if there is at least 1.
									if ($result->num_rows > 0) {
										// Identify $row as an object to pull data from.
										while ($row = $result->fetch_assoc()) {
											// Display standard data.
											echo "<tr>" 
												. "<td>" . $row["name"] . "</td>"
												. "<td>" . $row["description"] . "</td>"
												. "<td>" . $row["price_member"] . "</td>"
												. "<td>" . $row["price_regular"] . "</td>";

											// Show "IN STOCK" if status is 1.
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

							<h4>TTL Chips/ICs</h4>

							<table class="dollarParts" border="1">
								<tr class="title">
									<td>Part Name</td>
									<td>Description</td>
									<td>Member Price</td>
									<td>Regular Price</td>
									<td>Status</td>
								</tr>

								<?php 
									// Query select all items from DollarParts table.
									$sql = "SELECT * FROM DollarParts";
									// Gather that into the $result variable.
									$result = $connection->query($sql);

									// Only echo data if there is at least 1.
									if ($result->num_rows > 0) {
										// Identify $row as an object to pull data from.
										while ($row = $result->fetch_assoc()) {
											// Display standard data.
											echo "<tr>" 
												. "<td>" . $row["name"] . "</td>"
												. "<td>" . $row["description"] . "</td>"
												. "<td></td>"
												. "<td></td>";

											// Show "IN STOCK" if status is 1.
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
				</div>
			</div>

			<!-- Main Footer -->
			<?php include '../../inc/sceta.org/footer_main_1.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="../js/top.js"></script>
	</body>
</html>