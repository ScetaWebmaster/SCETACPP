<?php
	// Define the static parts MySQL database configuration.
	$servername = "lin-mysql19.hostmanagement.net";
	$username = "u142557_scetacpp";
	$password = "Airwolf7400_-_";
	$database = "db142557_parts";

	// Create the MySQL connection.
	$connection = new mysqli($servername, $username, $password, $database);

	// Check the MySQL connection.
	if ($connection->connect_error) {
		die ("Connection failed: " . $connection->connect_error);
	}
?>