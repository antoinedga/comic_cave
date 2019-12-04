<style>
<?php include 'login.css'; ?>
</style>
<?php # login script 
session_start();
$page_title = 'Login';

if (isset($_SESSION['first_name'])) {
	$url = '../Web_app/admin.php';
	header("Location: $url");
	exit();
}


$loggedin = false;
$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('../mysqli_connect.php');
	$conn = OpenCon();
	// Validate the email address:
	if (!empty($_POST['email'])) {
		$e = mysqli_real_escape_string($conn, $_POST['email']);
	} else {
		$e = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}
	// Validate the password:
	if (!empty($_POST['pass'])) {
		$p = mysqli_real_escape_string ($conn, $_POST['pass']);
	} else {
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}
	if ($e && $p) { // If everything's OK.
		// Query the database:
		echo 'ok';
		$q = "SELECT * FROM users WHERE email='$e'";
		$r = mysqli_query($conn, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($conn));

		if (@mysqli_num_rows($r) == 1) { // A match was made.
			echo 'result';
			// Fetch the values:
			list($user_id, $first_name, $email, $pass) = mysqli_fetch_array($r, MYSQLI_NUM);
			mysqli_free_result($r);
			// Check the password:

			if (password_verify($p, $pass)) {
				echo 'verified';

				// Store the info in the session:
				$_SESSION['user_id'] = $user_id;
				$_SESSION['first_name'] = $first_name;
				$loggedin=true;
				mysqli_close($conn);
				// Redirect the user:
				$url = '../Web_app/admin.php'; // Define the URL.
				ob_end_clean(); // Delete the buffer.
				header("Location: $url");
				exit(); // Quit the script.
			} else {
				echo '<p class="error">Either the email address or password entered do not match those on file.</p>';
			}
		} else { // No match was made.
			echo '<p class="error"> Either the email address or password entered do not match those on file.</p>';
			printf("outer erro,, no rows T-T %s\n", $e);
		}
	} else { // If everything wasn't OK.
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($conn);
} // End of SUBMIT conditional.
?>
<!-- 
<div class="login-page">
	<div class="form">
		<form action="login.php" method="post">
			<fieldset>
			<p><strong>Email Address:</strong> <input type="email" name="email" size="20" maxlength="60"></p>
			<p><strong>Password:</strong> <input type="password" name="pass" size="20" maxlength="20"/></p>
			<div align="center"><input type="submit" name="submit" value="Login"></div>
			</fieldset>
		</form>
	</div>
</div> -->


<form action="login.php" method="post" class="login-form">
<!-- <form class="login-form"> -->
	<p class="login-text">
		<span class="fa-stack fa-lg">
		<!-- <i class="fa fa-circle fa-stack-2x"></i> -->
		<i class="fa fa-lock fa-stack-1x"></i>
		</span>
	</p>
 
	<fieldset>
		<input type="email" class="login-username" autofocus="true" required="true" placeholder="Email" name="email" />
		<input type="password" class="login-password" required="true" placeholder="Password" name="pass"/>
		<input type="submit" name="Login" value="Login" class="login-submit" />
	</fieldset>
</form>
<div class="underlay-photo"></div>
<div class="underlay-black"></div> 