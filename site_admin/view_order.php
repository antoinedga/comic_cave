<?php
$test = array();
require ('../mysqli_connect.php'); // Connect to the database.
$conn = OpenCon();
$q = "SELECT JSON_ARRAYAGG(JSON_OBJECT('comic',comics.comic_name, 'quantity', order_info.quantity )) as items,
    orders.customer_email,
    orders.total,
    orders.order_id,
    orders.order_date
FROM order_info, orders, comics
WHERE orders.order_id=order_info.order_id
AND comics.comic_id=order_info.comic_id";

// Function to change the row 'items' to a php array
function rowChange($value, $key)
{
	if ($key == 'items')
	{
		$temp = clone $value;
		$value = json_encode((object) null);
		settype($value, "array");
		$value = json_decode($temp);
	}
}

// Display all the prints, linked to URLs:
$r = mysqli_query ($conn, $q);
if (mysqli_num_rows($r) <= 0)
{
    printf("no rows??\n");
}
$json = mysqli_fetch_all ($r, MYSQLI_ASSOC);
array_walk_recursive($json, 'rowChange');
echo json_encode($json);
// order in array
mysqli_close($conn);
?>
