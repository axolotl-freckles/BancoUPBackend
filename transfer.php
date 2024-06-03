<?php
$MAX_AMOUNT = 1000.00;
session_start();
$user_val_str   = $_POST["val_str"];
$server_val_str = $_SESSION["val_str"];

if (empty($_POST["sender_account"])) {
	echo("ERROR: No sender provided!");
	exit(400);
}
if (empty($_POST["receiver_account"])) {
	echo("ERROR: No receiver provided!");
	exit(400);
}
if (empty($_POST["concept"])) {
	echo("ERROR: No concept provided!");
	exit(400);
}
if ($_POST["amount"] > $MAX_AMOUNT) {
	echo("ERROR: amount surpases maximum tranference limit");
	exit(400);
}

exit(200)
?>