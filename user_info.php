<?php
session_start();
header('Access-Control-Allow-Origin: *');
if (empty($_GET["val_str"])) {
	echo("ERROR: No validation info!");
	exit(400);
}
if (empty($_GET["id_user"])) {
	echo("ERROR: No user info!");
	exit(400);
}

$mysqli = require __DIR__."/dbconn.php";
$sql    = "SELECT id_user, fullname, password_hash, balance FROM users WHERE users.id_user=?";

$stmnt = $mysqli->prepare($sql);
$valid_sql = $stmnt->bind_param("i", $_GET["id_user"]);
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
$fullname = "";
$balance  = 0;
if (is_null($row)) {
	echo("INVALID CREDENTIALS");
	exit(400);
}
if (strcmp($_GET["val_str"], $row["password_hash"]) == 0) {
	$fullname = $row["fullname"];
	$balance  = $row["balance"];
}
else {
	echo("INVALID CREDENTIALS");
	exit(400);
}

$user_info = array(
	"balance"  => floatval($balance),
	"fullname" => $fullname
);

echo json_encode($user_info, JSON_UNESCAPED_UNICODE);
?>