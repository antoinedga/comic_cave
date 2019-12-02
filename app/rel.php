<?php
require ('../mysqli_connect.php');
$conn = OpenCon();
require_once('../db.php');
$query = mysqli_query($conn, "SELECT
CONCAT_WS(
	 ' ',
	 artists.first_name,
	 artists.last_name
) AS artist_id,
CONCAT_WS(
	 ' ',
	 writers.first_name,
	 writers.last_name
) AS writer_id,
publishers.publisher_name AS publisher_id,
comic_name,
comic_id,
price,
description,
cover_image,
quantity
FROM
artists,
writers,
publishers,
comics
WHERE
artists.artist_id = comics.artist_id AND writers.writer_id = comics.writer_id AND publishers.publisher_id = comics.publisher_id AND released = 0
ORDER BY
comics.comic_name");	
// $stm = $db->prepare($query);
// $stm->execute();
// $row = $stm->fetch(PDO::FETCH_ASSOC);
$rows = array();
while ($r = mysqli_fetch_assoc($query))
{
	$rows[] = $r;
}
echo json_encode($rows);

?>