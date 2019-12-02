
<?php # allows admin to add writer
// hopefully it works
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Validate the first name (not required):
	$fn = (!empty($_POST['first_name'])) ? trim($_POST['first_name']) : NULL;


	// Check for a last_name...
	if (!empty($_POST['last_name']))
	{
		$ln = trim($_POST['last_name']);

		// Add the writer to the database:
		require ('../mysqli_connect.php');
		$conn = OpenCon();

		$q = 'INSERT INTO writers (first_name, last_name) VALUES (?, ?)';
		$stmt = mysqli_prepare($conn, $q);
		mysqli_stmt_bind_param($stmt, 'ss', $fn, $ln);
		mysqli_stmt_execute($stmt);

		// Check the results....
		if (mysqli_stmt_affected_rows($stmt) == 1)
		{
			$_POST = array();
		}
		else  // Error!
		{
			$error = 'The new writer could not be added to the database!';
		}

		// Close this prepared statement:
		mysqli_stmt_close($stmt);
		mysqli_close($conn); // Close the database connection.

	}
	else // No last name value.
	{
		$error = 'Please enter the writer\'s name!';
	}
}

// Check for an error and print it:
if (isset($error))
{

}
if (isset($_POST['first_name'])) echo $_POST['first_name'];
if (isset($_POST['last_name'])) echo $_POST['last_name'];
// Display the form...
?>
