<?php
	include_once '../../inc/officers.sceta.org/db_connect.php';
	include_once '../../inc/officers.sceta.org/functions.php';

	sec_session_start();

	if (login_check($mysqli) == true) {
		$logged = 'in';
	}

	else {
		$logged = 'out';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>SCETA Officers: Control Panel - Login</title>
		<link rel="stylesheet" href="../css/style.css">
		<script type="text/JavaScript" src="../js/sha512.js"></script>
		<script type="text/JavaScript" src="../js/forms.js"></script>

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<!-- If User is Signed In -->
        <?php if (login_check($mysqli) == true) : header('Location: ../'); ?>
        
        <!-- If User is NOT Signed In -->
        <?php else : ?>
        <div class="bodycontainer">
            <div class="maincontainer">
                <h4>SCETA Officers Control Panel</h4>
                <hr>
                <p>
                	Due to secure login methods, you must manually click "Login" to login instead of hitting enter from the keyboard.
                </p>
                <hr>

                <!-- Display Error Message if Problem Logging In -->
                <?php
					if (isset($_GET['error'])) {
						echo '<p class="error">Error logging in. Please check your User ID and/or Password.</p>';
					}
				?>

                <p>
                    <form action="process/" method="post" name="login_form">
						User ID: <input type="text" name="user"><br><br>
						Password: <input type="password" name="password" id="password"><br><br>
						<input type="button" value="Login" onclick="formhash(this.form, this.form.password);">
					</form>
                </p>
			</div>
		</div>
    	<?php endif; ?>
	</body>
</html>