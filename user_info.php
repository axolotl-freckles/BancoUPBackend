<?php
session_start();
$user_val_str   = $_GET["val_str"]
$server_val_str = $_SESSION["val_str"];

$user_info = array(
	"balance" => 500.0,
	"fullname" => "John Doe"
)

echo json_encode($user_info, JSON_UNESCAPED_UNICODE);
?>