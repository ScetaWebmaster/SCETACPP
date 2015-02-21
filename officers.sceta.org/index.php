<?php
    include_once 'inc/db_connect.php';
    include_once 'inc/functions.php';
    sec_session_start();

    if (login_check($mysqli) == FALSE) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SCETA Officers: Control Panel</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php 
            // If the User is Signed In
            if (login_check($mysqli) == true) {
                echo "<div class='bodycontainer'>
                        <div class='maincontainer'>
                            <h4>SCETA Officers Control Panel</h4>
                            <hr>
                            <p>Welcome ";
                echo htmlentities($_SESSION['username']);
                echo '! (<a href="inc/logout.php">Logout</a>)</p>
                            <hr>
                            <p>
                                <b>Available Actions</b>
                                <ul>
                                    <li><a href="update_parts.php">Update Parts</a></li>
                                </ul>
                            </p>
                        </div>
                    </div>';
            }
        ?>
    </body>
</html>