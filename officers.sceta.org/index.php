<?php
    include_once 'inc/db_connect.php';
    include_once 'inc/functions.php';
    sec_session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SCETA Officers: Control Panel</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <!-- If User is Signed In -->
        <?php if (login_check($mysqli) == true) : ?>
        <div class="bodycontainer">
            <div class="maincontainer">
                <h4>SCETA Officers Control Panel</h4>
                <hr>
                <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>! (<a href="inc/logout.php">Logout</a>)</p>
                <hr>
                <p>
                    <b>Available Actions</b>
                    <ul>
                        <li><a href="update_parts.php">Update Parts</a></li>
                    </ul>
                </p>
            </div>
        </div>

        <!-- If User is NOT Signed In -->
        <?php else : header('Location: login.php'); ?>
        <?php endif; ?>
    </body>
</html>