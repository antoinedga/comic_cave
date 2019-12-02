<?php # displays the details for a particular comic
$row = FALSE; // Assume nothing!

	$cid = $_GET['comic_id'];

	// Get the comic info:
	require ('../mysqli_connect.php'); // Connect to the database.
	$conn = OpenCon();
	// echo "Connected Successfully";
	// $conn = OpenCon();
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
  $row = mysqli_fetch_assoc($r);
  echo json_encode($row);
  mysqli_close($conn);


if (!$row)
{
  echo "error!";
}

?>
