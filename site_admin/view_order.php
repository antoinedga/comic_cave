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
$temp = array();
$json = mysqli_fetch_all ($r, MYSQLI_ASSOC);

$constants = get_defined_constants(true);
$json_errors = array();
foreach ($constants["json"] as $name => $value) {
    if (!strncmp($name, "JSON_ERROR_", 11)) {
        $json_errors[$value] = $name;
    }
}

// Show the errors for different depths.
var_dump(json_decode($json, true, 4));
echo 'Last error: ', $json_errors[json_last_error()], PHP_EOL, PHP_EOL;

echo json_encode($json);
// order in array
mysqli_close($conn);
?>