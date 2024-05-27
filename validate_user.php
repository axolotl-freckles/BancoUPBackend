<?php
$username  = $_GET["username"];
$pass_hash = $_GET["hash"];
$remote_addr = $_SERVER["REMOTE_ADDR"];

session_start();
$_SESSION["val_str"] = $username."@".$remote_addr;

echo "Usuario: ".$username." Direccion: ".$remote_addr;
?>