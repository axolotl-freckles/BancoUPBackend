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
$pass_hash   = password_hash($_POST["password"], PASSWORD_BCRYPT);
$remote_addr = $_SERVER["REMOTE_ADDR"];

$user_info = array(
	"val_str" => $pass_hash,
	"id_user" => 5
);

echo json_encode($user_info, JSON_UNESCAPED_UNICODE);
?>