<?php
	$servername = "lin-mysql17.hostmanagement.net";
	$username = "u142557_3d";
	$password = "Airwolf7400_-_";
	$database = "db142557_3d";

	// Create connection.
	$connection = new mysqli($servername, $username, $password, $database);

	// Check connection.
	if ($connection->connect_error) {
		die ("Connection failed: " . $connection->connect_error);
	}
?>