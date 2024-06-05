<?php
// Establece la cabecera HTTP para permitir el acceso desde cualquier origen
header('Access-Control-Allow-Origin: *');

// Verifica si el parámetro 'val_str' ha sido proporcionado en la solicitud GET
if (empty($_GET["val_str"])) {
    // Si no se proporciona 'val_str', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: no validation provided");
    exit(400);
}

// Asigna el valor del parámetro 'val_str' a la variable '$user_val_str'
$user_val_str = $_GET["val_str"];

// Define un arreglo de transacciones ficticias
$mock_transactions = array(
    array(
        "u_id"        => 1234,                      // Identificador de usuario
        "concepto"    => "Prueba API 1.1",          // Concepto de la transacción
        "descripcion" => "Prueba API 1.2",          // Descripción de la transacción
        "fecha"       => date("d/m/Y H:i:s"),       // Fecha y hora actuales de la transacción
        "monto"       => 100.0                      // Monto de la transacción
    ),
    array(
        "u_id"        => 5678,                      // Identificador de usuario
        "concepto"    => "Prueba API 2.1",          // Concepto de la transacción
        "descripcion" => "Prueba API 2.2",          // Descripción de la transacción
        "fecha"       => date("d/m/Y H:i:s"),       // Fecha y hora actuales de la transacción
        "monto"       => 200.0                      // Monto de la transacción
    )
);

// Convierte el arreglo de transacciones a formato JSON y lo imprime
// La opción JSON_UNESCAPED_UNICODE asegura que los caracteres Unicode no sean escapados
echo json_encode($mock_transactions, JSON_UNESCAPED_UNICODE);
?>
