<?php
$order = array();
$result = array();
require ('../mysqli_connect.php'); // Connect to the database.
$conn = OpenCon();
$q = "SELECT 
	comics.comic_name as comic,
	order_info.quantity as quantity,
	orders.customer_email, 
	orders.total,
	orders.order_id,
	orders.order_date
FROM order_info, orders, comics
WHERE orders.order_id=order_info.order_id
AND comics.comic_id=order_info.comic_id";

// Create the table head:

// Display all the prints, linked to URLs:
$r = mysqli_query ($conn, $q);
if (mysqli_num_rows($r) <= 0)
{
	printf("no rows??\n");
}
while ($row = mysql_fetch_array($result))
{
	$order = array("comic_name" => $row['comic'], "quantity" => $row['quantity']);
	//echo json_encode($order);
}

$json = mysqli_fetch_all($r, MYSQLI_ASSOC);

echo json_encode($result);

// order in array
mysqli_close($conn);
?>
