<?php
	// Checks if the input contains all numeric digits.
	function isAllDigits($input) {
		// Check the input for all numeric digits.
		preg_match("/[0-9]+/", $input, $matches);

		// If the $matches array is empty, then return false.
		if (empty($matches)) {
			return false;
		}

		// Otherwise, check if the first match is equal to that of the input.
		else {
			return ($input == $matches[0]);
		}
	}

	// Checks if the string is a valid first name by checking if it contains
	// only alphabetical letters, both lowercase & uppercase.
	function isValidFirstName($string) {
		// Check the input for only alphabetical letters, both lowercase & uppercase.
		preg_match("/[A-z]+/", $string, $matches);

		// If the $matches array is empty, then return false.
		if (empty($matches)) {
			return false;
		}

		// Otherwise, check if the first match is equal to that of the string.
		else {
			return ($string == $matches[0]);
		}
	}

	// Checks if the string is a valid last name by checking if it contains
	// either only alphabetical letters, both lowercase & uppercase, or dashes.
	function isValidLastName($string) {
		// Check the input for only alphabetical letters, both lowercase
		// and uppercase, or dashes.
		preg_match("/[A-z-]+/", $string, $matches);

		// If the $matches array is empty, then return false.
		if (empty($matches)) {
			return false;
		}

		// Otherwise, check if the first match is equal to that of the string.
		else {
			return ($string == $matches[0]);
		}
	}

	// Checks if the e-mail input is valid by checking 
	function isValidEmail($email) {
		// Define the pattern in portions to clarify which portions of the
		// email string is being checked.
		$pattern = "/^[A-z0-9\._-]+"
    		. "@"
     		. "[A-z0-9][A-z0-9-]*"
     		. "(\.[A-z0-9_-]+)*"
     		. "\.([A-z]{2,6})$/";

     	// Check if the input is a valid email input.
     	preg_match($pattern, $email, $matches);

     	// If the $matches array is empty, then return false.
     	if (empty($matches)) {
     		return false;
     	}

     	// Otherwise, check if the first match is equal to that of the email input.
     	else {
     		return ($email == $matches[0]);
     	}
	}
?>