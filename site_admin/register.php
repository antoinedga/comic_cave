<?php # Script 18.6 - register.php
// This is the registration page for the site.
$page_title = 'Register';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
	// Need the database connection:
	require ('../mysqli_connect.php');
	$conn = OpenCon();
	echo "Connected Successfully";	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	// Assume invalid values:
	$fn = $e = $p = FALSE;
	// Check for a first name:
	if (preg_match('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
		$fn = mysqli_real_escape_string($conn, $trimmed['first_name']);
	} else {
		echo '<p class="error">Please enter your first name!</p>';
	}
	// Check for an email address:
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string($conn, $trimmed['email']);
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}
	// Check for a password and match against the confirmed password:
	if (strlen($trimmed['password1']) >= 10) {
		if ($trimmed['password1'] == $trimmed['password2']) {
			$p = password_hash($trimmed['password1'], PASSWORD_DEFAULT);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password!</p>';
	}
	if ($fn && $e && $p) { // If everything's OK...
		// Make sure the email address is available:
		$q = "SELECT user_id FROM users WHERE email='$e'";
		$r = mysqli_query($conn, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($conn));
		if (mysqli_num_rows($r) == 0) { // Available.
			// Create the activation code:
			$a = md5(uniqid(rand(), true));
			// Add the user to the database:
			$q = "INSERT INTO users (first_name, email, pass) VALUES ('$fn', '$e', '$p')";
			$r = mysqli_query($conn, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($conn));
			if (mysqli_affected_rows($conn) == 1) { // If it ran OK.
				// Send the email:
				echo '<p>Thank you for registering as an admin for Comic Cave.</p>';

				// Finish the page:

				// include('includes/footer.html'); // Include the HTML footer.
				exit(); // Stop the page.
			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
		} else { // The email address is not available.
			echo '<p class="error">That email address has already been registered.</p>';
		}
	} else { // If one of the data tests failed.
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($conn);
} // End of the main Submit conditional.
?>

<h1>Register</h1>
<form action="register.php" method="post">
	<fieldset>

	<p><strong>First Name:</strong> <input type="text" name="first_name" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>"></p>

	<p><strong>Email Address:</strong> <input type="email" name="email" size="30" maxlength="60" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>"> </p>

	<p><strong>Password:</strong> <input type="password" name="password1" size="20" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>"> <small>At least 10 characters long.</small></p>

	<p><strong>Confirm Password:</strong> <input type="password" name="password2" size="20" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>"></p>
	</fieldset>

	<div align="center"><input type="submit" name="submit" value="Register"></div>

</form>