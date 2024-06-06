<?php
$hostname = "127.0.0.1:3306";
$dbname   = "BancoUP";
$username = "remoteUser";
$spscpass = "1needHlpPlz";

$mysqli = mysqli_connect(
		$hostname,
		$username,
		$spscpass,
		$dbname
);

if ($mysqli->connect_errno) {
		die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
?>