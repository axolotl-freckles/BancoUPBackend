<?php
header('Access-Control-Allow-Origin: *');
if (empty($_GET["val_str"])) {
	echo("ERROR: no validation provided");
	exit(400);
}
$user_val_str   = $_GET["val_str"];

$mock_transactions = array(
	array(
		"u_id"        => 1234,
		"concepto"    => "Prueba API 1.1",
		"descripcion" => "Prueba API 1.2",
		"fecha"       => date("d/m/Y H:i:s"),
		"monto"       => 100.0
	),
	array(
		"u_id"        => 5678,
		"concepto"    => "Prueba API 2.1",
		"descripcion" => "Prueba API 2.2",
		"fecha"       => date("d/m/Y H:i:s"),
		"monto"       => 200.0
	)
);

echo json_encode($mock_transactions, JSON_UNESCAPED_UNICODE);
?>