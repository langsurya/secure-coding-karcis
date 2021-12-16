<?php
include "db.php";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection.
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// $host = 'http://localhost/secure-coding-karcis/';
$host = 'http://' . $_SERVER['HTTP_HOST'] ."/";
error_reporting(E_ALL);


?>
