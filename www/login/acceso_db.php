<?php
    $host_db = "localhost"; // Host de la BD
    $usuario_db = "root"; // Usuario de la BD
    $clave_db = "<PASSWORRD>"; // Contraseña de la BD
    $nombre_db = "ottodb"; // Nombre de la BD
     
    //conectamos y seleccionamos db
    $conexion = mysqli_connect($host_db, $usuario_db, $clave_db, $nombre_db);

    if(!$conexion){
		die('No se pudo conectar: ' . mysql_error());
	}
	mysqli_query($conexion,"SET NAMES 'utf8'"); //Configura el juego de caracteres
?>