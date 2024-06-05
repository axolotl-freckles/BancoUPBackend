<?php
header('Access-Control-Allow-Origin: *');
$MAX_AMOUNT = 1000.00;
if (empty($_POST["val_str"])) {
	echo("ERROR: no validation provided");
	exit(400);
}
$user_val_str   = $_POST["val_str"];

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
if (empty($_POST["amount"])) {
	echo("ERROR: No amount provided!");
	exit(400);
}
if ($_POST["amount"] > $MAX_AMOUNT) {
	echo("ERROR: amount surpases maximum tranference limit");
	exit(400);
}

echo "SUCCESS";
exit(200)
?>