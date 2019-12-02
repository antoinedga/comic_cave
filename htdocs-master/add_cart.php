<?php # Script 19.9 - add_cart.php
session_start();
$s = session_id();
// echo $s;
$page_title = 'Add to Cart';

// checking for comic id
if (isset ($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) 
{
	$cid = $_GET['cid'];
	echo ($cid);
	// Check if the cart already contains one of these comics;
	// If so, increment the quantity:
	if (isset($_SESSION['cart'][$cid])) 
	{
		$_SESSION['cart'][$cid]['quantity']++; // Add another.
		// Display a message:
		echo '<p>Another copy of the comic has been added to your shopping cart.<br />
		<a href="./browse_comics.php" title="browse comics">back to browse</a><br />
		<a href="./stripe/view_cart.php" title="view cart">view cart</a><br />
		</p>';
	} 
	else 
	{ // New product to the cart.
		// Get the comic's price from the database:
		require ('mysqli_connect.php');
		$conn = OpenCon();

		$q = "SELECT price FROM comics WHERE comic_id=$cid";
		$r = mysqli_query ($conn, $q);		
		if (mysqli_num_rows($r) == 1) 
		{ // Valid comic ID.
			// Fetch the information.
			list($price) = mysqli_fetch_array ($r, MYSQLI_NUM);
			
			// Add to the cart:
			$_SESSION['cart'][$cid] = array ('quantity' => 1, 'price' => $price);
			echo '<p>The comic has been added to your shopping cart. <br/>	<a href="./browse_comics.php" title="browse comics">back to browse</a><br />
			<a href="./stripe/view_cart.php" title="view cart">view cart</a><br />

			</p>';
		} 
		else 
		{ // Not a valid comic ID.
			echo '<div align="center">This page has been accessed in error!</div>';
		}
		mysqli_close($conn);
	}
} 
else 
{ // No comic ID.
	echo '<div align="center">This page has been accessed in error!</div>';
}
?>