<?php
header('Access-Control-Allow-Origin: *');
if (empty($_GET["val_str"])) {
	echo("ERROR: no validation provided");
	exit(400);
}
if (empty($_GET["id_user"])) {
	echo("ERROR: No user info provided");
	exit(400);
}

$mysqli = require __DIR__."/dbconn.php";
$sql    = "SELECT id_user, password_hash FROM users WHERE users.id_user=?";

$stmnt = $mysqli->prepare($sql);
$valid_sql = $stmnt->bind_param("i", $_GET["id_user"]);
if (!$valid_sql) {
	echo("UNVALID SQL1:".$stmnt->error);
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

$sql = "SELECT * FROM transactions WHERE (transactions.id_sender=?) OR (transactions.id_receiver=?)";
$stmnt = $mysqli->prepare($sql);
$valid_sql = $stmnt->bind_param("ii", $_GET["id_user"], $_GET["id_user"]);
if (!$valid_sql) {
	echo("INVALID SQL:".$stmnt->error);
	exit(400);
}

$stmnt->execute();
$result = $stmnt->get_result();
if (!$result) {
	echo("SQLERROR: ".$mysqli->error);
	exit(500);
}

$transactions = [];
while($row = $result->fetch_assoc()) {
	$id_show   = $row["id_sender"];
	$desc_show = "Depósito";
	if ($_GET["id_user"]==$row["id_sender"]) {
		$id_show = $row["id_receiver"];
		$desc_show = "Transferencia";
	}
	array_push($transactions, [
		"u_id"        => $id_show,
		"concepto"    => $row["concept"],
		"descripcion" => $desc_show.": ".$row["status"],
		"fecha"       => $row["date"],
		"monto"       => floatval($row["amount"])
	]);
}

echo json_encode($transactions, JSON_UNESCAPED_UNICODE);
?>