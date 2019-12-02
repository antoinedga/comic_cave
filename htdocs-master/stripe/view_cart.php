<?php # show/edit shopping cart
session_start();
$s = session_id();
// echo $s;
$page_title = 'View Your Shopping Cart';
// Check if the form has been submitted (to update the cart):
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	foreach ($_POST['qty'] as $k => $v) 
	{
		$cid = (int) $k;
		$qty = (int) $v;
		if ( $qty == 0 )	 // Delete.
		{
			unset ($_SESSION['cart'][$cid]);
		} 
		elseif ( $qty > 0 )	// Change quantity.
		{
			$_SESSION['cart'][$cid]['quantity'] = $qty;
		}
	} 
}

if (!isset($_SESSION))
	echo("no session");
// Display the cart if it's not empty...
if (!empty($_SESSION['cart'])) 
{
	// Retrieve all of the information for the comics in the cart:
	require ('../mysqli_connect.php');
	$conn = OpenCon();
	$q = "SELECT comic_id, comic_name, price FROM comics WHERE comics.comic_id IN (";
	// $q = "SELECT comic_id, CONCAT_WS(' ', artists.first_name, last_name) AS artist, comic_name FROM artists, comics WHERE artists.artist_id = comics.artist_id AND comics.comic_id IN (";
	foreach ($_SESSION['cart'] as $cid => $value)
	{
		$q .= $cid . ',';
	}
	$q = substr($q, 0, -1) . ') ORDER BY comics.comic_name ASC';
	$r = mysqli_query ($conn, $q);
	// Create a form and a table:
	echo '<form action="view_cart.php" method="post">
	<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
	<tr>
		<td align="left" width="30%"><strong>Comic Name</strong></td>
		<td align="right" width="10%"><strong>Price</strong></td>
		<td align="center" width="10%"><strong>Qty</strong></td>
		<td align="right" width="10%"><strong>Total Price</strong></td>
	</tr>
	';
	// Print each item...
	$total = 0; // Total cost of the order.
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
		// Calculate the total and sub-totals.
		$subtotal = $_SESSION['cart'][$row['comic_id']]['quantity'] * $_SESSION['cart'][$row['comic_id']]['price'];
		$total += $subtotal;
		// Print the row:
		echo "\t<tr>
		<td align=\"left\">{$row['comic_name']}</td>
		<td align=\"right\">\${$_SESSION['cart'][$row['comic_id']]['price']}</td>
		<td align=\"center\"><input type=\"text\" size=\"3\" name=\"qty[{$row['comic_id']}]\" value=\"{$_SESSION['cart'][$row['comic_id']]['quantity']}\"></td>
		<td align=\"right\">$" . number_format ($subtotal, 2) . "</td>
		</tr>\n";
	} // End of the WHILE loop.
	mysqli_close($conn); // Close the database connection.
	// Print the total, close the table, and the form:
	echo '<tr>
		<td colspan="4" align="right"><strong>Total:</strong></td>
		<td align="right">$' . number_format ($total, 2) . '</td>
	</tr>
	</table>
	<div align="center"><input type="submit" name="submit" value="Update My Cart"></div>
	</form><p align="center">Enter a quantity of 0 to remove an item.
	<br><br><a href="checkout.php">Checkout</a></p>';
} else {
	echo '<p>Your cart is currently empty.<br/> 
	<a href="./browse_comics.php" title="browse comics">back to browse</a><br /></p>';
}
?>

<html>
<head>
<!-- The Styling File -->
<link rel="stylesheet" href="./style.css"/>
</head>
<body>
<form action="./charge.php" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element">Credit or debit card</label>
    <div id="card-element">
      <!-- a Stripe Element will be inserted here. -->
    </div>
    <!-- Used to display form errors -->
    <div id="card-errors"></div>
  </div>
  <button>Submit Payment</button>
</form>
<!-- The needed JS files -->
<!-- JQUERY File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Your JS File -->
<script src="./charge.js"></script>
</body>
</html>

<!-- <td align="left" width="30%"><strong>Artist</strong></td> -->


<!-- <td align=\"left\">{$row['artist']}</td> --> 