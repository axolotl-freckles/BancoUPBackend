<?php
session_start();
$user_val_str   = $_GET["val_str"]
$server_val_str = $_SESSION["val_str"];


$mock_transactions = array(
	array(
		"u_id"        => 1234,
		"concepto"    => "Prueba API 1.1",
		"descripcion" => "Prueba API 1.2",
		"fecha"       => date("d/m/Y H:i:s")
	),
	array(
		"u_id"        => 5678,
		"concepto"    => "Prueba API 2.1",
		"descripcion" => "Prueba API 2.2",
		"fecha"       => date("d/m/Y H:i:s")
	)
)

echo json_encode($mock_transactions, JSON_UNESCAPED_UNICODE)
?>