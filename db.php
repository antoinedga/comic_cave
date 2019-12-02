<?php
$dns = 'mysql:host=localhost;dbname=comic_cave';
$user = 'usr';
$pass = 'batpass';
try{
 $db = new PDO ($dns, $user, $pass);
}catch( PDOException $e){
 $error = $e->getMessage();
 echo $error;
}
?>