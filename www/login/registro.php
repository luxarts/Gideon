<?php
include 'acceso_db.php';

$usuario = strip_tags($_POST['usuario']);
$email = strip_tags ($_POST['email']);

if(strlen(strip_tags($_POST['pass']))<8){
	echo "La contraseña debe tener al menos 8 caracteres.";	
	die();
}
$pass = sha1(strip_tags($_POST['pass']));
$r_pass = sha1(strip_tags($_POST['r_pass']));

$acuerdo = isset($_POST['terms']);//Si llega algo

if($usuario == NULL || $email == NULL || $pass == NULL || $r_pass == NULL){
	echo "No pueden quedar campos vacios!";
	die();
}
if($acuerdo == NULL){
	echo "Tenés que aceptar los términos para registrarte.";
	die();
}

$query = mysqli_query($conexion,"SELECT `usuario` FROM `usuarios` WHERE usuario='$usuario'");
$row = mysqli_fetch_array($query,MYSQLI_BOTH);

if($row[0] == $usuario){
	echo "Ese nombre de usuario ya está en uso.";
	die();
}else{
	$query = mysqli_query($conexion,"SELECT `email` FROM `usuarios` WHERE email='$email'");
	$row = mysqli_fetch_array($query,MYSQLI_BOTH);

	if($row[0] == $email){
		echo "Ese email ya está en uso.";
		die();
	}else{
		if($pass != $r_pass){
			echo "Las contraseñas no coinciden.";
			die();
		}else{
			echo $usuario;
			echo "<br>";
			echo $pass;
			echo "<br>";
			echo $email;
			echo "<br>";

			$query = mysqli_query($conexion,"INSERT INTO `usuarios` (`id`,`fecha`,`usuario`,`psswd`,`email`) VALUES (NULL, NULL, '$usuario','$pass','$email')");

			echo "Registrado!";
		}
	}
}

?>