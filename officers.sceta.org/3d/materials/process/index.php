<?php
	include_once '../../../../inc/officers.sceta.org/db_connect.php';
	include_once '../../../../inc/officers.sceta.org/functions.php';
	sec_session_start(); // Our custom secure way of starting a PHP session.
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SCETA Officers: Control Panel</title>
        <link rel="stylesheet" href="../../../css/style.css">

        <!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    	<div class="bodycontainer">
            <div class="maincontainer">
            	<h4>Update 3D-Related Features</h4>
            	<hr>
                <p>Logged in as <?php echo htmlentities($_SESSION['username']); ?>! (<a href="../../../logout/">Logout</a>)</p>
            	<p><a href="../../../">Return to Control Panel Home</a></p>
                <hr>

				<?php
					$id = $_REQUEST['id'];
					$name = $_REQUEST['name'];
					$material = $_REQUEST['material'];
					$status = $_REQUEST['status'];

					// Only perform the update if the login session is still valid.
					if (login_check($mysqli) == true) {
						// Connect to the 3D database.
						include_once '../../../../inc/sceta.org/connect_3d.php';

						// Select the data.
						$sql = "SELECT * FROM Materials WHERE id = $id";
						// Gather the data into the $result variable.
						$result = $connection->query($sql);

						// Only echo data if there is at least 1.
                        if ($result->num_rows > 0) {
                            // Identify $row as an object to pull data from.
                            while ($row = $result->fetch_assoc()) {
                                if ($name != $row["name"]) {
                                	$sql1 = "UPDATE Materials SET name = '$name' WHERE id = $id";
                                	if ($connection->query($sql1) == TRUE) {
                                		echo "<p><b class='success'>Name: " . $row["name"] . " was updated to $name.</b></p>";
                                	}

                                	else {
                                		echo "Error updating record: " . $connection->error;
                                	}
                                }

                                if ($material != $row["material"]) {
                                	$sql1 = "UPDATE Materials SET material = '$material' WHERE id = $id";
                                	if ($connection->query($sql1) == TRUE) {
                                		echo "<p><b class='success'>Material: " . $row["material"] . " was updated to $material.</b></p>";
                                	}

                                	else {
                                		echo "Error updating record: " . $connection->error;
                                	}
                                }

                                if ($status != $row["status"]) {
                                	$sql1 = "UPDATE Materials SET status = '$status' WHERE id = $id";
                                	if ($connection->query($sql1) == TRUE) {
                                		echo "<p><b class='success'>Status: ";

                                		if ($row["status"] == 0) {
                                			echo "UNAVAILABLE was updated to AVAILABLE.</b></p>";
                                		}

                                		else {
                                			echo "AVAILABLE was updated to UNAVAILABLE.</b></p>";
                                		}
                                	}

                                	else {
                                		echo "Error updating record: " . $connection->error;
                                	}
                                }
                            }
	                    }

	                    echo "<p><a href='../'>Return to Materials List</a></p>";

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