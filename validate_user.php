<?php
header('Access-Control-Allow-Origin: *');

if (empty($_POST["username"])) {
	echo("ERROR: no username provided!");
	exit(400);
}
if (empty($_POST["password"])) {
	echo("ERROR: no password providede!");
	exit(400);
}

$username    = $_POST["username"];
$password    = $_POST["password"];
$remote_addr = $_SERVER["REMOTE_ADDR"];

$mysqli = require __DIR__."/dbconn.php";
$sql    = "SELECT id_user, username, password_hash FROM users WHERE users.username=?";

$stmnt = $mysqli->prepare($sql);
$valid_sql = $stmnt->bind_param("s", $_POST["username"]);
if (!$valid_sql) {
	echo("UNVALID SQL:".$stmnt->error);
	exit(400);
}

$stmnt->execute();
$result = $stmnt->get_result();
if (!$result) {
	echo("SQLERROR: ".$mysqli->error);
	exit(500);
}

$row = $result->fetch_assoc();
$val_str = "";
$id_user = 0;
if (is_null($row)) {
	echo("INVALID CREDENTIALS");
	exit(400);
}
if (password_verify($_POST["password"], $row["password_hash"])) {
	$val_str = $row["password_hash"];
	$id_user = $row["id_user"];
}
else {
	echo("INVALID CREDENTIALS");
	exit(400);
}

$user_info = array(
	"val_str" => $val_str,
	"id_user" => $id_user
);

echo json_encode($user_info, JSON_UNESCAPED_UNICODE);
?>