<?php
	$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

	if (! $error) {
		$error = 'Oops! An unknown error happened.';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>SCETA Officers: Control Panel - Error</title>
		<link rel="stylesheet" href="../css/style.css">

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<h1>There was a problem.</h1>
		<p class="error"><?php echo $error; ?></p>
	</body>
</html>