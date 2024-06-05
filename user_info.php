<?php
session_start();
header('Access-Control-Allow-Origin: *');
if (empty($_GET["val_str"])) {
	echo("ERROR: No validation info!");
	exit(400);
}

$user_info = array(
	"balance" => 500.0,
	"fullname" => "John Doe"
);

echo json_encode($user_info, JSON_UNESCAPED_UNICODE);
?>