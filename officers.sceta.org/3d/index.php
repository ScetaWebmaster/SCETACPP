<?php
    include_once '../../inc/officers.sceta.org/db_connect.php';
    include_once '../../inc/officers.sceta.org/functions.php';
    sec_session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SCETA Officers: Control Panel - Update Parts</title>
        <link rel="stylesheet" href="../css/style.css">

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
                <h4>Update 3D-Related Features</h4>
                <hr>
                <p>Logged in as <?php echo htmlentities($_SESSION['username']); ?>! (<a href="../logout/">Logout</a>)</p>
                <p><a href="../">Return to Control Panel Home</a></p>
                <hr>

                <p>
                    As of right now, you can only update material statuses. This control panel will be improved to enhance 3D-related management in the near future.
                </p>

                <hr>
                <p>
                    <b>Available Actions</b>
                    <ul>
                        <li><a href="materials/">Update Material Statuses</a></li>
                    </ul>
                </p>
            </div>
        </div>

        <!-- If User is NOT Signed In -->
        <?php else : header('Location: ../login/'); ?>
        <?php endif; ?>
    </body>
</html>