<?php
require ('../mysqli_connect.php');
$conn = OpenCon();

 // Retrieve all the artists and add to the pull-down menu.
$q = "SELECT artist_id, CONCAT_WS(' ', first_name, last_name) FROM artists ORDER BY last_name, first_name ASC";
$r = mysqli_query ($conn, $q);
$artist = mysqli_fetch_all ($r, MYSQLI_NUM);

// mysqli_close($conn); // Close the database connection.


 // Retrieve all the artists and add to the pull-down menu.
$q = "SELECT writer_id, CONCAT_WS(' ', first_name, last_name) FROM writers ORDER BY last_name, first_name ASC";
$r = mysqli_query ($conn, $q);
$writer = mysqli_fetch_all ($r, MYSQLI_NUM);
// mysqli_close($conn); // Close the database connection.

 // Retrieve all the artists and add to the pull-down menu.
$q = "SELECT publisher_id, CONCAT_WS(' ', publisher_name) FROM publishers ORDER BY publisher_name ASC";
$r = mysqli_query ($conn, $q);
$publisher = mysqli_fetch_all ($r, MYSQLI_NUM);


// mysqli_close($conn); // Close the database connection
$data = array();
$data[0] = $publisher;
$data[1] = $artist;
$data[2] = $writer;

//print_r($data);
 echo json_encode($data);
 mysqli_close($conn);
?>
