<?php
    include_once '../../../inc/officers.sceta.org/db_connect.php';
    include_once '../../../inc/officers.sceta.org/functions.php';
    sec_session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SCETA Officers: Control Panel - Update Parts</title>
        <link rel="stylesheet" href="../../css/style.css">

        <!-- Responsive and Mobile Friendly Stuff -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <!-- If User is Signed In -->
        <?php if (login_check($mysqli) == true) : ?>
        <div class="bodycontainer">
            <div class="maincontainer">
                <h4>Update Parts</h4>
                <hr>
                <p><a href="../../">Return to Control Panel Home</a></p>
                <p>Logged in as <?php echo htmlentities($_SESSION['username']); ?>! (<a href="../../logout/">Logout</a>)</p>
                <hr>

                <!-- If no part was selected, display the list of parts to chose from. -->
                <?php if (!isset($_GET["db"]) && !isset($_GET["id"])) : ?>
                <p>
                    Click on any material you wish to update. Unfortunately, current limitations mean you will have to update a part
                    one-by-one. However, for the most part, you won't be handling multiple materials anyways.
                </p>
                <hr>
                <p>
                    <b>Available Materials</b>
                    <ul>
                        <?php 
                            // Connect to the 3D database.
                            include_once '../../../inc/sceta.org/connect_3d.php'; 
                            // Query select all items from Materials table.
                            $sql = "SELECT * FROM Materials";
                            // Gather that into the $result variable.
                            $result = $connection->query($sql);

                            // Only echo data if there is at least 1.
                            if ($result->num_rows > 0) {
                                // Identify $row as an object to pull data from.
                                while ($row = $result->fetch_assoc()) {
                                    // Display standard data.
                                    echo "<li><a href='?id=" . $row["id"] . "'>" . $row["name"] . " (" . $row["material"] . ")</a></li>";
                                }
                            }

                            // Otherwise, state that there are no parts available.
                            // This is a failsafe condition. Ideally, this should never be reached.
                            else {
                                echo "<li>Not Available</li>";
                            }

                            $connection->close();
                        ?>
                    </ul>
                </p>

            <!-- If a part was chosen, that means DB and ID parameters have been made. -->
            <?php elseif(isset($_GET["id"])) : ?>
                <p>
                    <a href="../materials/">Back to Materials</a>
                </p>

                <form action="process/" method="post" name="update_3d_materials_form">

                <?php 
                    // Connect to the 3D database.
                    include_once '../../../inc/sceta.org/connect_3d.php'; 
                    $id = $_GET["id"];
                    // Query select all items from Materials table.
                    $sql = "SELECT * FROM Materials WHERE id = $id";
                    // Gather that into the $result variable.
                    $result = $connection->query($sql);

                    // Only echo data if there is at least 1.
                    if ($result->num_rows > 0) {
                        // Identify $row as an object to pull data from.
                        while ($row = $result->fetch_assoc()) {
                            // Display standard data.
                            echo 'Name: <input type="text" name="name" value="' . $row["name"] . '"><br>';
                            echo 'Material: <input type="text" name="material" value="' . $row["material"] . '"><br>';
                            echo 'Status: <select name="status"><option value="0"';
                            
                            // If status is UNAVAILABLE, set that as default selection.
                            if ($row["status"] == 0) { 
                                echo ' selected="selected"';
                            }

                            echo '>UNAVAILABLE</option>';
                            echo '<option value="1"';

                            // Otherwise, status is AVAILABLE, set that as default selection.
                            if ($row["status"] == 1) {
                                echo ' selected="selected"';
                            }

                            echo '>AVAILABLE</option></select>';
                        }
                    }

                    // Otherwise, state that there are no materials available.
                    // This is a failsafe condition. Ideally, this should never be reached.
                    else {
                        echo "<p>Not Available</p>";
                    }

                    $connection->close();
                ?>

                <?php echo '<input type="hidden" name="id" value="' . $_GET["id"] . '">'; ?>
                <br><br>
                <input type="submit" value="Update">
                </form>
            </p>

            <!-- Otherwise, problems. -->
            <?php else : ?>
            <p class="error">
                ERROR: The ID parameter has not been specified.
            </p>

            <p><a href="../materials/">Back</a></p>

            <?php endif; ?>
            </div>
        </div>

        <!-- If User is NOT Signed In -->
        <?php else : header('Location: ../../login/'); ?>
        <?php endif; ?>
    </body>
</html>