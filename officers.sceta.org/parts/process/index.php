<?php
	include_once '../../../inc/officers.sceta.org/db_connect.php';
	include_once '../../../inc/officers.sceta.org/functions.php';
	sec_session_start(); // Our custom secure way of starting a PHP session.
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SCETA Officers: Control Panel</title>
        <link rel="stylesheet" href="../../css/style.css">

        <!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    	<div class="bodycontainer">
            <div class="maincontainer">
            	<h4>Update Parts</h4>
            	<hr>
            	<p><a href="../../">Return to Control Panel Home</a></p>
                <p>Logged in as <?php echo htmlentities($_SESSION['username']); ?>! (<a href="../../logout/">Logout</a>)</p>
                <hr>

				<?php
					$db = $_REQUEST['db'];
					$id = $_REQUEST['id'];
					$name = $_REQUEST['name'];
					$description = $_REQUEST['description'];
					$status = $_REQUEST['status'];

					// Only perform the update if the login session is still valid.
					if (login_check($mysqli) == true) {
						// Connect to the parts database.
						include_once '../../../inc/sceta.org/connect_parts.php';

						if ($db == 0) {
							$price_member = $_REQUEST['price_member'];
							$price_regular = $_REQUEST['price_regular'];

							// Select the data.
							$sql = "SELECT * FROM RegularParts WHERE id = $id";
							// Gather the data into the $result variable.
							$result = $connection->query($sql);

							// Only echo data if there is at least 1.
	                        if ($result->num_rows > 0) {
	                            // Identify $row as an object to pull data from.
	                            while ($row = $result->fetch_assoc()) {
	                                if ($name != $row["name"]) {
	                                	$sql1 = "UPDATE RegularParts SET name = '$name' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Name: " . $row["name"] . " was updated to $name.</b></p>";
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }

	                                if ($description != $row["description"]) {
	                                	$sql1 = "UPDATE RegularParts SET description = '$description' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Description: " . $row["description"] . " was updated to $description.</b></p>";
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }

	                                if ($price_member != $row["price_member"]) {
	                                	$sql1 = "UPDATE RegularParts SET price_member = '$price_member' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Member Price: " . $row["price_member"] . " was updated to $price_member.</b></p>";
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }

	                                if ($price_regular != $row["price_regular"]) {
	                                	$sql1 = "UPDATE RegularParts SET price_regular = '$price_regular' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Regular Price: " . $row["price_regular"] . " was updated to $price_regular.</b></p>";
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }

	                                if ($status != $row["status"]) {
	                                	$sql1 = "UPDATE RegularParts SET status = '$status' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Status: ";

	                                		if ($row["status"] == 0) {
	                                			echo "OUT OF STOCK was updated to IN STOCK.</b></p>";
	                                		}

	                                		else {
	                                			echo "IN STOCK was updated to OUT OF STOCK.</b></p>";
	                                		}
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }
	                            }
	                        }

	                        // Otherwise, state that there are no parts available.
	                        // This is a failsafe condition. Ideally, this should never be reached.
	                        else {
	                            echo "<p>Not Available</p>";
	                        }
	                    }

	                    else if ($db == 1) {
	                    	// Select the data.
							$sql = "SELECT * FROM DollarParts WHERE id = $id";
							// Gather the data into the $result variable.
							$result = $connection->query($sql);

							// Only echo data if there is at least 1.
	                        if ($result->num_rows > 0) {
	                            // Identify $row as an object to pull data from.
	                            while ($row = $result->fetch_assoc()) {
	                                if ($name != $row["name"]) {
	                                	$sql1 = "UPDATE DollarParts SET name = '$name' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Name: " . $row["name"] . " was updated to $name.</b></p>";
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }

	                                if ($description != $row["description"]) {
	                                	$sql1 = "UPDATE DollarParts SET description = '$description' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Description: " . $row["description"] . " was updated to $description.</b></p>";
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }

	                                if ($status != $row["status"]) {
	                                	$sql1 = "UPDATE DollarParts SET status = '$status' WHERE id = $id";
	                                	if ($connection->query($sql1) == TRUE) {
	                                		echo "<p><b class='success'>Status: ";

	                                		if ($row["status"] == 0) {
	                                			echo "OUT OF STOCK was updated to IN STOCK.</b></p>";
	                                		}

	                                		else {
	                                			echo "IN STOCK was updated to OUT OF STOCK.</b></p>";
	                                		}
	                                	}

	                                	else {
	                                		echo "Error updating record: " . $connection->error;
	                                	}
	                                }
	                            }
	                        }

	                        // Otherwise, state that there are no parts available.
	                        // This is a failsafe condition. Ideally, this should never be reached.
	                        else {
	                            echo "<p>Not Available</p>";
	                        }
	                    }

	                    echo "<p><a href='../'>Return to Parts List</a></p>";

	                    $connection->close();
					}

					else {
						echo "<p class='error'>Your login session has abruptly ended. Please login again.</p>";
					}
				?>
			</div>
		</div>
	</body>
</html>