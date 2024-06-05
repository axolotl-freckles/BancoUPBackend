<?php
// Comprueba si la URL de la solicitud contiene una extensión de imagen (png, jpg, jpeg, gif)
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    // Si la URL contiene una extensión de imagen, no procesa el script y deja que el servidor web maneje el archivo de la imagen
    return false;
} else {
    // Si la URL no contiene una extensión de imagen, imprime un mensaje de bienvenida en HTML
    echo "<p> Bienvenido a PHP </p>";
}
?>
