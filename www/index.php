<!DOCTYPE html>
<?php
	session_start();
	
	include 'login/acceso_db.php';
	if(empty($_SESSION['usuario'])){//Si no hay usuario loggeado
?>
		<!-- PÁGINA DE LOGIN -->
		<html>
			<head>
				<!--Juego de caracteres-->
				<meta charset="utf-8">
				<!--Favicon-->
				<link rel="icon" type="image/png" href="img/otto_favicon.png">
				<!--CSS-->
				<link rel="stylesheet" type="text/css" href="css/styles.css">
				<!--Ajuste de escala-->
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Otto: Ingresar</title>
			</head>
			<body>
				<!--Logo-->
				<img id="logo" src="img/otto_logo.png">
				<?php
					if($_SESSION['errorlogin']){
						unset($_SESSION['errorlogin']); //Elimina el mensaje de error
						?>
						<p id="errorlogin">El usuario o la contraseña son incorrectos.</p>
						<?php
					}
				?>
				<!--Login-->
				<form id="login" action="login/comprobar.php" method="POST">
					<div><label>Usuario</label><input type="text" name="usuario"></div>
					<div><label>Contraseña</label><input type="password" name="pass"></div>
					<div><input type="submit" name="enviar" value="Ingresar"></div>
				</form>
			</body>
		</html>
<?php
	} else{
?>
		<html>
			<head>
				<meta charset="utf-8">
				<link rel="icon" type="image/png" href="img/otto_favicon.png">
				<link rel="stylesheet" type="text/css" href="css/styles.css">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Otto: Interfaz de usuario</title>
			</head>
			<body>
				<!--Nombre y logout-->
		  		<p id="logout">Hola <strong><?=$_SESSION['usuario']?></strong> | <a href="login/logout.php">Salir</a></p>

				<img id="logo" src="img/otto_logo.png">
				
		  		<!--Log de voz-->
				<div id="left">
					<div id="voicelog">
						<h1><a href="voicelog.html">Registro de conversación</a></h1>
						<iframe src="voicelog.html" height="100px" width="500px"></iframe>
					</div>
					
					<!--Reproductor-->
					<div id="player">
						Último audio:
						<audio controls>
							<?php $lastvoice = file_get_contents("sound/lastvoice.txt");?> 
							<source src="sound/last_voice_<?=$lastvoice?>.wav" type="audio/wav">
							<source src="sound/last_voice_<?=$lastvoice?>.mp3" type="audio/mp3">
							El navegador no soporta este reproductor.
						</audio>
					</div>
				</div>
			</body>
		</html>
<?php
	}
?>