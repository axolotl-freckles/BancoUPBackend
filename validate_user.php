<?php
// Establece la cabecera HTTP para permitir el acceso desde cualquier origen
header('Access-Control-Allow-Origin: *');

// Verifica si el parámetro 'username' ha sido proporcionado en la solicitud POST
if (empty($_POST["username"])) {
    // Si no se proporciona 'username', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: no username provided!");
    exit(400);
}

// Verifica si el parámetro 'password' ha sido proporcionado en la solicitud POST
if (empty($_POST["password"])) {
    // Si no se proporciona 'password', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: no password provided!");
    exit(400);
}

// Asigna el valor del parámetro 'username' a la variable '$username'
$username = $_POST["username"];

// Cifra la contraseña proporcionada usando el algoritmo BCRYPT y la asigna a la variable '$pass_hash'
$pass_hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

// Obtiene la dirección IP remota del cliente y la asigna a la variable '$remote_addr'
$remote_addr = $_SERVER["REMOTE_ADDR"];

// Define un arreglo con información de usuario ficticia
$user_info = array(
    "val_str" => $pass_hash, // Cadena de validación (hash de la contraseña)
    "id_user" => 5           // Identificador de usuario ficticio
);

// Convierte el arreglo de información de usuario a formato JSON y lo imprime
// La opción JSON_UNESCAPED_UNICODE asegura que los caracteres Unicode no sean escapados
echo json_encode($user_info, JSON_UNESCAPED_UNICODE);
?>
