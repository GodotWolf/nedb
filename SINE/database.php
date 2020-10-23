<?php
	$conexion = new mysqli("localhost", "root", "", "nedb");
		if ($conexion->connect_errno){
			die("Error 404 ".$conexion->error);
		}
?>