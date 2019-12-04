<?php
require ('../mysqli_connect.php'); // Connect to the database.
$conn = OpenCon();
$q = "SELECT 
    JSON_ARRAYAGG(JSON_OBJECT('comic',comics.comic_name, 'quantity', order_info.quantity )) as items,
    orders.customer_email, 
    orders.total,
    orders.order_id,
    orders.order_date 
FROM order_info, orders, comics
WHERE orders.order_id=order_info.order_id
AND comics.comic_id=order_info.comic_id";

// Display all the prints, linked to URLs:
$r = mysqli_query ($conn, $q);
if (mysqli_num_rows($r) <= 0)
{
    printf("no rows??\n");
}
$json = mysqli_fetch_all ($r, MYSQLI_ASSOC);
$temp = json_decode($json[0]['items'], true, 4);

//$temp = json_decode(json_encode($json), true, 4);

echo json_encode($temp);
// order in array
mysqli_close($conn);
?>