<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Add a Comic</title>
</head>
<body>
<?php # allows the administrator to add a comic (product).

require ('../mysqli_connect.php');
$conn = OpenCon();
echo "Connected Successfully";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ // Handle the form.
	
	// Validate the incoming data...
	$errors = array();

	// Check for a comic name:
	if (!empty($_POST['comic_name'])) 
	{
		$cn = trim($_POST['comic_name']);
	} 
	else 
	{
		$errors[] = 'Please enter the comics\'s name!';
	}
	
	// Check for an image:
	if (is_uploaded_file ($_FILES['image']['tmp_name'])) 
	{
		// Create a temporary file name:
		$temp = '../../uploads/' . md5($_FILES['image']['name']);
	
		// Move the file over:
		if (move_uploaded_file($_FILES['image']['tmp_name'], $temp)) 
		{
			echo '<p>The file has been uploaded!</p>';
	
			// Set the $i variable to the image's name:
			$i = $_FILES['image']['name'];
		} 
		else
		{ // Couldn't move the file over.
			$errors[] = 'The file could not be moved.';
			$temp = $_FILES['image']['tmp_name'];
		}
	} 
	else  // No uploaded file.
	{
		$errors[] = 'No file was uploaded.';
		$temp = NULL;
	}
	
	// Check for a price:
	if (is_numeric($_POST['price']) && ($_POST['price'] > 0)) 
	{
		$p = (float) $_POST['price'];
	} 
	else 
	{
		$errors[] = 'Please enter the comic\'s price!';
	}

	// Check for a description (not required):
	$d = (!empty($_POST['description'])) ? trim($_POST['description']) : NULL;
	
	// Validate the artist...
	if ( isset($_POST['artist']) && filter_var($_POST['artist'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) 
	{
		$a = $_POST['artist'];
	} 
	else // No artist selected.
	{ 
		$errors[] = 'Please select the comic\'s artist!';
	}
	
	// Validate the writer...
	if ( isset($_POST['writer']) && filter_var($_POST['writer'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) 
	{
		$w = $_POST['writer'];
	} 
	else // No writer selected. 
	{ 
		$errors[] = 'Please select the comic\'s writer!';
	}

	// Validate the publisher...
	if ( isset($_POST['publisher']) && filter_var($_POST['publisher'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) 
	{
		$pub = $_POST['publisher'];
	} 
	else  // No publisher selected. 
	{
		$errors[] = 'Please select the comics\'s publisher!';
	}

	if ( isset($_POST['quan']) && filter_var($_POST['quan'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) 
	{
		$quan = $_POST['quan'];
	} 
	else // No quantity entered. 
	{ 
		$errors[] = 'Please enter the comics\'s quantity!';
	}

	// If no errors..
	if (empty($errors)) 
	{ 
		// Add the comic to the database:
		$q = 'INSERT INTO comics (artist_id, writer_id, publisher_id, comic_name, price, description, image_name, quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$stmt = mysqli_prepare($conn, $q);
		mysqli_stmt_bind_param($stmt, 'iiisdssi', $a, $w, $pub, $cn, $p, $d, $i, $quan);
		mysqli_stmt_execute($stmt);
		
		// Check the results...
		if (mysqli_stmt_affected_rows($stmt) == 1) 
		{
			// Print a message:
			echo '<p>The comic has been added.</p>';
	
			// Rename the image:
			$id = mysqli_stmt_insert_id($stmt); // Get the comic ID.
			rename ($temp, "../../uploads/$id");
	
			// Clear $_POST:
			$_POST = array();
	
		} 
		else // Error!
		{ 
			echo '<p style="font-weight: bold; color: #C00">Your submission could not be processed due to a system error.</p>'; 
		}
		mysqli_stmt_close($stmt);
	}
	
	// Delete the uploaded file if it still exists:
	if ( isset($temp) && file_exists ($temp) && is_file($temp) ) 
	{
		unlink ($temp);
	}
}

// Check for any errors and print them:
if ( !empty($errors) && is_array($errors) ) 
{
	echo '<h1>Error!</h1>
	<p style="font-weight: bold; color: #C00">The following error(s) occurred:<br />';
	foreach ($errors as $msg) 
	{
		echo " - $msg<br />\n";
	}
	echo 'Please reselect the comic image and try again.</p>';
}

// Display the form...
?>
<h1>Add a Comic</h1>
<form enctype="multipart/form-data" action="add_comic.php" method="post">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	
	<fieldset><legend>Fill out the form to add a comic to the catalog:</legend>
	
	<p><b>Comic Name:</b> <input type="text" name="comic_name" size="30" maxlength="60" value="<?php if (isset($_POST['comic_name'])) echo htmlspecialchars($_POST['comic_name']); ?>" /></p>
	
	<p><b>Image:</b> <input type="file" name="image" /></p>
	
	<p><b>Artist:</b> 
	<select name="artist"><option>Select One</option>
	<?php // Retrieve all the artists and add to the pull-down menu.
	$q = "SELECT artist_id, CONCAT_WS(' ', first_name, last_name) FROM artists ORDER BY last_name, first_name ASC";		
	$r = mysqli_query ($conn, $q);
	if (mysqli_num_rows($r) > 0) {
		while ($row = mysqli_fetch_array ($r, MYSQLI_NUM)) {
			echo "<option value=\"$row[0]\"";
			// Check for stickyness:
			if (isset($_POST['artist']) && ($_POST['artist'] == $row[0]) ) echo ' selected="selected"';
			echo ">$row[1]</option>\n";
		}
	} else {
		echo '<option>Please add a new artist first.</option>';
	}
	// mysqli_close($conn); // Close the database connection.
	?>
	</select></p>

	<p><b>Writer:</b> 
	<select name="writer"><option>Select One</option>
	<?php // Retrieve all the artists and add to the pull-down menu.
	$q = "SELECT writer_id, CONCAT_WS(' ', first_name, last_name) FROM writers ORDER BY last_name, first_name ASC";		
	$r = mysqli_query ($conn, $q);
	if (mysqli_num_rows($r) > 0) {
		while ($row = mysqli_fetch_array ($r, MYSQLI_NUM)) {
			echo "<option value=\"$row[0]\"";
			// Check for stickyness:
			if (isset($_POST['writer']) && ($_POST['writer'] == $row[0]) ) echo ' selected="selected"';
			echo ">$row[1]</option>\n";
		}
	} else {
		echo '<option>Please add a new writer first.</option>';
	}
	// mysqli_close($conn); // Close the database connection.
	?>
	</select></p>

	<p><b>Publisher:</b> 
	<select name="publisher"><option>Select One</option>
	<?php // Retrieve all the artists and add to the pull-down menu.
	$q = "SELECT publisher_id, CONCAT_WS(' ', publisher_name) FROM publishers ORDER BY publisher_name ASC";		
	$r = mysqli_query ($conn, $q);
	if (mysqli_num_rows($r) > 0) {
		while ($row = mysqli_fetch_array ($r, MYSQLI_NUM)) {
			echo "<option value=\"$row[0]\"";
			// Check for stickyness:
			if (isset($_POST['publisher']) && ($_POST['publisher'] == $row[0]) ) echo ' selected="selected"';
			echo ">$row[1]</option>\n";
		}
	} else {
		echo '<option>Please add a new publisher first.</option>';
	}
	mysqli_close($conn); // Close the database connection.
	?>
	</select></p>
	
	<p><b>Price:</b> <input type="text" name="price" size="10" maxlength="10" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" /> <small>Do not include the dollar sign or commas.</small></p>
	
	<p><b>Quantity:</b> <input type="text" name="quan" size="30" maxlength="10" value="<?php if (isset($_POST['quan'])) echo $_POST['quan']; ?>" /> Quantity in stock</p>
	
	<p><b>Description:</b> <textarea name="description" cols="40" rows="5"><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea> (optional)</p>
	
	</fieldset>
		
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>

</form>

</body>
</html>