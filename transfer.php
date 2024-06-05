<?php
// Establece la cabecera HTTP para permitir el acceso desde cualquier origen
header('Access-Control-Allow-Origin: *');

// Define una constante que representa la cantidad máxima permitida para una transferencia
$MAX_AMOUNT = 1000.00;

// Verifica si el parámetro 'val_str' ha sido proporcionado en la solicitud POST
if (empty($_POST["val_str"])) {
    // Si no se proporciona 'val_str', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: no validation provided");
    exit(400);
}

// Asigna el valor del parámetro 'val_str' a la variable '$user_val_str'
$user_val_str = $_POST["val_str"];

// Verifica si el parámetro 'sender_account' ha sido proporcionado en la solicitud POST
if (empty($_POST["sender_account"])) {
    // Si no se proporciona 'sender_account', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: No sender provided!");
    exit(400);
}

// Verifica si el parámetro 'receiver_account' ha sido proporcionado en la solicitud POST
if (empty($_POST["receiver_account"])) {
    // Si no se proporciona 'receiver_account', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: No receiver provided!");
    exit(400);
}

// Verifica si el parámetro 'concept' ha sido proporcionado en la solicitud POST
if (empty($_POST["concept"])) {
    // Si no se proporciona 'concept', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: No concept provided!");
    exit(400);
}

// Verifica si el parámetro 'amount' ha sido proporcionado en la solicitud POST
if (empty($_POST["amount"])) {
    // Si no se proporciona 'amount', devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: No amount provided!");
    exit(400);
}

// Verifica si la cantidad proporcionada en 'amount' supera el límite máximo permitido
if ($_POST["amount"] > $MAX_AMOUNT) {
    // Si la cantidad supera el límite máximo, devuelve un mensaje de error y finaliza la ejecución con un código de estado 400
    echo("ERROR: amount surpasses maximum transfer limit");
    exit(400);
}

// Si todas las validaciones anteriores se pasan, devuelve un mensaje de éxito
echo "SUCCESS";

// Finaliza la ejecución del script con un código de estado 200, indicando que la solicitud se completó correctamente
exit(200);
?>
