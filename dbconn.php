<?php
$hostname = "localhost:";
$dbname   = "bancoUP_db";
$username = "remote_user";
$spscpass = "1needHlpPLz";

$mysqli = new mysqli(
		hostname: $hostname,
		username: $username,
		password: $spscpass,
		database: $dbname
);

if ($mysqli->connect_errno) {
		die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
?>