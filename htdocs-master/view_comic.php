<?php # displays the details for a particular comic
session_start();
$s = session_id();
// echo $s;
$row = FALSE; // Assume nothing!

// Make sure there's a comic ID!
if (isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' => 1)) ) 
{
	$cid = $_GET['cid'];
	
	// Get the comic info:
	require ('mysqli_connect.php'); // Connect to the database.
	$conn = OpenCon();
	// echo "Connected Successfully";
	$q = "SELECT 
	CONCAT_WS(' ', artists.first_name, artists.last_name) AS artist, CONCAT_WS(' ', writers.first_name, writers.last_name) AS writer, publishers.publisher_name AS publisher,
	comic_name, price, description, cover_image, quantity 
	FROM artists, writers, publishers, comics 
	WHERE 
	artists.artist_id=comics.artist_id AND 
	writers.writer_id=comics.writer_id AND 
	publishers.publisher_id=comics.publisher_id AND 
	comics.comic_id=$cid";

	$r = mysqli_query ($conn, $q);
	if (mysqli_num_rows($r) > 0) 
	{ // Good to go!
		// Fetch the information:
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
		// Start the HTML page:
		$page_title = $row['comic_name'];
		// include ('components/header.html');
	
		// Display a header:
		echo "<div align=\"center\">
		<b>{$row['comic_name']}</b><br /> illustrated by 
		{$row['artist']}<br /> writtten by {$row['writer']}<br /> published by {$row['publisher']}<br />";

		// Print the quantity or a default message:
		// echo (is_null($row['quantity'])) ? '(No stock information available)' : $row['quantity'];

		// TODO: may change w/ Stripe integration
		echo "<br />\${$row['price']} 
		<a href=\"add_cart.php?cid=$cid\">Add to Cart</a>
		</div><br />";
	
		// Get the image information and display the image:
		if ($image = @getimagesize ("./uploads/$cid")) 
		{
			echo "<div align=\"center\"><img src=\"show_image.php?image=$cid&name=" . urlencode($row['cover_image']) . "\" $image[3] alt=\"{$row['comic_name']}\" /></div>\n";	
		} 
		else 
		{
			echo "<div align=\"center\">No image available.</div>\n"; 
		}
		
		// Add the description or a default message:
		echo '<p align="center">' . ((is_null($row['description'])) ? '(No description available)' : $row['description']) . '</p>';
	}
	
	mysqli_close($conn);

} 

if (!$row) 
{ // Show an error message.
	$page_title = 'Error';
	// include ('includes/header.html');
	echo '<div align="center">This page has been accessed in error!</div>';
}

// Complete the page:
// include ('includes/footer.html');
?>