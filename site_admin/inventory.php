<?php
$page_title = 'Browse Comics';
require ('../mysqli_connect.php'); // Connect to the database.
$conn = OpenCon();
$q = "SELECT
    CONCAT_WS(' ', artists.first_name, artists.last_name) AS artist, CONCAT_WS(' ', writers.first_name, writers.last_name) AS writer,
		 publishers.publisher_name AS publisher,
    comic_name, quantity, comic_id
    FROM artists, writers, publishers, comics
    WHERE
    artists.artist_id=comics.artist_id AND
    writers.writer_id=comics.writer_id AND
    publishers.publisher_id=comics.publisher_id";

// Create the table head:

// Display all the prints, linked to URLs:
$r = mysqli_query ($conn, $q);
if (mysqli_num_rows($r) <= 0)
{
	printf("no rows??\n");
}

$json = mysqli_fetch_all ($r, MYSQLI_ASSOC);
echo json_encode($json);
// order in array
mysqli_close($conn);
?>
