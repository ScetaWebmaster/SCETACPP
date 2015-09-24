<?php
	function sendMail($to, $from, $subject, $reply_to, $emailMsg, $host_username, $host_pwd) {
		// PEAR Mail Configuration
		require_once "Mail.php"; // PEAR mail is already installed in the current environment.
		require_once "Mail/mime.php"; // Allow HTML text.
		
		// Allow HTML message.
		$mime = new Mail_mime();
		$mime->setHTMLBody($emailMsg);
		$emailMsg = $mime->get();

		// Create the e-mail headers.
		$auth = array("host" => "mail.sceta.org", "auth" => true, "username" => $host_username, "password" => $host_pwd);
		$headers = array("From" => $from, "To" => $to, "Subject" => $subject, "Reply-To" => $reply_to);
		$headers = $mime->headers($headers);

		// Send the e-mail.
		$smtp = Mail::factory("smtp", $auth);
		$mail = $smtp->send($to, $headers, $emailMsg);

		// If there was an error sending the e-mail, then return false.
		if (PEAR::isError($mail)) {
			return $mail->ErrorInfo;
		}

		// Otherwise, return true.
		else {
			return "";
		}
	}

	// Returns a clean string if it contains any of the following bad text.
	function cleanString($string) {
		// Define a list of bad text.
  		$badText = array("content-type", "bcc:", "to:", "cc:", "href");

  		// Return a cleaned string (if applicable).
  		return str_replace($badText, "", $string);
	}
?>