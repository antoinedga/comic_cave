<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Add Publisher</title>
</head>
<body> -->
<?php # allows admin to add publisher

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ // Handle the form.

	// Check for a publisher...
	if (!empty($_POST['publisher_name']))
	{
		$pub = trim($_POST['publisher_name']);

		// Add the publisher to the database:
		require ('../mysqli_connect.php');
		$conn = OpenCon();
		$q = 'INSERT INTO publishers (publisher_name) VALUES (?)';
		$stmt = mysqli_prepare($conn, $q);
		mysqli_stmt_bind_param($stmt, 's', $pub);
		mysqli_stmt_execute($stmt);

		// Check the results....
		if (mysqli_stmt_affected_rows($stmt) == 1)
		{

			$_POST = array();
		}
		else // Error!
		{
			$error = 'The new publisher could not be added to the database!';
		}

		// Close this prepared statement:
		mysqli_stmt_close($stmt);
		mysqli_close($conn); // Close the database connection.

	}
	else // No name value.
	{
		$error = 'Please enter the publisher\'s name!';
	}
}

// Check for an error and print it:
if (isset($error))
{
	echo '<h1>Error!</h1>
	<p style="font-weight: bold; color: #C00">' . $error . ' Please try again.</p>';
}

?>

	<?php if (isset($_POST['publisher'])) echo $_POST['publisher']; ?>


 <?php header("Location: ../Web_app/admin.html"); ?>
