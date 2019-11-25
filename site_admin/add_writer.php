<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Add Writer</title>
</head>
<body>
<?php # allows admin to add writer 

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
		echo "Connected Successfully";
		$q = 'INSERT INTO writers (first_name, last_name) VALUES (?, ?)';
		$stmt = mysqli_prepare($conn, $q);
		mysqli_stmt_bind_param($stmt, 'ss', $fn, $ln);
		mysqli_stmt_execute($stmt);
		
		// Check the results....
		if (mysqli_stmt_affected_rows($stmt) == 1) 
		{
			echo '<p>The writer has been added.</p>';
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
	echo '<h1>Error!</h1>
	<p style="font-weight: bold; color: #C00">' . $error . ' Please try again.</p>';
}

// Display the form...
?>
<h1>Add a Writer</h1>
<form action="add_writer.php" method="post">
	
	<fieldset><legend>Fill out the form to add a writer:</legend>
	
	<p><b>First Name:</b> <input type="text" name="first_name" size="10" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p><b>Last Name:</b> <input type="text" name="last_name" size="10" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	
	</fieldset>
		
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>

</form>

</body>
</html>