
<?php # allows the administrator to add a comic (product).
require ('../mysqli_connect.php');
$conn = OpenCon();

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
		$temp = '../uploads/' . md5($_FILES['image']['name']);

		// Move the file over:
		if (move_uploaded_file($_FILES['image']['tmp_name'], $temp))
		{
			// FIXME: need to store as image name
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
		$i = "unavailable.jpg";
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
	if ( isset($_POST['rel']) && (filter_var($_POST['rel'], FILTER_VALIDATE_INT, array('min_range' => 0)) || (filter_var($_POST['rec'], FILTER_VALIDATE_INT) === 0)))
	{
		$rel = $_POST['rel'];
	}
	else // No quantity entered.
	{
		$errors[] = 'Please enter whether the comics\'s released or not!';
	}
	if ( isset($_POST['rec']) && (filter_var($_POST['rec'], FILTER_VALIDATE_INT, array('min_range' => 0))  || (filter_var($_POST['rec'], FILTER_VALIDATE_INT) === 0)))
	{
		$rec = $_POST['rec'];
	}
	else // No quantity entered.
	{
		$errors[] = 'Please enter if the comics\'s recommended!';
	}
	// If no errors..
	if (empty($errors))
	{
		// Add the comic to the database:
		$q = 'INSERT INTO comics (artist_id, publisher_id, writer_id, comic_name, price, description, cover_image, quantity, released, recommended) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$stmt = mysqli_prepare($conn, $q);
		mysqli_stmt_bind_param($stmt, 'iiisdssiii', $a, $pub, $w, $cn, $p, $d, $i, $quan, $rel, $rec);
		mysqli_stmt_execute($stmt);

		// Check the results...
		if (mysqli_stmt_affected_rows($stmt) == 1)
		{
			// Print a message:

			// Rename the image:
			// $id = mysqli_stmt_insert_id($stmt); // Get the comic ID.
			// rename ($temp, "../uploads/$id");

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



<?php if (isset($_POST['comic_name'])) echo htmlspecialchars($_POST['comic_name']); ?>

	<?php if (isset($_POST['price'])) echo $_POST['price']; ?>

<?php if (isset($_POST['quan'])) echo $_POST['quan']; ?>

<?php if (isset($_POST['description'])) echo $_POST['description']; ?>

	<?php if (isset($_POST['rel'])) echo $_POST['rel']; ?>

	<?php if (isset($_POST['rec'])) echo $_POST['rec']; ?>
