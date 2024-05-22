<?php
	if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
		return false;
	}
	else {
		echo "<p> Bienvenido a PHP </p>";
	}
?>