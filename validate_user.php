<?php
$username  = $_GET["username"];
$pass_hash = password_hash($_GET["password"], PASSWORD_BCRYPT);
$remote_addr = $_SERVER["REMOTE_ADDR"];

if (empty($username)) {
	echo("ERROR: no username provided!");
	exit(400)
}

session_start();
$_SESSION["val_str"] = $username."@".$remote_addr;

echo "Usuario: ".$username." Direccion: ".$remote_addr;
?>