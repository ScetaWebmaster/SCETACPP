<?php
	$servername = "lin-mysql19.hostmanagement.net";
	$username = "u142557_scetacpp";
	$password = "Airwolf7400_-_";
	$database = "db142557_parts";

	// Create connection.
	$connection = new mysqli($servername, $username, $password, $database);

	// Check connection.
	if ($connection->connect_error) {
		die ("Connection failed: " . $connection->connect_error);
	}
?>