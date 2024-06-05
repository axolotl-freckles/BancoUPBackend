<?php
// Inicia una nueva sesión o reanuda la sesión existente
session_start();

// Establece la cabecera HTTP para permitir el acceso desde cualquier origen
header('Access-Control-Allow-Origin: *');

// Verifica si el parámetro 'val_str' ha sido proporcionado en la solicitud GET
if (empty($_GET["val_str"])) {
    // Si no se proporciona 'val_str', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: No validation info!");
    exit(400);
}

// Define un arreglo con información de usuario ficticia
$user_info = array(
    "balance" => 500.0,         // Saldo del usuario
    "fullname" => "John Doe"    // Nombre completo del usuario
);

// Convierte el arreglo de información de usuario a formato JSON y lo imprime
// La opción JSON_UNESCAPED_UNICODE asegura que los caracteres Unicode no sean escapados
echo json_encode($user_info, JSON_UNESCAPED_UNICODE);
?>
